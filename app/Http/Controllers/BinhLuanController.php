<?php

// app/Http/Controllers/BinhLuanController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BinhLuan;
use App\Models\LikeBinhLuan;
use App\Models\LikeTraLoiBinhLuan;
use App\Models\TraLoiBinhLuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BinhLuanController extends Controller
{
    // Lấy bình luận từ bảng khóa học mất phí
    public function getBinhLuan($id_khoa_hoc)
    {
        $data = BinhLuan::where('id_khoa_hoc', $id_khoa_hoc)
            ->with([
                'khach_hang:id,ho_va_ten',
                'ds_tra_loi.tra_loi_con.tra_loi_con' // lấy tối đa 3 cấp, hoặc nhiều hơn nếu muốn
            ])
            // Lấy tên người dùng từ bảng khách hàng
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                // Tính toán số lượt like của bình luận
                $likesCount = LikeBinhLuan::where('binh_luan_id', $item->id)->count();  // Đếm số lượt like

                return [
                    'id' => $item->id,
                    'noi_dung' => $item->noi_dung,
                    'ten_nguoi_dung' => $item->khach_hang->ho_va_ten ?? 'Ẩn danh',
                    'vai_tro' => $item->id_khach_hang ? 'Khách hàng' : null,
                    'created_at' => $item->created_at,
                    'ds_tra_loi' => $this->layTraLoiCon($item->id, $item->id),
                    'likes_count' => $likesCount,  // Gửi số lượt like về frontend
                    'da_like' => Auth::guard('sanctum')->check()
                        ? LikeBinhLuan::where('khach_hang_id', Auth::guard('sanctum')->user()->id)
                        ->where('binh_luan_id', $item->id)
                        ->exists()
                        : false,
                ];
            });

        return response()->json([
            'status' => 1,
            'data' => $data
        ]);
    }

    // Lấy trả lời lồng nhau (đệ quy)
    private function layTraLoiCon($cha_id, $binh_luan_id)
    {
        $query = \App\Models\TraLoiBinhLuan::where('binh_luan_id', $binh_luan_id);
        if ($cha_id === null) {
            $query->whereNull('tra_loi_cha_id');
        } else {
            $query->where('tra_loi_cha_id', $cha_id);
        }
        return $query->get()
            ->map(function ($tl) use ($binh_luan_id) {
                return [
                    'id' => $tl->id,
                    'binh_luan_id' => $tl->binh_luan_id,
                    'noi_dung' => $tl->noi_dung,
                    'ten_nguoi_dung' => $tl->ten_nguoi_dung,
                    'vai_tro' => $tl->admin_id
                        ? (optional($tl->nhan_vien)->id_quyen == 1 ? 'Admin' : 'Nhân viên')
                        : ($tl->user_id ? 'Khách hàng' : null),
                    'tra_loi_con' => $this->layTraLoiCon($tl->id, $binh_luan_id),
                ];
            })->values();
    }

    public function createBinhLuan(Request $request)
    {
        $request->validate([
            'id_khoa_hoc' => 'required|exists:loai_khoa_hocs,id',
            'noi_dung' => 'required|string'
        ]);

        $user = Auth::guard('sanctum')->user();

        $bl = BinhLuan::create([
            'id_khoa_hoc' => $request->id_khoa_hoc,
            'id_khach_hang' => $user->id,
            'noi_dung' => $request->noi_dung
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Đã gửi bình luận',
            'data' => $bl
        ]);
    }

    public function adminTraLoi(Request $request, $id)
    {
        $request->validate([
            'tra_loi' => 'required|string',
            'tra_loi_cha_id' => 'nullable|exists:tra_loi_binh_luans,id'
        ]);

        $user = Auth::guard('sanctum')->user();
        $bl = BinhLuan::findOrFail($id);

        $tra_loi_cha_id = $request->tra_loi_cha_id ?? $bl->id;

        $traLoi = TraLoiBinhLuan::create([
            'binh_luan_id' => $bl->id,
            'admin_id'     => $user->id,
            'tra_loi_cha_id' => $tra_loi_cha_id,
            'noi_dung'     => $request->tra_loi,
            'ten_nguoi_dung' => $user->ho_va_ten ?? $user->name ?? 'Ẩn danh',
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Đã trả lời bình luận',
            'data' => [
                'id' => $traLoi->id,
                'noi_dung' => $traLoi->noi_dung,
                'ten_nguoi_dung' => $traLoi->ten_nguoi_dung,
                'vai_tro' => $user->id_quyen == 1 ? 'Admin' : 'Nhân viên',
                'tra_loi_con' => []
            ]
        ]);
    }

    public function getTatCaBinhLuan()
    {
        // Lấy danh sách bình luận
        $ds = DB::table('binh_luans')
            ->leftJoin('loai_khoa_hocs', 'binh_luans.id_khoa_hoc', '=', 'loai_khoa_hocs.id')
            ->leftJoin('khoa_hoc_frees', 'binh_luans.id_khoa_hoc_free', '=', 'khoa_hoc_frees.id')
            ->leftJoin('khach_hangs', 'binh_luans.id_khach_hang', '=', 'khach_hangs.id')
            ->select(
                'binh_luans.*',
                'loai_khoa_hocs.ten_khoa_hoc',
                'khoa_hoc_frees.title as ten_khoa_hoc_free',
                'khach_hangs.ho_va_ten as ten_nguoi_dung'
            )
            ->orderByDesc('binh_luans.id')
            ->get()
            ->map(function ($bl) {
                // Lấy toàn bộ trả lời của bình luận này
                $tatCaTraLoi = DB::table('tra_loi_binh_luans')
                    ->leftJoin('nhan_viens', 'tra_loi_binh_luans.admin_id', '=', 'nhan_viens.id')
                    ->leftJoin('khach_hangs', 'tra_loi_binh_luans.user_id', '=', 'khach_hangs.id')
                    ->where('tra_loi_binh_luans.binh_luan_id', $bl->id)
                    ->select(
                        'tra_loi_binh_luans.id',
                        'tra_loi_binh_luans.noi_dung',
                        'tra_loi_binh_luans.tra_loi_cha_id',
                        DB::raw('COALESCE(nhan_viens.ho_va_ten, khach_hangs.ho_va_ten) as ten_nguoi_dung'),
                        'nhan_viens.id_quyen',
                        'tra_loi_binh_luans.user_id'
                    )
                    ->orderBy('tra_loi_binh_luans.id')
                    ->get();

                // Xử lý lồng nhau
                $buildTree = function ($parentId) use (&$buildTree, $tatCaTraLoi) {
                    return $tatCaTraLoi->filter(function ($item) use ($parentId) {
                        return $item->tra_loi_cha_id == $parentId;
                    })->map(function ($item) use (&$buildTree) {
                        return [
                            'id' => $item->id,
                            'noi_dung' => $item->noi_dung,
                            'ten_nguoi_dung' => $item->ten_nguoi_dung ?? 'Ẩn danh',
                            'vai_tro' => match (true) {
                                $item->id_quyen == 1 => 'Admin',
                                $item->id_quyen == 2 => 'Nhân viên',
                                $item->user_id !== null => 'Khách hàng',
                                default => null
                            },
                            'children' => $buildTree($item->id)
                        ];
                    })->values();
                };

                $bl->ds_tra_loi = $buildTree(null); // Trả lời gốc
                return $bl;
            });

        return response()->json([
            'status' => 1,
            'data' => $ds
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_khoa_hoc' => 'required|integer',
            'noi_dung' => 'required|string|max:1000',
            'binh_luan_id' => 'required|integer', // id bình luận gốc
            'tra_loi_cha_id' => 'nullable|integer', // id trả lời cha (nếu có)
        ]);

        $traLoi = new TraLoiBinhLuan();
        $traLoi->noi_dung = $request->noi_dung;

        // Nếu không truyền tra_loi_cha_id, mặc định là trả lời cho bình luận gốc
        $traLoi->tra_loi_cha_id = $request->tra_loi_cha_id ?? $request->binh_luan_id;

        $traLoi->binh_luan_id = $request->binh_luan_id;

        $user = Auth::guard('sanctum')->user();

        if ($user instanceof \App\Models\NhanVien) {
            $traLoi->admin_id = $user->id;
            $traLoi->ten_nguoi_dung = $user->ho_va_ten ?? $user->name;
        } elseif ($user instanceof \App\Models\KhachHang) {
            $traLoi->user_id = $user->id;
            $traLoi->ten_nguoi_dung = $user->ho_va_ten ?? $user->name;
        } else {
            return response()->json(['status' => 0, 'message' => 'Không xác thực được người dùng'], 401);
        }

        $traLoi->save();

        return response()->json([
            'status' => 1,
            'message' => $request->tra_loi_cha_id ? 'Trả lời thành công' : 'Bình luận thành công',
            'data' => $traLoi
        ]);
    }


    public function xoaBinhLuan($id)
    {
        $binhLuan = DB::table('binh_luans')->where('id', $id)->first();

        if (!$binhLuan) {
            return response()->json([
                'status' => 0,
                'message' => 'Bình luận không tồn tại'
            ], 404);
        }

        // Xóa các trả lời liên quan
        DB::table('tra_loi_binh_luans')->where('binh_luan_id', $id)->delete();

        // Xóa bình luận
        DB::table('binh_luans')->where('id', $id)->delete();

        return response()->json([
            'status' => 1,
            'message' => 'Đã xóa bình luận thành công'
        ]);
    }

    public function xoaTraLoi($id)
    {
        $traLoi = DB::table('tra_loi_binh_luans')->where('id', $id)->first();

        if (!$traLoi) {
            return response()->json(['status' => 0, 'message' => 'Trả lời không tồn tại'], 404);
        }

        DB::table('tra_loi_binh_luans')->where('id', $id)->delete();

        return response()->json(['status' => 1, 'message' => 'Đã xóa trả lời']);
    }

    public function like($id)
    {
        // Lấy thông tin người dùng hiện tại
        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json(['status' => 0, 'message' => 'Chưa đăng nhập']);
        }

        // Kiểm tra bình luận có tồn tại không
        $binhLuan = \App\Models\BinhLuan::find($id);
        if (!$binhLuan) {
            return response()->json(['status' => 0, 'message' => 'Bình luận không tồn tại']);
        }

        // Kiểm tra xem người dùng đã like bình luận này chưa
        $like = LikeBinhLuan::where('khach_hang_id', $user->id)
            ->where('binh_luan_id', $id)
            ->first();

        if ($like) {
            // Nếu đã like thì xóa like và giảm lượt like của bình luận
            $like->delete();
            $binhLuan->decrement('likes_count');

            return response()->json([
                'status' => 1,
                'message' => 'Đã bỏ thích',
                'likes' => $binhLuan->likes_count,
                'da_like' => false
            ]);
        } else {
            // Nếu chưa like thì tạo mới like và tăng lượt like của bình luận
            LikeBinhLuan::create([
                'khach_hang_id' => $user->id,
                'binh_luan_id' => $id,
            ]);
            $binhLuan->increment('likes_count');

            return response()->json([
                'status' => 1,
                'message' => 'Đã thích',
                'likes' => $binhLuan->likes_count,
                'da_like' => true
            ]);
        }
    }

    public function likeTraLoiCon($id)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['status' => 0, 'message' => 'Chưa đăng nhập']);
        }

        $traLoi = TraLoiBinhLuan::find($id);
        if (!$traLoi) {
            return response()->json(['status' => 0, 'message' => 'Trả lời không tồn tại']);
        }

        $like = LikeTraLoiBinhLuan::where('khach_hang_id', $user->id)
            ->where('tra_loi_binh_luan_id', $id)
            ->first();

        if ($like) {
            $like->delete();
            $traLoi->decrement('likes_count');
            return response()->json([
                'status' => 1,
                'message' => 'Đã bỏ thích',
                'likes' => $traLoi->likes_count,
                'da_like' => false
            ]);
        } else {
            \App\Models\LikeTraLoiBinhLuan::create([
                'khach_hang_id' => $user->id,
                'tra_loi_binh_luan_id' => $id,
            ]);
            $traLoi->increment('likes_count');
            return response()->json([
                'status' => 1,
                'message' => 'Đã thích',
                'likes' => $traLoi->likes_count,
                'da_like' => true
            ]);
        }
    }

    // Lấy bình luận từ bảng khóa học miễn phí
    public function getBinhLuanFree($id_khoa_hoc_free)
    {
        $data = BinhLuan::where('id_khoa_hoc_free', $id_khoa_hoc_free)
            ->with(['khach_hang:id,ho_va_ten'])  // Lấy tên người dùng từ bảng khách hàng
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                // Tính toán số lượt like của bình luận
                $likesCount = LikeBinhLuan::where('binh_luan_id', $item->id)->count();  // Đếm số lượt like

                return [
                    'id' => $item->id,
                    'noi_dung' => $item->noi_dung,
                    'ten_nguoi_dung' => $item->khach_hang->ho_va_ten ?? 'Ẩn danh',
                    'created_at' => $item->created_at,
                    'ds_tra_loi' => $this->layTraLoiConFree(null, $item->id),
                    'likes_count' => $likesCount,  // Gửi số lượt like về frontend
                    'da_like' => Auth::guard('sanctum')->check()
                        ? LikeBinhLuan::where('khach_hang_id', Auth::guard('sanctum')->user()->id)
                        ->where('binh_luan_id', $item->id)
                        ->exists()
                        : false,
                ];
            });

        return response()->json([
            'status' => 1,
            'data' => $data
        ]);
    }

    // Lấy trả lời lồng nhau (đệ quy)
    private function layTraLoiConFree($cha_id, $binh_luan_id)
    {
        return TraLoiBinhLuan::where('tra_loi_cha_id', $cha_id)
            ->where('binh_luan_id', $binh_luan_id)
            ->get()
            ->map(function ($tl) use ($binh_luan_id) {
                return [
                    'id' => $tl->id,
                    'noi_dung' => $tl->noi_dung,
                    'ten_nguoi_dung' => $tl->ten_nguoi_dung,
                    'vai_tro' => $tl->admin_id
                        ? (optional($tl->nhan_vien)->id_quyen == 1 ? 'Admin' : 'Nhân viên')
                        : ($tl->user_id ? 'Khách hàng' : null),
                    'tra_loi_con' => $this->layTraLoiConFree($tl->id, $binh_luan_id),
                ];
            });
    }

    public function createBinhLuanFree(Request $request)
    {
        $request->validate([
            'id_khoa_hoc_free' => 'required|exists:khoa_hoc_frees,id',
            'noi_dung' => 'required|string'
        ]);

        $user = Auth::guard('sanctum')->user();

        $bl = BinhLuan::create([
            'id_khoa_hoc_free' => $request->id_khoa_hoc_free,
            'id_khach_hang' => $user->id,
            'noi_dung' => $request->noi_dung
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Đã gửi bình luận',
            'data' => $bl
        ]);
    }

    public function storeFree(Request $request)
    {
        $request->validate([
            'id_khoa_hoc_free' => 'required|integer',
            'noi_dung' => 'required|string|max:1000',
            'binh_luan_id' => 'required|integer',
            'tra_loi_cha_id' => 'nullable|integer',
        ]);

        $traLoi = new TraLoiBinhLuan();
        $traLoi->noi_dung = $request->noi_dung;
        $traLoi->tra_loi_cha_id = $request->tra_loi_cha_id ?? null;
        $traLoi->binh_luan_id = $request->binh_luan_id;

        $user = Auth::guard('sanctum')->user();

        // 👉 Phân biệt dựa theo class model
        if ($user instanceof \App\Models\NhanVien) {
            $traLoi->admin_id = $user->id;
            $traLoi->ten_nguoi_dung = $user->ho_va_ten ?? $user->name;
        } elseif ($user instanceof \App\Models\KhachHang) {
            $traLoi->user_id = $user->id;
            $traLoi->ten_nguoi_dung = $user->ho_va_ten ?? $user->name;
        } else {
            return response()->json(['status' => 0, 'message' => 'Không xác thực được người dùng'], 401);
        }

        $traLoi->save();

        return response()->json([
            'status' => 1,
            'message' => $request->tra_loi_cha_id ? 'Trả lời thành công' : 'Bình luận thành công',
            'data' => $traLoi
        ]);
    }

    public function likeFree($id)
    {
        // Lấy thông tin người dùng hiện tại
        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json(['status' => 0, 'message' => 'Chưa đăng nhập']);
        }

        // Kiểm tra bình luận có tồn tại không
        $binhLuan = \App\Models\BinhLuan::find($id);
        if (!$binhLuan) {
            return response()->json(['status' => 0, 'message' => 'Bình luận không tồn tại']);
        }

        // Kiểm tra xem người dùng đã like bình luận này chưa
        $like = LikeBinhLuan::where('khach_hang_id', $user->id)
            ->where('binh_luan_id', $id)
            ->first();

        if ($like) {
            // Nếu đã like thì xóa like và giảm lượt like của bình luận
            $like->delete();
            $binhLuan->decrement('likes_count');

            return response()->json([
                'status' => 1,
                'message' => 'Đã bỏ thích',
                'likes' => $binhLuan->likes_count,
                'da_like' => false
            ]);
        } else {
            // Nếu chưa like thì tạo mới like và tăng lượt like của bình luận
            LikeBinhLuan::create([
                'khach_hang_id' => $user->id,
                'binh_luan_id' => $id,
            ]);
            $binhLuan->increment('likes_count');

            return response()->json([
                'status' => 1,
                'message' => 'Đã thích',
                'likes' => $binhLuan->likes_count,
                'da_like' => true
            ]);
        }
    }
}
