<?php

namespace App\Http\Controllers;

use App\Models\ChiTietKhoaHoc;
use App\Models\Coupon;
use App\Models\GoiDaMua;
use App\Models\KhachHang;
use App\Models\LoaiKhoaHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChiTietKhoaHocController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        $goi = GoiDaMua::where('user_id', $user->id)
            ->where('ngay_ket_thuc', '>', now())
            ->first();

        if ($goi) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn đang sở hữu gói học, không thể mua lẻ khóa học!'
            ]);
        }

        $coupon = null;
        $so_tien_mua = LoaiKhoaHoc::where('id', $request->id_khoa_hoc)->first()->gia_ban;

        if ($request->coupon_code) {
            $coupon = Coupon::where('code', $request->coupon_code)->first();

            if (!$coupon) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Mã giảm giá không hợp lệ!'
                ]);
            }

            if ($coupon->expiry_date < now()) {
                return response()->json([
                    'status' => 2,
                    'message' => 'Mã giảm giá đã hết hạn!'
                ]);
            }

            $usedCoupon = DB::table('coupon_user')
                ->where('user_id', $user->id)
                ->where('coupon_id', $coupon->id)
                ->where('status', 'used')
                ->first();

            if ($usedCoupon) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Bạn đã sử dụng mã giảm giá này rồi!'
                ]);
            }

            if ($coupon->type == 'percent') {
                $so_tien_mua -= ($coupon->value / 100) * $so_tien_mua;
            } else {
                $so_tien_mua -= $coupon->value;
            }
        }

        $check = ChiTietKhoaHoc::where('id_khach_hang', $user->id)
            ->where('id_khoa_hoc', $request->id_khoa_hoc)
            ->where('da_thu_hoi', false)
            ->first();

        if ($check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn đã mua khóa học ' . $request->ten_khoa_hoc . ' này rồi!'
            ]);
        }

        if ($user->so_du >= $so_tien_mua) {
            $KhachHang = KhachHang::where('id', $user->id)->first();
            $KhachHang->so_du -= $so_tien_mua;
            $KhachHang->type_account = 1;
            $KhachHang->save();

            ChiTietKhoaHoc::create([
                'id_khoa_hoc'       => $request->id_khoa_hoc,
                'id_khach_hang'     => $user->id,
                'so_tien_mua'       => $so_tien_mua,
            ]);

            // ✅ Lưu coupon đã dùng sau khi thanh toán thành công
            if ($coupon) {
                $alreadyUsed = DB::table('coupon_user')
                    ->where('user_id', $user->id)
                    ->where('coupon_id', $coupon->id)
                    ->exists();

                if (!$alreadyUsed) {
                    DB::table('coupon_user')->insert([
                        'user_id' => $user->id,
                        'coupon_id' => $coupon->id,
                        'status' => 'used',
                        'used_at' => now(),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            return response()->json([
                'status'    => 1,
                'message'   => 'Bạn đã mua khóa học ' . $request->ten_khoa_hoc . ' thành công'
            ]);
        } else {
            return response()->json([
                'status'    => 2,
                'message'   => 'Bạn không đủ tiền mua'
            ]);
        }
    }

    public function danhSachKhoaHoc()
    {
        $user = Auth::guard('sanctum')->user();

        // Kiểm tra user có gói còn hạn không
        $goi = GoiDaMua::where('user_id', $user->id)
            ->where('ngay_ket_thuc', '>', now())
            ->first();

        if ($goi) {
            // Chỉ trả về 1 dòng đại diện cho gói
            $data = [[
                'id_khoa_hoc' => null,
                'ten_khoa_hoc' => $goi->loai_goi === 'nam' ? 'Gói năm' : 'Gói tháng',
                'hinh_anh' => $goi->loai_goi === 'nam' ? '/images/goi_nam.png' : '/images/goi_thang.png',
                'created_at' => $goi->ngay_bat_dau,
                'so_tien_mua' => $goi->so_tien,
                'is_goi' => true,
                'ngay_ket_thuc' => $goi->ngay_ket_thuc,
            ]];

            return response()->json([
                'data' => $data,
                'mo_khoa_tat_ca' => true,
                'loai_goi' => $goi->loai_goi,
                'ngay_ket_thuc' => $goi->ngay_ket_thuc,
            ]);
        }

        // Nếu không có gói, trả về các khóa học đã mua lẻ như cũ
        $data = ChiTietKhoaHoc::select(
            'chi_tiet_khoa_hocs.id_khoa_hoc',
            'loai_khoa_hocs.ten_khoa_hoc',
            'loai_khoa_hocs.hinh_anh',
            'chi_tiet_khoa_hocs.created_at',
            'chi_tiet_khoa_hocs.so_tien_mua'
        )
            ->join('loai_khoa_hocs', 'loai_khoa_hocs.id', 'chi_tiet_khoa_hocs.id_khoa_hoc')
            ->where('chi_tiet_khoa_hocs.id_khach_hang', $user->id)
            ->where('chi_tiet_khoa_hocs.da_thu_hoi', false)
            ->get();

        return response()->json([
            'data' => $data,
            'mo_khoa_tat_ca' => false,
        ]);
    }
}
