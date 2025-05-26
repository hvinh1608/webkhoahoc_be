<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoaiKhoaHocRequestCreate;
use App\Http\Requests\upDateLoaiKhoaHocRequest;
use App\Http\Requests\XoaLoaiKhoaHocRequest;
use App\Models\BaiHoc;
use App\Models\ChiTietPhanQuyen;
use App\Models\KhoaHocFree;
use App\Models\LoaiKhoaHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ThongTinDangKy;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThongBaoKhoaHocMoi;
use App\Models\TienDoHocTap;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\GuiChungChiMail;
use App\Models\ChiTietKhoaHoc;
use Illuminate\Support\Facades\DB;

class LoaiKhoaHocController extends Controller
{
    public function store(LoaiKhoaHocRequestCreate $request)
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

        $khoaHoc = LoaiKhoaHoc::create([
            'ten_khoa_hoc'         => $request->ten_khoa_hoc,
            'slug_khoa_hoc'        => $request->slug_khoa_hoc,
            'hinh_anh'             => $request->hinh_anh,
            'mo_ta_ngan'           => $request->mo_ta_ngan,
            'tinh_trang'           => $request->tinh_trang,
            'gia_ban'              => $request->gia_ban,
            'gia_goc'              => $request->gia_goc,
        ]);

        $emails = ThongTinDangKy::pluck('email');
        foreach ($emails as $email) {
            $link = 'http://localhost:5173/chi-tiet-khoa-hoc/' . $khoaHoc->id . '-' . $khoaHoc->slug_khoa_hoc;
            Mail::to($email)->send(new ThongBaoKhoaHocMoi(
                'Khóa học mới: ' . $khoaHoc->ten_khoa_hoc,
                'Chúng tôi vừa ra mắt khóa học mới "' . $khoaHoc->ten_khoa_hoc . '". Xem ngay tại: ' . $link
            ));
        }

        return response()->json([
            'status'  => 1,
            'message' => 'Đã thêm mới loại khóa ' . $request->ten_khoa_hoc . ' thành công.'
        ]);
    }

    public function getData()
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
        $data = LoaiKhoaHoc::get();
        return response()->json([
            'data1' => $data
        ]);
    }
    public function getDataOpen()
    {
        $data = LoaiKhoaHoc::where('tinh_trang', 1)->get();
        return response()->json([
            'data'  => $data
        ]);
    }

    public function getDataKH()
    {
        $data = LoaiKhoaHoc::get();
        $data_2 = KhoaHocFree::get();
        return response()->json([
            'data'  => $data,
            'data_2' => $data_2
        ]);
    }

    public function destroy(XoaLoaiKhoaHocRequest $request)
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
        LoaiKhoaHoc::where('id', $request->id)->delete();
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Bạn đã xóa loại khóa ' . $request->ten_khoa_hoc . ' thành công!'
        ]);
    }

    public function update(upDateLoaiKhoaHocRequest $request)
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
        LoaiKhoaHoc::where('id', $request->id)->update([
            'ten_khoa_hoc'         => $request->ten_khoa_hoc,
            'slug_khoa_hoc'        => $request->slug_khoa_hoc,
            'hinh_anh'             => $request->hinh_anh,
            'mo_ta_ngan'           => $request->mo_ta_ngan,
            'tinh_trang'           => $request->tinh_trang,
            'gia_ban'              => $request->gia_ban,
            'gia_goc'              => $request->gia_goc,
        ]);
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Bạn đã cập nhật loại khóa ' . $request->ten_khoa_hoc . ' thành công'
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
        $loaiKhoaHoc = LoaiKhoaHoc::where('id', $request->id)->first();

        if ($loaiKhoaHoc->tinh_trang == 1) {
            $loaiKhoaHoc->tinh_trang = 0;
            $loaiKhoaHoc->save();
        } else {
            $loaiKhoaHoc->tinh_trang = 1;
            $loaiKhoaHoc->save();
        }
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Bạn đã cập nhật loại khóa ' . $request->ten_khoa_hoc . ' thành công'
        ]);
    }

    public function search(Request $request)
    {
        $id_chuc_nang = 24; //Tìm kiếm loại khóa học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = LoaiKhoaHoc::where('ten_khoa_hoc', 'like', $noi_dung)
            ->orwhere('mo_ta_ngan', 'like', $noi_dung)
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function chiTietKhoaHoc($id)
    {
        $data = LoaiKhoaHoc::where('id', $id)->where('tinh_trang', 1)->first();
        if ($data) {
            $list_bai_hoc = BaiHoc::where('id_khoa_hoc', $id)->get();
            foreach ($list_bai_hoc as $baiHoc) {
                $baiHoc->has_quiz = \App\Models\TracNghiem::where('khoa_hoc_id', $id)->exists();
                // Nếu bảng TracNghiem có trường bai_hoc_id thì sửa lại:
                // $baiHoc->has_quiz = \App\Models\TracNghiem::where('bai_hoc_id', $baiHoc->id)->exists();
            }
            return response()->json([
                'status'    => true,
                'data'      => $data,
                'list_bai_hoc' => $list_bai_hoc
            ]);
        } else {
            return response()->json([
                'status'       => false,
                'message'      => 'Không tìm thấy loại khóa học'
            ]);
        }
    }

    public function kiemTraHoanThanhKhoaHoc($idKhoaHoc, $idKhachHang)
    {
        // Lấy danh sách ID các bài học trong khóa học
        $dsBaiHoc = BaiHoc::where('id_khoa_hoc', $idKhoaHoc)->pluck('id');

        // Tổng số bài học
        $tongBaiHoc = $dsBaiHoc->count();

        // Số bài học mà khách hàng đã hoàn thành
        $daHoc = TienDoHocTap::where('khach_hang_id', $idKhachHang)
            ->whereIn('bai_hoc_id', $dsBaiHoc)
            ->where('da_hoan_thanh', true)
            ->count();

        return $tongBaiHoc > 0 && $tongBaiHoc === $daHoc;
    }


    public function taoChungChi($idKhoaHoc)
    {
        $khachHang = Auth::guard('sanctum')->user();
        $khoaHoc = LoaiKhoaHoc::findOrFail($idKhoaHoc);

        if (!$this->kiemTraHoanThanhKhoaHoc($idKhoaHoc, $khachHang->id)) {
            return response()->json(['message' => 'Bạn chưa hoàn thành khóa học'], 400);
        }

        $tenNguoiDung = htmlspecialchars($khachHang->ho_va_ten, ENT_QUOTES, 'UTF-8');
        $tenKhoaHoc = htmlspecialchars($khoaHoc->ten_khoa_hoc, ENT_QUOTES, 'UTF-8');
        $ngayHoanThanh = now()->format('d/m/Y');

        $pdf = Pdf::loadView('certificate', [
            'tenNguoiDung' => $tenNguoiDung,
            'tenKhoaHoc' => $tenKhoaHoc,
            'ngayHoanThanh' => $ngayHoanThanh,
        ]);

        $pdf->setOptions([
            'defaultFont' => 'DejaVu Sans',
        ]);


        // Gửi mail kèm chứng chỉ
        Mail::to($khachHang->email)->send(new GuiChungChiMail(
            $tenNguoiDung,
            $tenKhoaHoc,
            $ngayHoanThanh,
            $pdf
        ));

        // Trả về file PDF để tải xuống
        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="chung-chi-hoan-thanh.pdf"');
    }

    public function hoanTienKhoaHoc(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $khoaHocId = $request->input('id_khoa_hoc');

        $muaKhoaHoc = \App\Models\ChiTietKhoaHoc::where('id_khach_hang', $user->id)
            ->where('id_khoa_hoc', $khoaHocId)
            ->where('da_thu_hoi', false)
            ->first();

        if (!$muaKhoaHoc) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy giao dịch mua khóa học này!'], 404);
        }

        // ======= KIỂM TRA TIẾN ĐỘ HỌC =======
        $dsBaiHoc = \App\Models\BaiHoc::where('id_khoa_hoc', $khoaHocId)->pluck('id');
        $soBaiDaHoc = \App\Models\TienDoHocTap::where('khach_hang_id', $user->id)
            ->whereIn('bai_hoc_id', $dsBaiHoc)
            ->where('da_hoan_thanh', true)
            ->count();
        $tongBai = $dsBaiHoc->count();
        $tiendo = $tongBai > 0 ? ($soBaiDaHoc / $tongBai) * 100 : 0;

        if ($tiendo > 20) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn đã học quá 20% khóa học, không thể hoàn tiền!'
            ]);
        }
        // ======= HẾT KIỂM TRA TIẾN ĐỘ =======

        if (!empty($muaKhoaHoc->da_hoan_tien) && $muaKhoaHoc->da_hoan_tien) {
            return response()->json(['status' => 0, 'message' => 'Khóa học này đã được hoàn tiền trước đó!'], 400);
        }

        // Cộng tiền vào số dư khách hàng
        $khachHang = \App\Models\KhachHang::find($user->id);
        $khachHang->so_du += $muaKhoaHoc->so_tien_mua;
        $khachHang->save();

        // Đánh dấu đã hoàn tiền và thu hồi
        $muaKhoaHoc->da_hoan_tien = true;
        $muaKhoaHoc->da_thu_hoi = true;
        $muaKhoaHoc->save();

        $dsBaiHoc = \App\Models\BaiHoc::where('id_khoa_hoc', $khoaHocId)->pluck('id');
        \App\Models\TienDoHocTap::where('khach_hang_id', $user->id)
            ->whereIn('bai_hoc_id', $dsBaiHoc)
            ->delete();

        return response()->json(['status' => 1, 'message' => 'Đã hoàn tiền vào số dư tài khoản!']);
    }
}
