<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mt-2"><b>DANH SÁCH NHÂN VIÊN</b></h6>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Thêm Mới
                    </button>
                </div>
                <div class="card-body table-responsive">
                    <div class="input-group mt-3 w-100">
                        <input v-on:keyup.enter="timKiem()" v-model="search.noi_dung" type="text" class="form-control search-control border border-1 border-secondary"
                                placeholder="Search...">
                        <span class="position-absolute top-50 search-show translate-middle-y" style="left: 15px;"><i
                                class="bx bx-search"></i></span>
                        <button v-on:click="timKiem()" class="btn btn-outline-secondary" type="button" id="button-addon2">Tìm
                                Kiếm</button>
                    </div>
                    <table class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Họ Và Tên</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Số Điện Thoại</th>
                                <th class="text-center">Địa Chỉ</th>
                                <th class="text-center">Quyền</th>
                                <th class="text-center">Tình Trạng</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(v, k) in list" :key="k">
                                <tr>
                                    <th class="align-middle text-center">{{ k + 1 }}</th>
                                    <td class="align-middle">{{ v.ho_va_ten }}</td>
                                    <td class="align-middle">{{ v.email }}</td>
                                    <td class="align-middle">{{ v.so_dien_thoai }}</td>
                                    <td class="align-middle text-center">{{ v.dia_chi }}</td>
                                    <td class="align-middle text-center">{{ v.ten_quyen }}</td>
                                    <td class="align-middle text-center">
                                        <template v-if="v.tinh_trang == 1">
                                            <button v-on:click="doiTrangThai(v)" class="btn btn-success w-100">Hoạt
                                                Động</button>
                                        </template>
                                        <template v-else>
                                            <button v-on:click="doiTrangThai(v)"
                                                class="btn btn-warning w-100">Tắt</button>
                                        </template>
                                    </td>
                                    <td class="align-middle text-center">
                                        <button class="btn btn-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#capnhatDM"
                                            v-on:click="Object.assign(edit, v)">Cập nhật</button>
                                        <button class="btn btn-danger" data-bs-toggle="modal"
                                            v-on:click="Object.assign(del, v)"
                                            data-bs-target="#delModal">Xóa</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Mới Nhân Viên</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-lable">Họ Và Tên</label>
                            <input v-model="create.ho_va_ten" type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-lable">Email</label>
                            <input v-model="create.email" type="email" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-lable">Số Điện Thoại</label>
                            <input v-model="create.so_dien_thoai" type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-lable">Password</label>
                            <input v-model="create.password" type="password" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-lable">Địa Chỉ</label>
                            <input v-model="create.dia_chi" type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label>Quyền</label>
                            <select v-model="create.id_quyen" class="form-select mt-2">
                               <template v-for="(v, k) in list_quyen" :key="k">
                                    <option :value="v.id">
                                        {{ v.ten_quyen }}
                                    </option>
                                </template>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-lable">Tình Trạng</label>
                            <select v-model="create.tinh_trang" class="form-control">
                                <option value="0">Tạm Dừng</option>
                                <option value="1">Hoạt Động</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button v-on:click="themMoi()" class="btn btn-primary" data-bs-dismiss="modal">Thêm Mới</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Nhân Viên</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert">
                            Bạn có chắc muốn xóa Nhân Viên <b class="text-danger">{{ del.ho_va_ten
                                }}</b>
                            này
                            không?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                            v-on:click="xoa()">Xác
                            nhận</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="capnhatDM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật Nhân Viên</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-lable">Họ Và Tên</label>
                            <input v-model="edit.ho_va_ten" type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-lable">Email</label>
                            <input v-model="edit.email" type="email" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-lable">Số Điện Thoại</label>
                            <input v-model="edit.so_dien_thoai" type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-lable">Địa Chỉ</label>
                            <input v-model="edit.dia_chi" type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label>Quyền</label>
                            <select v-model="edit.id_quyen" class="form-control mt-2">
                                <template v-for="(v, k) in list_quyen" :key="k">
                                    <option :value="v.id">
                                        {{ v.ten_quyen }}
                                    </option>
                                </template>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-lable">Tình Trạng</label>
                            <select v-model="edit.tinh_trang" class="form-control">
                                <option value="0">Tạm Dừng</option>
                                <option value="1">Hoạt Động</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                            v-on:click="capNhat()">Cập
                            nhật</button>
                    </div>
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
            create: { 'ho_va_ten': '', 'email': '', 'so_dien_thoai': '', 'password': '', 'dia_chi': '', 'tinh_trang': '', 'id_quyen': 0 },
            edit: {},
            del: {},
            list: [],
            search: {},
            list_quyen: []
        }

    },
    mounted() {
        this.loadData();
        this.layDuLieuQuyen();
    },
    methods: {
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
        timKiem() {
            axios
                .post('http://127.0.0.1:8000/api/admin/nhan-vien/tim-kiem', this.search, {
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    this.list = res.data.data
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                })
        },
        loadData() {
            axios
                .get('http://127.0.0.1:8000/api/admin/nhan-vien/data' , {
                    headers: {
                         Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                }
                }) 
                .then((res) => {
                    this.list = res.data.data;
                })
        },
        themMoi() {
            axios
                .post('http://127.0.0.1:8000/api/admin/nhan-vien/create', this.create, {
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
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
                })
        },
        capNhat() {
            axios
                .post('http://127.0.0.1:8000/api/admin/nhan-vien/update', this.edit, {
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
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
                })

        },
        xoa() {
            axios
                .post('http://127.0.0.1:8000/api/admin/nhan-vien/delete', this.del, {
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
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
                })

        },
        doiTrangThai(value) {
            axios
                .post('http://127.0.0.1:8000/api/admin/nhan-vien/change-status', value, {
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
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
                })
        }
    }
}
</script>
<style></style>
