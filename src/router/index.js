import { createRouter, createWebHistory } from "vue-router"; // cài vue-router: npm install vue-router@next --save
import checkAdminLogin from "./checkAdminLogin";
import checkKhachHangLogin from "./checkKhachHangLogin";
const routes = [
  {
    path: "/",
    component: () => import("../components/Client/TrangChu/index.vue"),
    meta: { layout: "client" },
  },
  {
    path: "/demo",
    component: () => import("../components/Test/test.vue"),
    meta: { layout: "blank" },
  },
  {
    path: "/kich-hoat/:id_khach_hang",
    component: () => import("../components/KhachHang/KichHoat/index.vue"),
    meta: { layout: "blank" },
    props: true,
  },
  {
    path: "/chi-tiet-khoa-hoc/:id_khoa_hoc-:slug_khoa_hoc",
    component: () => import("../components/Client/KhoaHoc/index.vue"),
    meta: { layout: "client" },
    props: true,
  },
  {
    path: "/bai-viet",
    component: () => import("../components/Client/BaiViet/index.vue"),
    meta: { layout: "client" },
  },
  {
    path: "/trac-nghiem",
    component: () => import("../components/Client/TracNghiem/index.vue"),
    meta: { layout: "client" },
    beforeEnter: checkKhachHangLogin,
  },
  {
    path: "/danh-sach-khoa-hoc",
    component: () => import("../components/Client/DanhSachKhoaHoc/index.vue"),
    meta: { layout: "client" },
    beforeEnter: checkKhachHangLogin,
  },
  {
    path: "/profile",
    component: () => import("../components/KhachHang/Profile/index.vue"),
    meta: { layout: "client" },
    beforeEnter: checkKhachHangLogin,
  },
  {
    path: "/admin/loai-khoa-hoc",
    component: () => import("../components/Admin/LoaiKhoaHoc/index.vue"),
    beforeEnter: checkAdminLogin,
  },
  {
    path: "/admin/khach-hang",
    component: () => import("../components/Admin/KhachHang/index.vue"),
    beforeEnter: checkAdminLogin,
  },
  {
    path: "/admin/phan-quyen",
    component: () => import("../components/Admin/PhanQuyen/index.vue"),
    beforeEnter: checkAdminLogin,
  },
  {
    path: "/admin/lich-su-giao-dich",
    component: () => import("../components/Admin/LichSuGiaoDich/index.vue"),
    beforeEnter: checkAdminLogin,
  },
  {
    path: "/admin/nhan-vien",
    component: () => import("../components/Admin/NhanVien/index.vue"),
    beforeEnter: checkAdminLogin,
  },
  {
    path: "/admin/bai-hoc",
    component: () => import("../components/Admin/BaiHoc/index.vue"),
    beforeEnter: checkAdminLogin,
  },
  {
    path: "/admin/chart",
    component: () => import("../components/Admin/Chart/index.vue"),
    beforeEnter: checkAdminLogin,
  },
  {
    path: "/khach-hang/dang-nhap",
    component: () => import("../components/KhachHang/DangNhap/index.vue"),
    meta: { layout: "blank" },
  },
  {
    path: "/khach-hang/dang-ky",
    component: () => import("../components/KhachHang/DangKi/index.vue"),
    meta: { layout: "blank" },
  },
  {
    path: "/khach-hang/reset-password",
    component: () => import("../components/KhachHang/QuenMatKhau/index.vue"),
    meta: { layout: "blank" },
  },
  {
    path: "/khach-hang/doi-mat-khau/:hash_reset",
    component: () => import("../components/KhachHang/DoiMatKhau/index.vue"),
    meta: { layout: "blank" },
    props: true,
  },
  {
    path: "/admin/dang-nhap",
    component: () => import("../components/Admin//DangNhap/index.vue"),
    meta: { layout: "blank" },
  },
  {
    path: "/admin/bai-viet",
    component: () => import("../components/Admin/BaiViet/index.vue"),
    beforeEnter: checkAdminLogin,
  },
  {
    path: "/admin/trac-nghiem",
    component: () => import("../components/Admin/TracNghiem/index.vue"),
    beforeEnter: checkAdminLogin,
  },
  {
    path: "/admin/profile",
    component: () => import("../components/Admin/Profile/index.vue"),
    beforeEnter: checkAdminLogin,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes: routes,
});

export default router;
