<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhoaHocFreeRequest;
use App\Http\Requests\upDateKhoaHocFreeRequest;
use App\Http\Requests\XoaKhoaHocFreeRequest;
use App\Models\BaiHocFree;
use App\Models\KhoaHocFree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ChiTietPhanQuyen;

class KhoaHocFreeController extends Controller
{
    public function store(KhoaHocFreeRequest $request)
    {
        $id_chuc_nang = 19; //Thêm mới loại khóa học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        KhoaHocFree::create([
            'title'          => $request->title,
            'slug'           => $request->slug,
            'image'          => $request->image,
            'description'    => $request->description,
            'students_count' => $request->students_count,
            'lesson_count'   => $request->lesson_count,
            'duration'       => $request->duration,
            'is_free'        => $request->is_free,
        ]);
        return response()->json([
            'status'  => 1,
            'message' => 'Đã thêm mới loại khóa ' . $request->ten_khoa_hoc . ' thành công.'
        ]);
    }
    public function getdata()
    {
        $id_chuc_nang = 20; //Lấy dữ liệu loại khóa học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = KhoaHocFree::get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function getdataOpen()
    {
        $data = KhoaHocFree::where('is_free', 1)->get();
        return response()->json([
            'data1'  => $data
        ]);
    }

    public function destroy(XoaKhoaHocFreeRequest $request)
    {
        $id_chuc_nang = 21; //Xóa loại khóa học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        KhoaHocFree::where('id', $request->id)->delete();
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Bạn đã xóa loại khóa ' . $request->title . ' thành công!'
        ]);
    }

    public function update(upDateKhoaHocFreeRequest $request)
    {
        $id_chuc_nang = 22; //Cập nhật loại khóa học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        KhoaHocFree::where('id', $request->id)->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'image' => $request->image,
            'description' => $request->description,
            'students_count' => $request->students_count,
            'lesson_count' => $request->lesson_count,
            'duration' => $request->duration,
            'is_free' => $request->is_free,
        ]);
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Bạn đã cập nhật loại khóa ' . $request->title . ' thành công'
        ]);
    }

    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 23; //Đổi trạng thái loại khóa học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $loaiKhoaHoc = KhoaHocFree::where('id', $request->id)->first();

        if ($loaiKhoaHoc->is_free == 1) {
            $loaiKhoaHoc->is_free = 0;
            $loaiKhoaHoc->save();
        } else {
            $loaiKhoaHoc->is_free = 1;
            $loaiKhoaHoc->save();
        }
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Bạn đã cập nhật loại khóa ' . $request->title . ' thành công'
        ]);
    }

    public function search(Request $request)
    {
        $id_chuc_nang = 24; //Tìm kiếm khóa học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = KhoaHocFree::where('title', 'like', $noi_dung)
            ->orwhere('description', 'like', $noi_dung)
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function chiTietKhoaHoc($id)
    {
        $data = KhoaHocFree::where('id', $id)->where('is_free', 1)->first();
        if ($data) {
            $list_bai_hoc = BaiHocFree::where('id_khoa_hoc_free', $id)->get();
            $isRegistered = false;
            return response()->json([
                'status'    => true,
                'data'      => $data,
                'list_bai_hoc' => $list_bai_hoc,
                'is_registered' => $isRegistered
            ]);
        } else {
            return response()->json([
                'status'       => false,
                'message'      => 'Không tìm thấy loại khóa học'
            ]);
        }
    }

    public function getdataKH()
    {
        $data = KhoaHocFree::get();
        return response()->json([
            'data' => $data
        ]);
    }

}
