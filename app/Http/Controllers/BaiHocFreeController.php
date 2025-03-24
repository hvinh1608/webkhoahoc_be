<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaiHocFreeDeleteRequest;
use App\Http\Requests\BaiHocFreeRequest;
use App\Http\Requests\BaiHocFreeUpDateRequest;
use App\Models\BaiHocFree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ChiTietPhanQuyen;
use App\Models\KhoaHocFree;

class BaiHocFreeController extends Controller
{
    public function store(BaiHocFreeRequest $request)
    {
        $id_chuc_nang = 1; //Thêm mới bài học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        BaiHocFree::create([
            'id_khoa_hoc_free'   => $request->id_khoa_hoc_free,
            'tieu_de'            => $request->tieu_de,
            'bai_hoc_so'         => $request->bai_hoc_so,
            'link_bai_hoc'       => $request->link_bai_hoc,
            'tinh_trang'         => $request->tinh_trang
        ]);
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Tạo mới bài học ' . $request->tieu_de . ' bài ' . $request->bai_hoc_so . ' thành công!'
        ]);
    }

    public function getdata()
    {
        $id_chuc_nang = 2; //Lấy dữ liệu bài học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = BaiHocFree::join('khoa_hoc_frees', 'id_khoa_hoc_free', 'khoa_hoc_frees.id')
            ->select('bai_hoc_frees.*', 'khoa_hoc_frees.title')
            ->get();
        return response()->json([
            'data'    =>  $data,
        ]);
    }

    public function destroy(BaiHocFreeDeleteRequest $request)
    {
        $id_chuc_nang = 3; //Xóa bài học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        BaiHocFree::where('id', $request->id)->delete();
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Bạn đã xóa bài học ' . $request->tieu_de . ' bài ' . $request->bai_hoc_so . ' thành công!'
        ]);
    }

    public function update(BaiHocFreeUpDateRequest $request)
    {
        $id_chuc_nang = 4; //Cập nhật bài học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        BaiHocFree::where('id', $request->id)->update([
            'id_khoa_hoc_free'   => $request->id_khoa_hoc_free,
            'tieu_de'            => $request->tieu_de,
            'bai_hoc_so'         => $request->bai_hoc_so,
            'link_bai_hoc'       => $request->link_bai_hoc,
            'tinh_trang'         => $request->tinh_trang
        ]);
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Đã cập nhật bài học ' . $request->tieu_de . ' bài ' . $request->bai_hoc_so . ' thành công!'
        ]);
    }

    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 5; //Đổi trạng thái bài học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $baiHoc = BaiHocFree::where('id', $request->id)->first();

        if ($baiHoc->tinh_trang == 1) {
            $baiHoc->tinh_trang = 0;
            $baiHoc->save();
        } else {
            $baiHoc->tinh_trang = 1;
            $baiHoc->save();
        }
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Bạn đã cập nhật bài viết ' . $request->tieu_de . ' thành công'
        ]);
    }

    public function search(Request $request)
    {

        $id_chuc_nang = 6; //Tìm kiếm bài học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = BaiHocFree::join('khoa_hoc_frees', 'bai_hoc_frees.id_khoa_hoc_free', '=', 'khoa_hoc_frees.id')
            ->select('bai_hoc_frees.*', 'khoa_hoc_frees.title')
            ->where(function ($query) use ($noi_dung) {
                $query->where('bai_hoc_frees.tieu_de', 'like', "%$noi_dung%")
                    ->orWhere('khoa_hoc_frees.title', 'like', "%$noi_dung%");
            })
            ->get();



        return response()->json([
            'data' => $data
        ]);
    }
}
