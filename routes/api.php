<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaiHocController;
use App\Http\Controllers\BaiHocFreeController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ChiTietKhoaHocController;
use App\Http\Controllers\ChiTietKhoaHocFreeController;
use App\Http\Controllers\ChiTietPhanQuyenController;
use App\Http\Controllers\ChucNangController;
use App\Http\Controllers\ChuyenMucController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\GhiChuController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\KhoaHocFreeController;
use App\Http\Controllers\LoaiKhoaHocController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TaiChinhController;
use App\Http\Controllers\ThongTinDangKyController;
use App\Http\Controllers\TienDoHocTapController;
use App\Http\Controllers\TracNghiemController;
use App\Http\Controllers\GoiHocController;
use App\Http\Controllers\OnboardingController;
use Illuminate\Support\Facades\Route;

// Auto Giao Dich
Route::get('/auto-giao-dich', [TaiChinhController::class, 'autoGiaoDich']);
Route::post('/check-mua-khoa-hoc', [TaiChinhController::class, 'checkMuaKhoaHoc']);
Route::get('/test-auto-giaodich', [TaiChinhController::class, 'autoGiaoDich']);

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
Route::get('/bai-viet/data-open/{slug_chuyen_muc}', [BaiVietController::class, 'getdataOpen']);
Route::get('/bai-viet/data-open', [BaiVietController::class, 'getAllDataOpen']);
Route::get('/chi-tiet-bai-viet/{id}', [BaiVietController::class, 'show']);

// Admin Chuyen Muc
Route::get('/chuyen-muc/data', [ChuyenMucController::class, 'getData']);
Route::post('/chuyen-muc/create', [ChuyenMucController::class, 'store']);
Route::post('/chuyen-muc/delete/{id}', [ChuyenMucController::class, 'destroy']);
Route::post('/chuyen-muc/update', [ChuyenMucController::class, 'update']);
Route::post('/chuyen-muc/doi-trang-thai', [ChuyenMucController::class, 'doiTrangThai']);
Route::post('/chuyen-muc/tim-kiem', [ChuyenMucController::class, 'timKiem']);
Route::get('/client/chuyen-muc/data', [ChuyenMucController::class, 'getdataClient']);

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
Route::get('/khach-hang/loai-khoa-hoc/data', [LoaiKhoaHocController::class, 'getDataKH']);
Route::post('/admin/loai-khoa-hoc/change-status', [LoaiKhoaHocController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/loai-khoa-hoc/tim-kiem', [LoaiKhoaHocController::class, 'search'])->middleware("nhanVienMiddle");
Route::get('/loai-khoa-hoc/{id}/chung-chi', [LoaiKhoaHocController::class, 'taoChungChi'])->middleware("khachHangMiddle");

// Admin Khoa Hoc Free
Route::post('/admin/khoa-hoc-free/create', [KhoaHocFreeController::class, 'store'])->middleware("nhanVienMiddle");
Route::post('/admin/khoa-hoc-free/update', [KhoaHocFreeController::class, 'update'])->middleware("nhanVienMiddle");
Route::post('/admin/khoa-hoc-free/delete', [KhoaHocFreeController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/khoa-hoc-free/tim-kiem', [KhoaHocFreeController::class, 'search'])->middleware("nhanVienMiddle");
Route::post('/admin/khoa-hoc-free/change-status', [KhoaHocFreeController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::get('/admin/khoa-hoc-free/data', [KhoaHocFreeController::class, 'getdata'])->middleware("nhanVienMiddle");
Route::get('/khach-hang/khoa-hoc-free/data', [KhoaHocFreeController::class, 'getdataKH']);
Route::get('/khoa-hoc-free/data-open', [KhoaHocFreeController::class, 'getdataOpen']);
Route::get('/khoa-hoc-free/{id}/chung-chi', [KhoaHocFreeController::class, 'taoChungChi'])->middleware("khachHangMiddle");


// Khach Hang
Route::post('/khach-hang/dang-ky', [KhachHangController::class, 'store']);
Route::post('/khach-hang/dang-nhap', [KhachHangController::class, 'login']);
// Route::post('/khach-hang/dang-nhap-google', [KhachHangController::class, 'loginGoogle']);
Route::get('/khach-hang/logout', [KhachHangController::class, 'logOut']);
Route::get('/khach-hang/logout-all', [KhachHangController::class, 'logOutAll']);
Route::post('/khach-hang/quen-mat-khau', [KhachHangController::class, 'resultPassword']);
Route::post('/khach-hang/doi-mat-khau', [KhachHangController::class, 'changePassword']);
Route::get('/khach-hang/lay-thong-tin-profile', [KhachHangController::class, 'layThongTinProfile']);
Route::post('/khach-hang/thay-doi-thong-tin-profile', [KhachHangController::class, 'thaydoiProfile']);
Route::post('/khach-hang/update-profile-complete', [KhachHangController::class, 'updateProfileComplete']);
Route::get('/khach-hang/check-profile-complete', [KhachHangController::class, 'checkProfileComplete']);
Route::post('/khach-hang/thay-doi-avatar', [KhachHangController::class, 'thayDoiAvatar']);
Route::post('/khach-hang/doi-mat-khau-profile', [KhachHangController::class, 'changePasswordProfile']);
Route::post('/khach-hang/lay-so-du', [KhachHangController::class, 'laySoDu']);
Route::post('/khach-hang/kich-hoat-tai-khoan', [KhachHangController::class, 'kichHoatTaiKhoan']);
Route::get('/khach-hang/check-login', [KhachHangController::class, 'checkLogin']);
Route::post('/khach-hang/xac-nhan-nap-tien', [KhachHangController::class, 'xacNhanNapTien'])->middleware("khachHangMiddle");
Route::get('/khach-hang/thong-tin', [KhachHangController::class, 'thongTin'])->middleware("khachHangMiddle");
Route::post('/khach-hang/khoa-hoc/dang-ki', [KhachHangController::class, 'dangKiKhoaHoc']);
Route::get('/thong-tin-khach-hang/{id}', [KhachHangController::class, 'profile']);

// Danh Gia
Route::post('/danh-gia', [DanhGiaController::class, 'store']);
Route::get('/danh-gia', [DanhGiaController::class, 'index']);
Route::delete('/danh-gia/{id}', [DanhGiaController::class, 'destroy']);

// Home Page
Route::get('/home-page/loai-khoa-hoc/data-open', [LoaiKhoaHocController::class, 'getDataOpen']);
Route::get('/home-page/loai-khoa-hoc/chi-tiet/{id}', [LoaiKhoaHocController::class, 'chiTietKhoaHoc']);
Route::get('/home-page/khoa-hoc-free/chi-tiet/{id}', [KhoaHocFreeController::class, 'chiTietKhoaHoc'])->middleware("khachHangMiddle");
Route::get('/home-page/loai-khoa-hoc/danh-sach-khoa-hoc', [ChiTietKhoaHocController::class, 'danhSachKhoaHoc'])->middleware("khachHangMiddle");
Route::post('/home-page/mua-khoa-hoc/create', [ChiTietKhoaHocController::class, 'store'])->middleware("khachHangMiddle");
Route::post('/home-page/loai-khoa-hoc-free/dang-ky', [ChiTietKhoaHocFreeController::class, 'danhSachDangKy'])->middleware("khachHangMiddle");
Route::get('/home-page/loai-khoa-hoc-free/danh-sach-khoa-hoc', [ChiTietKhoaHocFreeController::class, 'danhSachKhoaHoc'])->middleware("khachHangMiddle");
Route::post('/hoan-tien-khoa-hoc', [LoaiKhoaHocController::class, 'hoanTienKhoaHoc'])->middleware("khachHangMiddle");

// Trac Nghiem
Route::get('/trac-nghiem/data-open', [TracNghiemController::class, 'getdataOpen'])->middleware("khachHangMiddle");
Route::post('/trac-nghiem/nop-bai', [TracNghiemController::class, 'nopBai'])->middleware("khachHangMiddle");
Route::post('/trac-nghiem/nop-bai-tn', [TracNghiemController::class, 'nopBaiTN'])->middleware("khachHangMiddle");
Route::get('/trac-nghiem/khoa-hoc/{khoaHocId}', [TracNghiemController::class, 'getByKhoaHoc'])->middleware("khachHangMiddle");

// Tai Chinh
Route::post('/admin/nap-tien/create', [TaiChinhController::class, 'napTien']);
Route::get('/admin/nap-tien/data', [TaiChinhController::class, 'getData']);
Route::post('/admin/nap-tien/data-one', [TaiChinhController::class, 'getDataOnePerson']);
Route::post('/webhook/sepay', [TaiChinhController::class, 'webhookSepay']);
Route::get('/khach-hang/check-trang-thai-nap-tien', [TaiChinhController::class, 'checkTrangThaiNapTien']);

// Chi Tiet Phan Quyen
Route::post('/admin/chi-tiet-phan-quyen/create', [ChiTietPhanQuyenController::class, 'store'])->middleware("nhanVienMiddle");
Route::post('/admin/chi-tiet-phan-quyen/data', [ChiTietPhanQuyenController::class, 'getData'])->middleware("nhanVienMiddle");
Route::post('/admin/chi-tiet-phan-quyen/delete', [ChiTietPhanQuyenController::class, 'xoaChiTietQuyen'])->middleware("nhanVienMiddle");

// Tìm Kiếm Trang Chủ
Route::get('/search', [SearchController::class, 'search']);

// Mail nhận thông tin
Route::post('/nhan-thong-tin', [ThongTinDangKyController::class, 'dangKy']);

// Bình luận Paid
Route::post('/binh-luan/create', [BinhLuanController::class, 'createBinhLuan'])->middleware("khachHangMiddle");
Route::post('/binh-luan/admin-tra-loi/{id}', [BinhLuanController::class, 'adminTraLoi'])->middleware("nhanVienMiddle");
Route::post('/tra-loi-binh-luan', [BinhLuanController::class, 'store'])->middleware("khachHangMiddle");
Route::post('/tra-loi-binh-luan-con', [BinhLuanController::class, 'store']);
Route::post('/binh-luan/{id}/like', [BinhLuanController::class, 'like'])->middleware("khachHangMiddle");
Route::post('/tra-loi-binh-luan/{id}/like', [BinhLuanController::class, 'likeTraLoiCon'])->middleware("khachHangMiddle");
Route::get('/binh-luan', [BinhLuanController::class, 'getTatCaBinhLuan'])->middleware('nhanVienMiddle');
Route::get('/binh-luan/{id_khoa_hoc}', [BinhLuanController::class, 'getBinhLuan']);
Route::delete('/binh-luan/{id}', [BinhLuanController::class, 'xoaBinhLuan']);
Route::delete('/tra-loi-binh-luan/{id}', [BinhLuanController::class, 'xoaTraLoi']);

// Bình luận Free
Route::post('/binh-luan-free/create', [BinhLuanController::class, 'createBinhLuanFree'])->middleware("khachHangMiddle");
Route::post('/tra-loi-binh-luan-free', [BinhLuanController::class, 'storeFree'])->middleware("khachHangMiddle");
Route::post('/tra-loi-binh-luan-con-free', [BinhLuanController::class, 'storeFree']);
Route::post('/binh-luan-free/{id}/like', [BinhLuanController::class, 'likeFree'])->middleware("khachHangMiddle");
Route::get('/binh-luan-free/{id_khoa_hoc_free}', [BinhLuanController::class, 'getBinhLuanFree']);

// Ghi chú Paid
Route::post('/ghi-chu', [GhiChuController::class, 'store'])->middleware("khachHangMiddle");
Route::get('/ghi-chu/{id_khoa_hoc}', [GhiChuController::class, 'show'])->middleware("khachHangMiddle");
Route::put('/ghi-chu/{id}', [GhiChuController::class, 'update']);
Route::delete('/ghi-chu/{id}', [GhiChuController::class, 'destroy']);

// Ghi chú Paid
Route::post('/ghi-chu-free', [GhiChuController::class, 'storeFree'])->middleware("khachHangMiddle");
Route::get('/ghi-chu-free/{id_khoa_hoc_free}', [GhiChuController::class, 'showFree'])->middleware("khachHangMiddle");
Route::put('/ghi-chu-free/{id}', [GhiChuController::class, 'updateFree']);
Route::delete('/ghi-chu-free/{id}', [GhiChuController::class, 'destroyFree']);

// Coupon
Route::post('/apply-coupon', [CouponController::class, 'applyCoupon'])->middleware("khachHangMiddle");
Route::get('/coupons', [CouponController::class, 'index']);
Route::post('/coupons', [CouponController::class, 'createCoupon'])->middleware('nhanVienMiddle');
Route::put('/coupons/{id}', [CouponController::class, 'updateCoupon'])->middleware('nhanVienMiddle');
Route::delete('/coupons/{id}', [CouponController::class, 'deleteCoupon'])->middleware('nhanVienMiddle');


// Tien Do Hoc Tap
Route::post('/danh-dau-hoan-thanh', [TienDoHocTapController::class, 'danhDauHoanThanh'])->middleware("khachHangMiddle");
Route::get('/tien-do-khoa-hoc/{id}', [TienDoHocTapController::class, 'layTienDoKhoaHoc'])->middleware("khachHangMiddle");
Route::get('/lich-su-diem-danh', [TienDoHocTapController::class, 'lichSuDiemDanh'])->middleware("khachHangMiddle");
Route::post('/fake-diem-danh', [TienDoHocTapController::class, 'fakeDiemDanh'])->middleware("khachHangMiddle");
Route::get('/streak', [TienDoHocTapController::class, 'tinhStreak'])->middleware("khachHangMiddle");
Route::post('/danh-dau-hoan-thanh-free', [TienDoHocTapController::class, 'danhDauHoanThanhFree'])->middleware("khachHangMiddle");
Route::get('/tien-do-khoa-hoc-free/{id}', [TienDoHocTapController::class, 'layTienDoKhoaHocFree'])->middleware("khachHangMiddle");
Route::post('/nhan-phan-thuong', [TienDoHocTapController::class, 'nhanPhanThuong'])->middleware("khachHangMiddle");
Route::get('/bang-xep-hang', [TienDoHocTapController::class, 'bangXepHang']);
Route::get('/test-leaderboard-mail', [TienDoHocTapController::class, 'testMail']);

//Gio Hang
Route::get('/gio-hang', [GioHangController::class, 'getCart'])->middleware("khachHangMiddle");
Route::post('/gio-hang/add', [GioHangController::class, 'addToCart'])->middleware("khachHangMiddle");
Route::post('/gio-hang/remove', [GioHangController::class, 'removeFromCart'])->middleware("khachHangMiddle");
Route::post('/gio-hang/clear', [GioHangController::class, 'clearCart'])->middleware("khachHangMiddle");

// Goi Hoc
Route::post('/mua-goi', [GoiHocController::class, 'muaGoi'])->middleware('khachHangMiddle');
Route::get('/goi-da-mua', [GoiHocController::class, 'goiDaMua'])->middleware('khachHangMiddle');
Route::post('/hoan-tien-goi', [GoiHocController::class, 'hoanTienGoi'])->middleware('khachHangMiddle');

//ChatBot
Route::post('/chat/save', [ChatController::class, 'save'])->middleware('khachHangMiddle');
Route::get('/chat/history', [ChatController::class, 'history'])->middleware('khachHangMiddle');
Route::post('/chat/upload', [ChatController::class, 'uploadFile'])->middleware('khachHangMiddle');

//Login Git
Route::get('auth/github/redirect', [AuthController::class, 'redirectToGithub']);
Route::get('auth/github/callback', [AuthController::class, 'handleGithubCallback']);

//Login Facebook
Route::get('auth/facebook/redirect', [AuthController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [AuthController::class, 'handleFacebookCallback']);

Route::get('/check-onboarding', [OnboardingController::class, 'check'])->middleware('khachHangMiddle');
Route::post('/onboarding-survey', [OnboardingController::class, 'onboardingSurvey'])->middleware('khachHangMiddle');
