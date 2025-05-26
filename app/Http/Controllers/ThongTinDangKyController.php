<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThongTinDangKy;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\XacNhanDangKyThongTin;

class ThongTinDangKyController extends Controller
{
    public function dangKy(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors(),
        ], 422);
    }

    $daTonTai = ThongTinDangKy::where('email', $request->email)->exists();
    if ($daTonTai) {
        return response()->json([
            'status' => false,
            'errors' => ['email' => ['Email này đã được đăng ký nhận thông tin.']],
        ], 422);
    }

    ThongTinDangKy::create([
        'email' => $request->email,
    ]);

    Mail::to($request->email)->send(new XacNhanDangKyThongTin($request->email));

    return response()->json([
        'status' => true,
        'message' => 'Cảm ơn bạn đã đăng ký! Vui lòng kiểm tra email để xác nhận.',
    ]);
}

}
