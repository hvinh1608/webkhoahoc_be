<?php

namespace App\Http\Controllers;

use App\Models\GhiChu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GhiChuController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_khoa_hoc' => 'required|exists:loai_khoa_hocs,id', // Kiểm tra đúng bảng
            'noi_dung' => 'required|string',
        ]);

        $ghiChu = GhiChu::create([
            'id_khoa_hoc' => $request->id_khoa_hoc,
            'id_nguoi_dung' => Auth::guard('sanctum')->user()->id,
            'noi_dung' => $request->noi_dung,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Ghi chú đã được lưu',
            'data' => $ghiChu,
        ]);
    }

    public function show($id_khoa_hoc)
    {
        $ghiChus = GhiChu::where('id_khoa_hoc', $id_khoa_hoc)
            ->where('id_nguoi_dung', Auth::guard('sanctum')->user()->id)
            ->orderBy('created_at', 'desc') // Sắp xếp theo ngày tạo, nếu muốn
            ->get();

        return response()->json([
            'status' => 1,
            'data' => $ghiChus,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'noi_dung' => 'required|string',
        ]);

        $ghiChu = GhiChu::where('id', $id)
            ->where('id_nguoi_dung', Auth::guard('sanctum')->user()->id)
            ->first();

        if (!$ghiChu) {
            return response()->json(['status' => 0, 'message' => 'Ghi chú không tồn tại']);
        }

        $ghiChu->noi_dung = $request->noi_dung;
        $ghiChu->save();

        return response()->json([
            'status' => 1,
            'message' => 'Ghi chú đã được cập nhật',
            'data' => $ghiChu,
        ]);
    }

    public function destroy($id)
    {
        $user = Auth::guard('sanctum')->user();

        $ghiChu = GhiChu::where('id', $id)
            ->where('id_nguoi_dung', $user->id)
            ->first();

        if (!$ghiChu) {
            return response()->json([
                'status' => 0,
                'message' => 'Ghi chú không tồn tại hoặc bạn không có quyền xóa.'
            ]);
        }

        $ghiChu->delete();

        return response()->json([
            'status' => 1,
            'message' => 'Ghi chú đã được xóa thành công.'
        ]);
    }


    public function storeFree(Request $request)
    {
        $request->validate([
            'id_khoa_hoc_free' => 'required|exists:khoa_hoc_frees,id',
            'noi_dung' => 'required|string',
        ]);

        $ghiChu = GhiChu::create([
            'id_khoa_hoc_free' => $request->id_khoa_hoc_free,
            'id_nguoi_dung' => Auth::guard('sanctum')->user()->id,
            'noi_dung' => $request->noi_dung,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Ghi chú đã được lưu',
            'data' => $ghiChu,
        ]);
    }

    public function showFree($id_khoa_hoc_free)
    {
        $ghiChus = GhiChu::where('id_khoa_hoc_free', $id_khoa_hoc_free)
            ->where('id_nguoi_dung', Auth::guard('sanctum')->user()->id)
            ->orderBy('created_at', 'desc') // Sắp xếp theo ngày tạo, nếu muốn
            ->get();

        return response()->json([
            'status' => 1,
            'data' => $ghiChus,
        ]);
    }

    public function updateFree(Request $request, $id)
    {
        $request->validate([
            'noi_dung' => 'required|string',
        ]);

        $ghiChu = GhiChu::where('id', $id)
            ->where('id_nguoi_dung', Auth::guard('sanctum')->user()->id)
            ->first();

        if (!$ghiChu) {
            return response()->json(['status' => 0, 'message' => 'Ghi chú không tồn tại']);
        }

        $ghiChu->noi_dung = $request->noi_dung;
        $ghiChu->save();

        return response()->json([
            'status' => 1,
            'message' => 'Ghi chú đã được cập nhật',
            'data' => $ghiChu,
        ]);
    }

    public function destroyFree($id)
    {
        $user = Auth::guard('sanctum')->user();

        $ghiChu = GhiChu::where('id', $id)
            ->where('id_nguoi_dung', $user->id)
            ->first();

        if (!$ghiChu) {
            return response()->json([
                'status' => 0,
                'message' => 'Ghi chú không tồn tại hoặc bạn không có quyền xóa.'
            ]);
        }

        $ghiChu->delete();

        return response()->json([
            'status' => 1,
            'message' => 'Ghi chú đã được xóa thành công.'
        ]);
    }
}
