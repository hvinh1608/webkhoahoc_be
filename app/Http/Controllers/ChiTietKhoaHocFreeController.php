<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\ChiTietKhoaHocFree;
use App\Models\KhoaHocFree;

class ChiTietKhoaHocFreeController extends Controller
{
    public function danhSachDangKy(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        // Kiểm tra đầu vào hợp lệ
        if (!$request->has('id_khoa_hoc') || !$request->has('title')) {
            return response()->json([
                'message' => 'Dữ liệu không hợp lệ!',
                'status' => 0
            ], 400);
        }

        try {
            // Kiểm tra nếu đã đăng ký rồi thì không đăng ký lại
            $daDangKy = ChiTietKhoaHocFree::where('id_khoa_hoc', $request->id_khoa_hoc)
                ->where('id_khach_hang', $user->id)
                ->exists();

            if ($daDangKy) {
                return response()->json([
                    'message' => 'Bạn đã đăng ký khóa học "' . $request->title . '" rồi!',
                    'status' => 0
                ]);
            }

            // Thêm mới vào bảng chi tiết khóa học free
            ChiTietKhoaHocFree::create([
                'id_khoa_hoc' => $request->id_khoa_hoc,
                'id_khach_hang' => $user->id
            ]);

            return response()->json([
                'message' => 'Đăng ký khóa học "' . $request->title . '" thành công!',
                'status' => 1
            ]);
        } catch (\Exception $e) {
            Log::error("Lỗi khi đăng ký khóa học: " . $e->getMessage());
            return response()->json([
                'message' => 'Đã xảy ra lỗi, vui lòng thử lại!',
                'status' => 0
            ], 500);
        }
    }

    public function danhSachKhoaHoc()
    {
        $user = Auth::guard('sanctum')->user();

        try {
            $data = ChiTietKhoaHocFree::join('khoa_hoc_frees', 'khoa_hoc_frees.id', '=', 'chi_tiet_khoa_hoc_free.id_khoa_hoc')
                ->where('chi_tiet_khoa_hoc_free.id_khach_hang', $user->id)
                ->select('khoa_hoc_frees.title', 'khoa_hoc_frees.image', 'chi_tiet_khoa_hoc_free.created_at')
                ->get();

            return response()->json(['data' => $data], 200);
        } catch (\Exception $e) {
            Log::error("Lỗi khi lấy danh sách khóa học: " . $e->getMessage());
            return response()->json([
                'message' => 'Không thể lấy danh sách khóa học!',
                'status' => 0
            ], 500);
        }
    }


}
