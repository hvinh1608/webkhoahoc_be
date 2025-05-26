<template>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6 mt-2">
                            Danh Sách Quyền
                        </div>
                        <div class="col-lg-6 text-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themMoiModal">Thêm
                                Quyền</button>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-group mt-3 w-100">
                                <input v-on:keyup.enter="timKiem()" v-model="tim_kiem.noi_dung" type="text" class="form-control search-control border border-2 border-secondary"
                                    placeholder="Search...">
                                <span class="position-absolute top-50 search-show translate-middle-y"
                                    style="left: 15px;"><i class="bx bx-search"></i></span>
                                <button v-on:click="timKiem()" class="btn btn-outline-secondary" type="button" id="button-addon2">Tìm
                                    Kiếm</button>
                            </div>
                        </div>
                        <div class="modal fade" id="themMoiModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Mới Quyền</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-12 mb-2">
                                            <label class="form-label">Tên Quyền</label>
                                            <input v-model="create_quyen.ten_quyen" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="themMoiQuyen()" type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Tạo
                                            Mới</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="text-center align-middle">
                                <tr class="bg-primary text-light">
                                    <th>#</th>
                                    <th>Tên Quyền</th>
                                    <th>Cấp Quyền</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, index) in list_quyen " :key="index">
                                    <tr class="align-middle">
                                        <th class="text-center">1</th>
                                        <td>{{ value.ten_quyen }}</td>
                                        <td class="text-center">
                                            <button v-on:click="phanQuyen(value);" class="btn btn-info text-white">Phân
                                                Quyền</button>
                                        </td>
                                        <td class="text-center">
                                            <i v-on:click="Object.assign(update_quyen, value)"
                                                class="fa-solid fa-square-pen fa-3x text-primary me-2"
                                                data-bs-toggle="modal" data-bs-target="#updateModal"></i>
                                            <i v-on:click="Object.assign(delete_quyen, value)"
                                                class="fa-solid fa-trash fa-3x text-danger" data-bs-toggle="modal"
                                                data-bs-target="#xoaQuyenModal"></i>
                                        </td>
                                    </tr>
                                </template>

                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Quyền</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-12 mb-2">
                                        <label class="form-label">Tên Quyền</label>
                                        <input v-model="update_quyen.ten_quyen" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button v-on:click="capNhatPhanQuyen()" type="button" class="btn btn-primary"
                                        data-bs-dismiss="modal">Xác
                                        Nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="xoaQuyenModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Quyền</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div
                                        class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-dark">Warning</h6>
                                                <div class="text-dark">
                                                    <p>Bạn có muốn xóa quyền <b class="text-danger">{{
                                                        delete_quyen.ten_quyen }}</b> này
                                                        không?
                                                    </p>
                                                    <p>
                                                        <b>Lưu ý:</b> Điều này không thể hoàn tác!
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button v-on:click="xoaQuyen()" type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header mt-1">
                    Danh Sách Chức Năng
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center text-nowrap align-middle bg-primary text-light">
                                        <th>#</th>
                                        <th>Tên chức năng</th>
                                        <th>Action</th>
                                    </tr>


                                </thead>
                                <tbody>
                                    <template v-for="(value, index) in list_chuc_nang" :key="index">
                                        <tr class="align-middle">
                                            <th class="text-center">{{ index + 1 }}</th>
                                            <td class="text-wrap">{{ value.ten_chuc_nang }}</td>
                                            <td class="text-center">
                                                <button v-on:click="capQuyen(value.id)" class="btn btn-success">Cấp Quyền</button>
                                            </td>
                                        </tr>
                                    </template>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header mt-1">
                    Đang Phân Quyền Cho <b class="text-danger">{{ chon_quyen.ten_quyen }}</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center text-nowrap align-middle bg-primary text-light">
                                        <th>Tên Chức Năng</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="(value, index) in list_chi_tiet_quyen" :key="index">
                                        <tr class="align-middle">
                                            <td class="text-wrap">{{ value.ten_chuc_nang }}</td>
                                            <td class="text-center">
                                                <i v-on:click="xoaChiTiet(value)" class="fa-solid fa-trash fa-3x text-danger"></i>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delChucNangModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa quyền</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        Bạn có chắc muốn xóa quyền <b class="text-danger">{{ delete_quyen.ten_chuc_nang }}</b> này
                        không?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác
                        nhận</button>
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
            list_chuc_nang: [

            ],
            list_quyen: [

            ],
            update_quyen: {},
            delete_quyen: {},
            create_quyen: {},
            chon_quyen: {},
            list_chi_tiet_quyen : [],
            tim_kiem : {}
        }
    },
    mounted() {
        this.layDuLieuQuyen();
        this.layDuLieuChucNang();
    },
    methods: {
        timKiem() {
             axios
                .post('http://127.0.0.1:8000/api/admin/phan-quyen/tim-kiem', this.tim_kiem, {
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    this.list_quyen = res.data.data
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                })
        },
        capQuyen(id_chuc_nang) {
            if(!this.chon_quyen.id) {
                this.$toast.error('Vui lòng chọn quyền trước khi cấp quyền!');
                return;
            }
            var payload = {
                id_quyen: this.chon_quyen.id,
                id_chuc_nang: id_chuc_nang
            }
            axios
                .post('http://127.0.0.1:8000/api/admin/chi-tiet-phan-quyen/create', payload, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.phanQuyen(this.chon_quyen);
                    } else {
                        this.$toast.error(res.data.message)
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
          
        },
        phanQuyen(value) {
            this.chon_quyen = value;
            axios
                .post('http://127.0.0.1:8000/api/admin/chi-tiet-phan-quyen/data', this.chon_quyen, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    this.list_chi_tiet_quyen = res.data.data;
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
            
        },
        xoaChiTiet(value) {
            axios
                .post('http://127.0.0.1:8000/api/admin/chi-tiet-phan-quyen/delete', value, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    if(res.data.status) {
                        this.$toast.success(res.data.message);
                        this.phanQuyen(this.chon_quyen);
                    } else {
                        this.$toast.error(res.data.message);
                    }
                });
        },
        themMoiQuyen() {
            axios
                .post('http://127.0.0.1:8000/api/admin/phan-quyen/create', this.create_quyen, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.layDuLieuQuyen();
                        this.create_quyen = {};
                    } else {
                        this.$toast.error(res.data.message)
                    }
                });
        },
        xoaQuyen() {
            axios
                .post('http://127.0.0.1:8000/api/admin/phan-quyen/delete', this.delete_quyen, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.layDuLieuQuyen();
                    } else {
                        this.$toast.error(res.data.message)
                    }
                });
        },
        capNhatPhanQuyen() {
            axios
                .post('http://127.0.0.1:8000/api/admin/phan-quyen/update', this.update_quyen, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.layDuLieuQuyen();
                    } else {
                        this.$toast.error(res.data.message);

                    }
                });
        },
        layDuLieuQuyen() {
            axios
                .get('http://127.0.0.1:8000/api/admin/phan-quyen/data', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    if (res.data.status == false) {
                        this.$toast.error(res.data.message)
                    }
                    this.list_quyen = res.data.data;
                });
        },
        layDuLieuChucNang() {
            axios
                .get('http://127.0.0.1:8000/api/admin/phan-quyen/chi-tiet-chuc-nang/data', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    if (res.data.status == false) {
                        this.$toast.error(res.data.message)
                    }
                    this.list_chuc_nang = res.data.data;
                });
        },
    }
}
</script>
<style></style>