<template>
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h5>Thêm Mới Trắc Nghiệm</h5>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="mb-2">Tên Câu Hỏi</label>
                        <input v-model="create.cau_hoi" type="text" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="mb-2">Đáp Án 1</label>
                        <input v-model="create.dap_an_1" type="text" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="mb-2">Đáp Án 2</label>
                        <input v-model="create.dap_an_2" type="text" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="mb-2">Đáp Án 3</label>
                        <input v-model="create.dap_an_3" type="text" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="mb-2">Đáp Án 4</label>
                        <input v-model="create.dap_an_4" type="text" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="mb-2">Chọn Đáp Án Đúng</label>
                        <select v-model="create.dap_an_dung" class="form-select">
                            <option value="1">Đáp Án 1</option>
                            <option value="2">Đáp Án 2</option>
                            <option value="3">Đáp Án 3</option>
                            <option value="4">Đáp Án 4</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="mb-2">Tình Trạng</label>
                        <select v-model="create.tinh_trang" class="form-select">
                            <option value="0">Tạm Tắt</option>
                            <option value="1">Hiển Thị</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button v-on:click="themMoi()" class="btn btn-primary">Thêm Mới</button>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h5>Danh Sách Trắc Nghiệm</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="100%">
                                        <div class="input-group w-100">
                                            <input v-on:keyup.enter="timKiem()" v-model="search.noi_dung" type="text"
                                                class="form-control search-control border border-1 border-secondary"
                                                placeholder="Search...">
                                            <span class="position-absolute top-50 search-show translate-middle-y"
                                                style="left: 15px;"><i class="bx bx-search"></i></span>
                                            <button v-on:click="timKiem()" class="btn btn-outline-secondary"
                                                type="button">Tìm
                                                Kiếm</button>
                                        </div>
                                    </th>
                                </tr>
                                <tr class="align-middle text-center">
                                    <th>#</th>
                                    <th>Tên Câu Hỏi</th>
                                    <th>Đáp Án</th>
                                    <th>Tình Trạng</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(v, k) in list" :key="k">
                                    <tr class="align-middle">
                                        <th class="text-center">{{ k + 1 }}</th>
                                        <td class="text-wrap">{{ v.cau_hoi }}</td>
                                        <td>
                                            <table class="table table-bordered">
                                                <tbody class="align-middle">
                                                    <tr :class="{'text-danger' : v.dap_an_dung == 1}">
                                                        <th class="">Đáp Án 1: </th>
                                                        <td class="text-wrap">{{ v.dap_an_1 }}</td>
                                                    </tr>
                                                    <tr :class="{'text-danger' : v.dap_an_dung == 2}">
                                                        <th class="">Đáp Án 2: </th>
                                                        <td class="text-wrap">{{ v.dap_an_2 }}</td>
                                                    </tr>
                                                    <tr :class="{'text-danger' : v.dap_an_dung == 3}">
                                                        <th class="">Đáp Án 3: </th>
                                                        <td class="text-wrap">{{ v.dap_an_3 }}</td>
                                                    </tr>
                                                    <tr :class="{'text-danger' : v.dap_an_dung == 4}">
                                                        <th class="">Đáp Án 4: </th>
                                                        <td class="text-wrap">{{ v.dap_an_4 }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="text-center">
                                            <button v-on:click="doiTrangThai(v)" v-if="v.tinh_trang == 1" class="btn btn-success">Hiển Thị</button>
                                            <button v-on:click="doiTrangThai(v)" v-else class="btn btn-warning">Tạm Tắt</button>
                                        </td>
                                        <td class="align-middle text-nowrap text-center">
                                            <button v-on:click="Object.assign(edit, v)" style="width: 100px;"
                                                class="btn btn-primary me-2" data-bs-toggle="modal"
                                                data-bs-target="#capNhatModal">
                                                Cập Nhật
                                            </button>
                                            <button v-on:click="Object.assign(del, v)" style="width: 100px;"
                                                class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#xoaModal">
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
    </div>
    <!-- model Xóa -->
    <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Xóa Trắc Nghiệm
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
                            </div>
                            <div class="ms-1">
                                <h6 class="mb-1 text-white">Bạn chắc chắc xóa câu hỏi
                                    <b>{{ del.cau_hoi }}</b> này chứ
                                    !!!
                                </h6>
                                <div class="text-white text-nowrap"><b>LƯU Ý !!!</b> Điều
                                    này không thể khôi
                                    phục
                                    khi ấn xác nhận
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button v-on:click="xoa()" type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="capNhatModal" tabindex="-1" aria-labelledby="capNhatModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content shadow-lg">
                <div class="modal-header  text-white">
                    <h5 class="modal-title fw-bold" id="capNhatModalLabel">Cập Nhật Trắc Nghiệm</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="updateFormIphone">
                        <div class="row">
                            <div class="mb-2">
                                <label class="mb-2">Tên Câu Hỏi</label>
                                <input v-model="edit.cau_hoi" type="text" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label class="mb-2">Đáp Án 1</label>
                                <input v-model="edit.dap_an_1" type="text" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label class="mb-2">Đáp Án 2</label>
                                <input v-model="edit.dap_an_2" type="text" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label class="mb-2">Đáp Án 3</label>
                                <input v-model="edit.dap_an_3" type="text" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label class="mb-2">Đáp Án 4</label>
                                <input v-model="edit.dap_an_4" type="text" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label class="mb-2">Chọn Đáp Án Đúng</label>
                                <select v-model="edit.dap_an_dung" class="form-select">
                                    <option value="1">Đáp Án 1</option>
                                    <option value="2">Đáp Án 2</option>
                                    <option value="3">Đáp Án 3</option>
                                    <option value="4">Đáp Án 4</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="mb-2">Tình Trạng</label>
                                <select v-model="edit.tinh_trang" class="form-select">
                                    <option value="0">Tạm Tắt</option>
                                    <option value="1">Hiển Thị</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button v-on:click="capNhat()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Lưu Thay Đổi</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'


export default {
    data() {
        return {
            create: {},
            del: {},
            edit: {},
            list: [],
            search: {}
        }
    },
    mounted() {
        this.loadData();
    },
    methods: {
        timKiem() {
            axios
                .post("http://127.0.0.1:8000/api/admin/trac-nghiem/tim-kiem", this.search, {
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
        doiTrangThai(value) {
            axios
                .post("http://127.0.0.1:8000/api/admin/trac-nghiem/change-status", value, {
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
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
                })
        },
        capNhat() {
            axios
                .post("http://127.0.0.1:8000/api/admin/trac-nghiem/update", this.edit, {
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
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
                })
        },
        xoa() {
            axios
                .post("http://127.0.0.1:8000/api/admin/trac-nghiem/delete", this.del, {
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
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
                })
        },
        themMoi() {
            axios
                .post("http://127.0.0.1:8000/api/admin/trac-nghiem/create", this.create, {
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.loadData();
                        this.create = {}
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
        loadData() {
            axios
                .get("http://127.0.0.1:8000/api/admin/trac-nghiem/data", {
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    this.list = res.data.data;
                })
        },
    }
}
</script>
<style></style>