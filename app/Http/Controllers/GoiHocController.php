<?php

namespace App\Http\Controllers;

use App\Models\GoiDaMua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoiHocController extends Controller
{
    public function muaGoi(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $loaiGoi = $request->loai_goi;
        $soTien = $request->so_tien;

        // Kiểm tra user đã có gói còn hạn không
        $goiHienTai = GoiDaMua::where('user_id', $user->id)
            ->where('ngay_ket_thuc', '>', now())
            ->latest('ngay_ket_thuc')
            ->first();

        if ($goiHienTai) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn đã có gói còn hiệu lực!'
            ]);
        }

        // Kiểm tra số dư
        if ($user->so_du < $soTien) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không đủ tiền để mua gói!'
            ]);
        }

        // Trừ tiền
        $KhachHang = \App\Models\KhachHang::find($user->id);
        $KhachHang->so_du -= $soTien;
        $KhachHang->save();

        // Xác định thời gian kết thúc
        $ngayBatDau = now();
        $ngayKetThuc = $loaiGoi === 'thang'
            ? $ngayBatDau->copy()->addMonth()
            : $ngayBatDau->copy()->addYear();

        // Lưu vào DB
        GoiDaMua::create([
            'user_id' => $user->id,
            'loai_goi' => $loaiGoi,
            'ngay_bat_dau' => $ngayBatDau,
            'ngay_ket_thuc' => $ngayKetThuc,
            'so_tien' => $soTien,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Mua gói thành công!'
        ]);
    }

    public function goiDaMua()
    {
        $user = Auth::guard('sanctum')->user();
        $goi = GoiDaMua::where('user_id', $user->id)
            ->where('ngay_ket_thuc', '>', now())
            ->latest('ngay_ket_thuc')
            ->first();

        if ($goi) {
            return response()->json([
                'status' => 1,
                'loai_goi' => $goi->loai_goi,
                'ngay_ket_thuc' => $goi->ngay_ket_thuc,
            ]);
        }
        return response()->json(['status' => 0]);
    }

    public function hoanTienGoi(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        // Tìm gói còn hạn mới nhất của user
        $goi = \App\Models\GoiDaMua::where('user_id', $user->id)
            ->where('ngay_ket_thuc', '>', now())
            ->latest('ngay_ket_thuc')
            ->first();

        if (!$goi) {
            return response()->json([
                'status' => 0,
                'message' => 'Không tìm thấy gói còn hạn để hoàn tiền!'
            ]);
        }

        // Lấy id các khóa học lẻ đã mua (chưa bị thu hồi)
        $khoaHocLeIds = \App\Models\ChiTietKhoaHoc::where('id_khach_hang', $user->id)
            ->where('da_thu_hoi', false)
            ->pluck('id_khoa_hoc');

        // Lấy tất cả id khóa học mở theo gói, loại trừ khóa học lẻ đã mua
        $khoaHocIds = \App\Models\LoaiKhoaHoc::whereNotIn('id', $khoaHocLeIds)->pluck('id');

        // Kiểm tra nếu user đã hoàn thành bất kỳ khóa học nào trong gói thì không cho hoàn tiền
        $daHoanThanh = false;
        foreach ($khoaHocIds as $khoaHocId) {
            $tongBai = \App\Models\BaiHoc::where('id_khoa_hoc', $khoaHocId)->count();
            $daHoc = \App\Models\TienDoHocTap::where('khach_hang_id', $user->id)
                ->whereHas('baiHoc', function ($q) use ($khoaHocId) {
                    $q->where('id_khoa_hoc', $khoaHocId);
                })
                ->where('da_hoan_thanh', true)
                ->count();
            if ($tongBai > 0 && $daHoc == $tongBai) {
                $daHoanThanh = true;
                break;
            }
        }

        if ($daHoanThanh) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn đã hoàn thành 100% ít nhất 1 khóa học trong gói, không thể hoàn tiền.'
            ]);
        }

        // Cộng lại tiền cho user
        $khachHang = \App\Models\KhachHang::find($user->id);
        $khachHang->so_du += $goi->so_tien;
        $khachHang->save();

        // Thu hồi gói (set hết hạn ngay)
        $goi->ngay_ket_thuc = now();
        $goi->save();

        // Lấy tất cả id bài học thuộc các khóa học này
        $baiHocIds = \App\Models\BaiHoc::whereIn('id_khoa_hoc', $khoaHocIds)->pluck('id');

        // Xóa tiến độ học tập các bài học này
        \App\Models\TienDoHocTap::where('khach_hang_id', $user->id)
            ->whereIn('bai_hoc_id', $baiHocIds)
            ->delete();

        return response()->json([
            'status' => 1,
            'message' => 'Hoàn tiền gói thành công!'
        ]);
    }
}
