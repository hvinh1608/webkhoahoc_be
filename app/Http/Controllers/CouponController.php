<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    /**
     * Áp dụng mã giảm giá
     */
    public function createCoupon(Request $request)
    {
        $user = Auth::guard('sanctum')->user(); // Xác thực người dùng

        $request->validate([
            'value' => 'required|numeric', // Giá trị giảm giá
            'type' => 'required|string|in:percent,amount', // Loại giảm giá (percent hoặc amount)
            'expiry_date' => 'required|date|after:now', // Ngày hết hạn
        ]);

        // Tạo mã giảm giá theo định dạng GD-YYYYMMDD-XXXX
        $couponCode = 'GD-' . Carbon::now()->format('Ymd') . '-' . Str::random(4); // Ví dụ: GD-20250416-ABCD

        // Lưu mã giảm giá vào cơ sở dữ liệu
        $coupon = Coupon::create([
            'code' => $couponCode,   // Mã giảm giá
            'value' => $request->value, // Giá trị giảm giá
            'type' => $request->type,   // Loại giảm giá (percent hoặc amount)
            'expiry_date' => $request->expiry_date, // Ngày hết hạn
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Mã giảm giá đã được tạo thành công!',
            'coupon_code' => $couponCode,  // Trả về mã giảm giá vừa tạo
        ]);
    }

    public function index()
    {
        $user = Auth::guard('sanctum')->user(); // Xác thực người dùng

        $coupons = Coupon::all();
        return response()->json($coupons);
    }

    /**
     * Cập nhật mã giảm giá
     */
    public function updateCoupon(Request $request, $id)
    {
        $user = Auth::guard('sanctum')->user(); // Xác thực người dùng

        $request->validate([
            'value' => 'required|numeric|min:0', // Giá trị giảm giá
            'type' => 'required|string|in:percent,amount', // Loại giảm giá (percent hoặc amount)
            'expiry_date' => 'required|date|after:today', // Ngày hết hạn
        ]);

        // Tìm mã giảm giá cần cập nhật
        $coupon = Coupon::find($id);

        if (!$coupon) {
            return response()->json(['error' => 'Mã giảm giá không tồn tại!'], 404);
        }

        // Cập nhật thông tin mã giảm giá
        $coupon->update([
            'value' => $request->value,
            'type' => $request->type,
            'expiry_date' => $request->expiry_date,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Mã giảm giá đã được cập nhật thành công!',
            'coupon' => $coupon
        ]);
    }

    /**
     * Xóa mã giảm giá
     */
    public function deleteCoupon($id)
    {
        $user = Auth::guard('sanctum')->user(); // Xác thực người dùng

        // Tìm mã giảm giá cần xóa
        $coupon = Coupon::find($id);

        if (!$coupon) {
            return response()->json(['error' => 'Mã giảm giá không tồn tại!'], 404);
        }

        // Xóa mã giảm giá
        $coupon->delete();

        return response()->json([
            'status' => 1,
            'message' => 'Mã giảm giá đã được xóa thành công!'
        ]);
    }

    public function applyCoupon(Request $request)
{
    $user = Auth::guard('sanctum')->user(); // Lấy người dùng đang đăng nhập

    $request->validate([
        'code' => 'required|string|max:255', // Mã giảm giá
    ]);

    // Tìm mã giảm giá
    $coupon = Coupon::where('code', $request->code)->first();

    if (!$coupon) {
        return response()->json(['error' => 'Mã giảm giá không hợp lệ!'], 400);
    }

    if ($coupon->expiry_date < now()) {
        return response()->json(['error' => 'Mã giảm giá đã hết hạn!'], 400);
    }

    // Kiểm tra xem người dùng đã sử dụng mã giảm giá này chưa
    $usedCoupon = DB::table('coupon_user')
        ->where('user_id', $user->id)
        ->where('coupon_id', $coupon->id)
        ->where('status', 'used')
        ->first();

    if ($usedCoupon) {
        return response()->json(['error' => 'Bạn đã sử dụng mã giảm giá này rồi!'], 400);
    }

    // Chỉ kiểm tra mã, KHÔNG lưu vào DB tại đây
    // Mã sẽ được lưu sau khi thanh toán thành công

    return response()->json([
        'type' => $coupon->type,
        'value' => $coupon->value
    ]);
}
}
