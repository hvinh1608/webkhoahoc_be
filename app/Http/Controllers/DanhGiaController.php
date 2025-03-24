<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhGiaRequest;
use App\Models\DanhGia;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class DanhGiaController extends Controller
{
    // Lấy danh sách đánh giá
    public function index()
    {
        $danhGias = DanhGia::all();
        return response()->json($danhGias);
    }

    // Lưu đánh giá
    public function store(DanhGiaRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $validatedData['avatar'] = $avatarPath;
        }

        $danhGia = DanhGia::create($validatedData);

        if ($danhGia) {
            return response()->json([
                'status' => true,
                'message' => 'Gửi đánh giá thành công!'
            ], 201);
        }

        return response()->json([
            'status' => false,
            'message' => 'Có lỗi xảy ra, vui lòng thử lại!'
        ], 400);
    }

    // Xóa đánh giá
    public function destroy($id)
    {
        $danhGia = DanhGia::find($id);

        if (!$danhGia) {
            return response()->json([
                'status' => false,
                'message' => 'Đánh giá không tồn tại!'
            ], 404);
        }

        // Xóa ảnh nếu có
        if ($danhGia->avatar) {
            Storage::disk('public')->delete($danhGia->avatar);
        }

        $danhGia->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa đánh giá thành công!'
        ], 200);
    }
}
