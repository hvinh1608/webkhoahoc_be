<?php

use App\Http\Controllers\BaiHocController;
use App\Http\Controllers\BaiHocFreeController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChiTietKhoaHocController;
use App\Http\Controllers\ChiTietKhoaHocFreeController;
use App\Http\Controllers\ChiTietPhanQuyenController;
use App\Http\Controllers\ChucNangController;
use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\KhoaHocFreeController;
use App\Http\Controllers\LoaiKhoaHocController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TaiChinhController;
use App\Http\Controllers\TracNghiemController;
use Illuminate\Support\Facades\Route;

// Auto Giao Dich
Route::get('/auto-giao-dich', [TaiChinhController::class, 'autoGiaoDich']);
Route::post('/check-mua-khoa-hoc', [TaiChinhController::class, 'checkMuaKhoaHoc']);

// Admin Nhan Vien
Route::get('/admin/nhan-vien/data', [NhanVienController::class, 'getData'])->middleware("nhanVienMiddle");
Route::post('/admin/nhan-vien/tim-kiem', [NhanVienController::class, 'timKiemNhanVien'])->middleware("nhanVienMiddle");
Route::post('/admin/nhan-vien/create', [NhanVienController::class, 'store'])->middleware("nhanVienMiddle");
Route::post('/admin/nhan-vien/change-status', [NhanVienController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/nhan-vien/update', [NhanVienController::class, 'updateNhanVien'])->middleware("nhanVienMiddle");
Route::post('/admin/nhan-vien/delete', [NhanVienController::class, 'deleteNhanVien'])->middleware("nhanVienMiddle");
Route::post('/admin/dang-nhap', [NhanVienController::class, 'login']);
Route::get('/admin/nhan-vien/check-login', [NhanVienController::class, 'checkLogin']);
Route::get('/admin/logout', [NhanVienController::class, 'logOut']);
Route::get('/admin/logout-all', [NhanVienController::class, 'logOutAll']);

// Admin Khach Hang
Route::get('/admin/khach-hang/data', [KhachHangController::class, 'getData'])->middleware("nhanVienMiddle");
Route::post('/admin/khach-hang/delete', [KhachHangController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/khach-hang/update', [KhachHangController::class, 'update'])->middleware("nhanVienMiddle");
Route::post('/admin/khach-hang/change-status', [KhachHangController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/khach-hang/change-status-KH', [KhachHangController::class, 'changeStatusKH'])->middleware("nhanVienMiddle");
Route::post('/admin/khach-hang/tim-kiem', [KhachHangController::class, 'search'])->middleware("nhanVienMiddle");

// Admin Bai Hoc
Route::post('/admin/bai-hoc/create', [BaiHocController::class, 'store'])->middleware("nhanVienMiddle");
Route::get('/admin/bai-hoc/data', [BaiHocController::class, 'getdata'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-hoc/delete', [BaiHocController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-hoc/update', [BaiHocController::class, 'update'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-hoc/change-status', [BaiHocController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-hoc/tim-kiem', [BaiHocController::class, 'search'])->middleware("nhanVienMiddle");

// Admin Bai Hoc Free
Route::post('/admin/bai-hoc-free/create', [BaiHocFreeController::class, 'store'])->middleware("nhanVienMiddle");
Route::get('/admin/bai-hoc-free/data', [BaiHocFreeController::class, 'getdata'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-hoc-free/delete', [BaiHocFreeController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-hoc-free/update', [BaiHocFreeController::class, 'update'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-hoc-free/change-status', [BaiHocFreeController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-hoc-free/tim-kiem', [BaiHocFreeController::class, 'search'])->middleware("nhanVienMiddle");

// Admin Bai Viet
Route::post('/admin/bai-viet/create', [BaiVietController::class, 'store'])->middleware("nhanVienMiddle");
Route::get('/admin/bai-viet/data', [BaiVietController::class, 'getdata'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-viet/delete', [BaiVietController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-viet/update', [BaiVietController::class, 'update'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-viet/change-status', [BaiVietController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-viet/tim-kiem', [BaiVietController::class, 'search'])->middleware("nhanVienMiddle");
Route::get('/bai-viet/data-open', [BaiVietController::class, 'getdataOpen']);
Route::get('/bai-viet/{id}', [BaiVietController::class, 'show']);

// Admin Trac Nghiem
Route::post('/admin/trac-nghiem/create', [TracNghiemController::class, 'store'])->middleware("nhanVienMiddle");
Route::get('/admin/trac-nghiem/data', [TracNghiemController::class, 'getdata'])->middleware("nhanVienMiddle");
Route::post('/admin/trac-nghiem/delete', [TracNghiemController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/trac-nghiem/update', [TracNghiemController::class, 'update'])->middleware("nhanVienMiddle");
Route::post('/admin/trac-nghiem/change-status', [TracNghiemController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/trac-nghiem/tim-kiem', [TracNghiemController::class, 'search'])->middleware("nhanVienMiddle");

// Admin Chart
Route::get('/admin/chart/chart-tai-chinh', [ChartController::class, 'chart'])->middleware("nhanVienMiddle");
Route::get('/admin/chart/khoa-hoc', [ChartController::class, 'chartKhoaHoc'])->middleware("nhanVienMiddle");
Route::get('/admin/chart/khach-hang', [ChartController::class, 'chartKhachHang'])->middleware("nhanVienMiddle");
Route::get('/admin/chart/thong-ke-danh-gia', [ChartController::class, 'chartDanhGia'])->middleware("nhanVienMiddle");

// Admin Phan Quyen
Route::post('/admin/phan-quyen/create', [PhanQuyenController::class, 'themQuyen'])->middleware("nhanVienMiddle");
Route::get('/admin/phan-quyen/data', [PhanQuyenController::class, 'getData'])->middleware("nhanVienMiddle");
Route::post('/admin/phan-quyen/delete', [PhanQuyenController::class, 'xoaQuyen'])->middleware("nhanVienMiddle");
Route::post('/admin/phan-quyen/update', [PhanQuyenController::class, 'updateQuyen'])->middleware("nhanVienMiddle");
Route::post('/admin/phan-quyen/tim-kiem', [PhanQuyenController::class, 'search'])->middleware("nhanVienMiddle");
Route::get('/admin/phan-quyen/chi-tiet-chuc-nang/data', [ChucNangController::class, 'getData'])->middleware("nhanVienMiddle");

// Admin Loai Khoa Hoc
Route::post('/admin/loai-khoa-hoc/create', [LoaiKhoaHocController::class, 'store'])->middleware("nhanVienMiddle");
Route::post('/admin/loai-khoa-hoc/delete', [LoaiKhoaHocController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/loai-khoa-hoc/update', [LoaiKhoaHocController::class, 'update'])->middleware("nhanVienMiddle");
Route::get('/admin/loai-khoa-hoc/data', [LoaiKhoaHocController::class, 'getData'])->middleware("nhanVienMiddle");
Route::post('/admin/loai-khoa-hoc/change-status', [LoaiKhoaHocController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/loai-khoa-hoc/tim-kiem', [LoaiKhoaHocController::class, 'search'])->middleware("nhanVienMiddle");

// Admin Khoa Hoc Free
Route::post('/admin/khoa-hoc-free/create', [KhoaHocFreeController::class, 'store'])->middleware("nhanVienMiddle");
Route::post('/admin/khoa-hoc-free/update', [KhoaHocFreeController::class, 'update'])->middleware("nhanVienMiddle");
Route::post('/admin/khoa-hoc-free/delete', [KhoaHocFreeController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/khoa-hoc-free/tim-kiem', [KhoaHocFreeController::class, 'search'])->middleware("nhanVienMiddle");
Route::post('/admin/khoa-hoc-free/change-status', [KhoaHocFreeController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::get('/admin/khoa-hoc-free/data', [KhoaHocFreeController::class, 'getdata'])->middleware("nhanVienMiddle");
Route::get('/khoa-hoc-free/data-open', [KhoaHocFreeController::class, 'getdataOpen']);

// Khach Hang
Route::post('/khach-hang/dang-ky', [KhachHangController::class, 'store']);
Route::post('/khach-hang/dang-nhap', [KhachHangController::class, 'login']);
Route::post('/khach-hang/dang-nhap-google', [KhachHangController::class, 'loginGoogle']);
Route::get('/khach-hang/logout', [KhachHangController::class, 'logOut']);
Route::get('/khach-hang/logout-all', [KhachHangController::class, 'logOutAll']);
Route::post('/khach-hang/quen-mat-khau', [KhachHangController::class, 'resultPassword']);
Route::post('/khach-hang/doi-mat-khau', [KhachHangController::class, 'changePassword']);
Route::get('/khach-hang/lay-thong-tin-profile', [KhachHangController::class, 'layThongTinProfile']);
Route::post('/khach-hang/thay-doi-thong-tin-profile', [KhachHangController::class, 'thaydoiProfile']);
Route::post('/khach-hang/doi-mat-khau-profile', [KhachHangController::class, 'changePasswordProfile']);
Route::post('/khach-hang/lay-so-du', [KhachHangController::class, 'laySoDu']);
Route::post('/khach-hang/kich-hoat-tai-khoan', [KhachHangController::class, 'kichHoatTaiKhoan']);
Route::get('/khach-hang/check-login', [KhachHangController::class, 'checkLogin']);
Route::post('/khach-hang/xac-nhan-nap-tien', [KhachHangController::class, 'xacNhanNapTien'])->middleware("khachHangMiddle");
Route::get('/khach-hang/thong-tin', [KhachHangController::class, 'thongTin'])->middleware("khachHangMiddle");


// Danh Gia
Route::post('/danh-gia', [DanhGiaController::class, 'store']);
Route::get('/danh-gia', [DanhGiaController::class, 'index']);
Route::delete('/danh-gia/{id}', [DanhGiaController::class, 'destroy']);

// Home Page
Route::get('/home-page/loai-khoa-hoc/data-open', [LoaiKhoaHocController::class, 'getDataOpen']);
Route::get('/home-page/loai-khoa-hoc/chi-tiet/{id}', [LoaiKhoaHocController::class, 'chiTietKhoaHoc']);
Route::get('/home-page/khoa-hoc-free/chi-tiet/{id}', [KhoaHocFreeController::class, 'chiTietKhoaHoc']);
Route::get('/home-page/loai-khoa-hoc/danh-sach-khoa-hoc', [ChiTietKhoaHocController::class, 'danhSachKhoaHoc'])->middleware("khachHangMiddle");
Route::post('/home-page/mua-khoa-hoc/create', [ChiTietKhoaHocController::class, 'store'])->middleware("khachHangMiddle");
Route::post('/home-page/loai-khoa-hoc-free/dang-ky', [ChiTietKhoaHocFreeController::class, 'danhSachDangKy'])->middleware("khachHangMiddle");
Route::get('/home-page/loai-khoa-hoc-free/danh-sach-khoa-hoc', [ChiTietKhoaHocFreeController::class, 'danhSachKhoaHoc'])->middleware("khachHangMiddle");

// Trac Nghiem
Route::get('/trac-nghiem/data-open', [TracNghiemController::class, 'getdataOpen'])->middleware("khachHangMiddle");
Route::post('/trac-nghiem/nop-bai', [TracNghiemController::class, 'nopBai'])->middleware("khachHangMiddle");

// Tai Chinh
Route::post('/admin/nap-tien/create', [TaiChinhController::class, 'napTien']);
Route::get('/admin/nap-tien/data', [TaiChinhController::class, 'getData']);
Route::post('/admin/nap-tien/data-one', [TaiChinhController::class, 'getDataOnePerson']);

// Chi Tiet Phan Quyen
Route::post('/admin/chi-tiet-phan-quyen/create', [ChiTietPhanQuyenController::class, 'store'])->middleware("nhanVienMiddle");
Route::post('/admin/chi-tiet-phan-quyen/data', [ChiTietPhanQuyenController::class, 'getData'])->middleware("nhanVienMiddle");
Route::post('/admin/chi-tiet-phan-quyen/delete', [ChiTietPhanQuyenController::class, 'xoaChiTietQuyen'])->middleware("nhanVienMiddle");

Route::get('/search', [SearchController::class, 'search']);
    
