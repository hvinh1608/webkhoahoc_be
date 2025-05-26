<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-primary" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="fa-solid fa-user font-18 me-1"></i>
                                    </div>
                                    <div class="tab-title">Profile</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab"
                                aria-selected="false" tabindex="-1">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="fa-solid fa-lock font-18 me-1"></i>
                                    </div>
                                    <div class="tab-title">Đổi mật khẩu</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#naptienTK" role="tab" aria-selected="false"
                                tabindex="-1">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon me-1"><i class="fa-solid fa-money-check-dollar"></i>
                                    </div>
                                    <div class="tab-title">Nạp Tiền</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content py-3">
                        <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-4 d-flex">
                                    <div class="card flex-fill">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img src="https://rypuop.stripocdn.email/content/guids/CABINET_cffa413c5ccab048888fec6cc485b815f8f80028a73882101227ae6949ec8f11/images/387321979_687594463281792_7574468668499025541_n.jpg"
                                                    style="width: 140px; height: 140px;" alt="Admin"
                                                    class="rounded-circle p-1 bg-primary">
                                                <div class="mt-3">
                                                    <h4>{{ thong_tin.ho_va_ten }}</h4>
                                                    <p class="text-secondary mb-1">{{ thong_tin.email }}</p>
                                                    <p class="text-muted font-size-sm">32 Xuân Diệu</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 d-flex">
                                    <div class="card flex-fill">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <h6 class="mb-0">Họ và Tên</h6>
                                                </div>
                                                <div class="col-lg-9 text-secondary">
                                                    <input type="text" v-model="thong_tin.ho_va_ten"
                                                        class="form-control" placeholder="Nhập họ và tên">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <h6 class="mb-0">Email</h6>
                                                </div>
                                                <div class="col-lg-9 text-secondary">
                                                    <input disabled v-model="thong_tin.email" type="text"
                                                        class="form-control" placeholder="Nhập email">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <h6 class="mb-0">Số Điện Thoại</h6>
                                                </div>
                                                <div class="col-lg-9 text-secondary">
                                                    <input v-model="thong_tin.so_dien_thoai" type="text"
                                                        class="form-control" placeholder="Nhập số điện thoại">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <h6 class="mb-0">Địa Chỉ</h6>
                                                </div>
                                                <div class="col-lg-9 text-secondary">
                                                    <input v-model="thong_tin.ngay_sinh" type="date"
                                                        class="form-control" placeholder="Nhập số điện thoại">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3"></div>
                                                <div class="col-lg-9 text-secondary">
                                                    <button type="button" class="btn btn-primary px-4"
                                                        @click="thayDoiThongTin()">Lưu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                            <div class="col">
                                <h4>Thay đổi mật khẩu</h4>
                            </div>
                            <div class="col">Quản lý mật khẩu để bảo mật tài khoản</div>
                            <hr>
                            <div class="row mb-2">
                                <div class="col-lg-2">
                                    <label for="">Mật khẩu cũ</label>
                                </div>
                                <div class="col-lg-3">
                                    <input v-model="doi_mat_khau.old_password" type="password" placeholder="Nhập mật khẩu cũ" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-2">
                                    <label  for="">Mật khẩu mới</label>
                                </div>
                                <div class="col-lg-3">
                                    <input v-model="doi_mat_khau.new_password" type="password" placeholder="Nhập mật khẩu mới" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-2">
                                    <label for="">Nhập lại Mật khẩu mới </label>
                                </div>
                                <div class="col-lg-3">
                                    <input v-model="doi_mat_khau.re_password" type="password" placeholder="Nhập lại mật khẩu mới" class="form-control">
                                </div>
                            </div>
                            <button class="btn btn-primary" @click="doiMatKhau()">Lưu</button>
                        </div>
                        <div class="tab-pane fade" id="naptienTK" role="tabpanel">
                            <div class="col">
                                <h4>Nạp Tiền Tài Khoản</h4>
                            </div>
                            <div class="col">Nạp Tiền Và Lịch Sử Nạp Tiền</div>
                            <hr>
                            <hr>
                            <div class="row">
                                <div class="col-lg-5 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <label class="mb-2">Nhập Số Tiền Nạp</label>
                                            <input v-model="so_tien_nap" type="text" class="form-control">
                                            <hr>
                                            <div class="row">
                                                <div class="col-lg-12 text-end">
                                                    <button v-on:click="xacNhanNapTien()" class="btn btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#xacNhanNapTienModal">Nạp
                                                        Tiền</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6">
                                    Đây là label
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal nạp tiền -->
    <div class="modal fade" id="xacNhanNapTienModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xác Nhận Nạp Tiền</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="alert alert-success" role="alert">
                                        Bạn phải quét mã QR để thanh toán nạp tiền vào tài khoản
                                    </div>
                                    <img :src="link_qr" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            so_tien_nap: 0,
            link_qr: '',
            thong_tin: {},
            doi_mat_khau: {}
        }
    },
    mounted() {
        this.layThongTinKhachHang();
    },
    methods: {
        doiMatKhau() {
            axios
                .post("http://127.0.0.1:8000/api/khach-hang/doi-mat-khau-profile", this.doi_mat_khau, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("key_khach_hang")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.layThongTinKhachHang();

                    } else {
                        this.$toast.error(res.data.message);
                        // this.$router.push('/');
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                })
        },
        layThongTinKhachHang() {
            axios
                .get("http://127.0.0.1:8000/api/khach-hang/lay-thong-tin-profile", {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("key_khach_hang")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        this.thong_tin = res.data.thong_tin;
                    } else {
                        this.$toast.error(res.data.message);
                        this.$router.push('/');
                    }
                })
        },
        thayDoiThongTin() {
            axios
                .post("http://127.0.0.1:8000/api/khach-hang/thay-doi-thong-tin-profile", this.thong_tin, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("key_khach_hang")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.layThongTinKhachHang();

                    } else {
                        this.$toast.error(res.data.message);
                        this.$router.push('/');
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                })
        },
        xacNhanNapTien() {
            var payload = {
                'so_tien_nap': this.so_tien_nap
            }
            axios
                .post("http://127.0.0.1:8000/api/khach-hang/xac-nhan-nap-tien", payload, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("key_khach_hang")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message)
                        var noi_dung_chuyen_tien = res.data.noi_dung_chuyen_tien;
                        this.link_qr = "https://img.vietqr.io/image/970422-1910061030119-compact2.png?amount=" + this.so_tien_nap + "&addInfo=" + noi_dung_chuyen_tien + "&accountName=DZFULLSTACK"
                    }
                })
        }
    },
}
</script>
<style></style>