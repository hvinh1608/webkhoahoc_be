<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mt-2">Danh Sách Khách Hàng</h5>
                </div>
                <div class="card-body">
                    <div class="input-group mt-3 w-100">
                        <input v-on:keyup.enter="timKiem()" v-model="search.noi_dung" type="text"
                            class="form-control search-control border border-1 border-secondary"
                            placeholder="Search..." />
                        <span class="position-absolute top-50 search-show translate-middle-y" style="left: 15px"><i
                                class="bx bx-search"></i></span>
                        <button v-on:click="timKiem()" class="btn btn-outline-secondary" type="button">
                            Tìm Kiếm
                        </button>
                    </div>
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Họ Và Tên</th>
                                <th>Email</th>
                                <th>Số Điện Thoại</th>
                                <th>Ngày Sinh</th>
                                <th>Trạng Thái</th>
                                <th>Kích Hoạt</th>
                                <th>Số Dư</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(v, k) in list" :key="k">
                                <tr class="align-middle">
                                    <th class="text-center">{{ k + 1 }}</th>
                                    <td>{{ v.ho_va_ten }}</td>
                                    <td>{{ v.email }}</td>
                                    <td class="text-center">{{ v.so_dien_thoai }}</td>
                                    <td class="text-center">{{ v.ngay_sinh }}</td>
                                    <td class="align-middle text-center">
                                        <template v-if="v.is_block == 0">
                                            <button v-on:click="doiTrangThai(v)" class="btn btn-success btn-sm">
                                                Hoạt Động
                                            </button>
                                        </template>
                                        <template v-else>
                                            <button v-on:click="doiTrangThai(v)" class="btn btn-danger btn-sm">
                                                Đã Khóa
                                            </button>
                                        </template>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm">Đã Kích Hoạt</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-secondary btn-sm w-100">
                                            {{ formatVND(v.so_du) }}
                                        </button>
                                    </td>
                                    <td class="text-center text-nowrap">
                                        <button v-on:click="loadLichSu(v)" class="btn btn-success btn-sm me-1"
                                            data-bs-toggle="modal" data-bs-target="#lichsuModal">
                                            Lịch Sử
                                        </button>
                                        <button v-on:click="Object.assign(nap_tien, v)" class="btn btn-warning btn-sm me-1"
                                            data-bs-toggle="modal" data-bs-target="#napTienModal">
                                            Nạp Tiền
                                        </button>
                                        <button v-on:click="Object.assign(edit, v)" class="btn btn-primary btn-sm me-1"
                                            data-bs-toggle="modal" data-bs-target="#capNhatModal">
                                            Cập Nhật
                                        </button>
                                        <button v-on:click="Object.assign(del, v)" class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#xoaModal">
                                            Xóa
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal lịch sử -->
    <div class="modal fade" id="lichsuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Lịch Sử Giao Dịch
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Họ Tên Khách Hàng</th>
                                            <th>Email Khách Hàng</th>
                                            <th>Số Tiền Nạp</th>
                                            <th>Lý Do Nạp</th>
                                            <th>Kiểu Nạp</th>
                                            <th>Nhân Viên Xử Lý</th>
                                            <th>Thời Gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-for="(value, index) in list_giao_dich" :key="index">
                                            <tr class="align-middle">
                                                <th class="text-center">{{ index + 1 }}</th>
                                                <td>{{ value.hoten_kh }}</td>
                                                <td>{{ value.email }}</td>
                                                <td>
                                                    <button class="btn btn-warning w-100 text-end">
                                                        {{ formatVND(value.so_tien_nap) }}
                                                    </button>
                                                </td>
                                                <td>{{ value.noi_dung_nap }}</td>
                                                <td class="text-center">
                                                    <button v-if="value.kieu_nap == 1" class="btn btn-primary w-100">
                                                        Nạp Bằng Tay
                                                    </button>
                                                    <button v-else class="btn btn-danger w-100">
                                                        Nạp Tự Động
                                                    </button>
                                                </td>
                                                <td>{{ value.hoten_nv }}</td>
                                                <td class="text-center">
                                                    {{ formatdate(value.created_at) }}
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="capNhatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Cập Nhật Khách Hàng
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Họ và Tên</label>
                        <input v-model="edit.ho_va_ten" type="text" class="form-control" />
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Email</label>
                        <input v-model="edit.email" type="email" class="form-control" />
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Số Điện Thoại</label>
                        <input v-model="edit.so_dien_thoai" type="text" class="form-control" />
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Ngày Sinh</label>
                        <input v-model="edit.ngay_sinh" type="date" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button v-on:click="capNhat()" type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        Xác Nhận
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa Khách Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-white">
                                <i class="bx bxs-message-square-x"></i>
                            </div>
                            <div class="ms-1">
                                <h6 class="mb-1 text-white">
                                    Bạn chắc chắc xóa tài khoản khách hàng
                                    <b>{{ del.ho_va_ten }}</b> này chứ !!!
                                </h6>
                                <div class="text-white text-nowrap">
                                    <b>LƯU Ý !!!</b> Điều này không thể khôi phục khi ấn xác nhận
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button v-on:click="xoa()" type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        Xóa
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="napTienModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Chức Năng Nạp Tiền
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="mt-2"><b>Số Tiền Cần Nạp</b></label>
                    <input v-model="nap_tien.so_tien_can_nap" type="text" class="form-control mt-2"
                        placeholder="Nhập vào số tiền cần nạp" />
                    <label class="mt-2"><b>Lý Do Nạp Tiền</b></label>
                    <input v-model="nap_tien.ly_do_nap_tien" type="text" class="form-control mt-2"
                        placeholder="Nhập vào lý do nạp tiền" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button v-on:click="napTienKhachHang()" type="button" class="btn btn-primary"
                        data-bs-dismiss="modal">
                        Xác Nhận
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            del: {
                ho_va_ten: "",
            },
            edit: {
                ho_va_ten: "",
                email: "",
                so_dien_thoai: "",
                ngay_sinh: "",
                password: "",
            },
            list: [],
            search: {},
            nap_tien: {},
            list_giao_dich: [],
        };
    },

    mounted() {
        this.loadData();
    },
    methods: {
        loadLichSu(value) {
            axios
                .post("http://127.0.0.1:8000/api/admin/nap-tien/data-one", value, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("key_admin"),
                    },
                })
                .then((res) => {
                    this.list_giao_dich = res.data.data;
                });
        },
        formatdate(thoi_gian) {
            const date = new Date(thoi_gian);
            return date.toLocaleString();
        },
        formatVND(number) {
            return new Intl.NumberFormat("vi-VI", {
                style: "currency",
                currency: "VND",
            }).format(number);
        },
        napTienKhachHang() {
            axios
                .post(
                    "http://127.0.0.1:8000/api/admin/nap-tien/create",
                    this.nap_tien,
                    {
                        headers: {
                            Authorization: "Bearer " + localStorage.getItem("key_admin"),
                        },
                    }
                )
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.nap_tien = {};
                        this.loadData();
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        timKiem() {
            axios
                .post(
                    "http://127.0.0.1:8000/api/admin/khach-hang/tim-kiem",
                    this.search,
                    {
                        headers: {
                            Authorization: "Bearer " + localStorage.getItem("key_admin"),
                        },
                    }
                )
                .then((res) => {
                    this.list = res.data.data;
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        doiTrangThai(value) {
            axios
                .post(
                    "http://127.0.0.1:8000/api/admin/khach-hang/change-status",
                    value,
                    {
                        headers: {
                            Authorization: "Bearer " + localStorage.getItem("key_admin"),
                        },
                    }
                )
                .then((res) => {
                    if (res.data.status) {
                        this.loadData();
                        this.$toast.success(res.data.message);
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        loadData() {
            axios
                .get("http://127.0.0.1:8000/api/admin/khach-hang/data", {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("key_admin"),
                    },
                })
                .then((res) => {
                    this.list = res.data.data;
                });
        },
        xoa() {
            axios
                .post("http://127.0.0.1:8000/api/admin/khach-hang/delete", this.del, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("key_admin"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.loadData();
                        this.$toast.success(res.data.message);
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        capNhat() {
            axios
                .post("http://127.0.0.1:8000/api/admin/khach-hang/update", this.edit, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("key_admin"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.loadData();
                        this.$toast.success(res.data.message);
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
    },
};
</script>
<style></style>
