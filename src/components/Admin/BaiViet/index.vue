<template>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header mt-2">
                    <h5>Thêm Mới Bài Viết</h5>
                </div>
                <div class="card-body">
                    <label class="mt-2">Tiêu Đề</label>
                    <input v-model="create.tieu_de" class="form-control mt-2" type="text">
                    <label class="mt-2">Slug Tiêu Đề</label>
                    <input v-model="create.slug_tieu_de" class="form-control mt-2" type="text">
                    <label class="mt-2">Hình Ảnh</label>
                    <input v-model="create.hinh_anh" class="form-control mt-2" type="text">
                    <label class="mt-2">Mô Tả Ngắn</label>
                    <input v-model="create.mo_ta_ngan" class="form-control mt-2" type="text">
                    <label class="mt-2">Nội Dung</label>
                    <ckeditor
                        v-model="create.noi_dung"
                        :editor="editor"
                        :config="editorConfig"
                    />
                    <label class="mt-2">Tình Trạng</label>
                    <select v-model="create.tinh_trang" class="form-control mt-2">
                        <option value="1">Hoạt Động</option>
                        <option value="0">Tạm Dừng</option>
                    </select>
                </div>
                <div class="card-footer text-end mt-3">
                    <button v-on:click="themMoi()" class="btn btn-primary">Thêm Mới</button>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header mt-2">
                    <h5>Danh Sách Bài Viết</h5>
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
                                <tr class=" text-center">
                                    <th>#</th>
                                    <th>Tiêu Đề</th>
                                    <th>Slung Tiêu Đề</th>
                                    <th>Hình Ảnh</th>
                                    <th>Mô Tả Ngắn</th>
                                    <th>Nội Dung</th>
                                    <th>Tình Trạng</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, index) in list " :key="index">
                                    <tr class="">
                                        <th class="align-middle">{{ index + 1 }}</th>
                                        <td class="align-middle">{{ value.tieu_de }}</td>
                                        <td class="align-middle">{{ value.slug_tieu_de }}</td>
                                        <td class="align-middle">
                                            <img :src="value.hinh_anh" class="img-fluid" alt="...">
                                        </td>
                                        <td class="align-middle">{{ value.mo_ta_ngan }}</td>
                                        <td class="align-middle text-center">
                                            <i v-on:click="Object.assign(edit, value)" data-bs-toggle="modal"
                                                data-bs-target="#icon" class="fa-solid fa-circle-info fa-2x"></i>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button v-on:click="doiTrangThai(value)" v-if="value.tinh_trang == 1"
                                                class="btn btn-success me-2">Hoạt
                                                Động</button>
                                            <button v-on:click="doiTrangThai(value)" v-else class="btn btn-warning">Tạm
                                                Dừng</button>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button v-on:click="Object.assign(edit, value)"
                                                class="btn btn-primary me-2" data-bs-toggle="modal"
                                                data-bs-target="#updateModal">Cập Nhật</button>
                                            <button v-on:click="Object.assign(del, value)"
                                                class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal">Xóa</button>
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
    <!-- Modal xoá-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa Bài Viết</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
                            </div>
                            <div class="ms-1">
                                <h6 class="mb-1 text-white">Bạn chắc chắc xóa bài viết <b>{{ del.tieu_de
                                        }}</b>
                                    này chứ
                                    !!!</h6>
                                <div class="text-white text-nowrap"><b>LƯU Ý !!!</b> Điều này không thể khôi
                                    phục
                                    khi ấn xác nhận
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button v-on:click="xoa()" type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal cập nhật-->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Bài Viết</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <label class="mt-2">Tiêu Đề</label>
                        <input v-model="edit.tieu_de" class="form-control mt-2" type="text">
                        <label class="mt-2">Slug Tiêu Đề</label>
                        <input v-model="edit.slug_tieu_de" class="form-control mt-2" type="text">
                        <label class="mt-2">Hình Ảnh</label>
                        <input v-model="edit.hinh_anh" class="form-control mt-2" type="text">
                        <label class="mt-2">Mô Tả Ngắn</label>
                        <input v-model="edit.mo_ta_ngan" class="form-control mt-2" type="text">
                        <label class="mt-2">Nội Dung</label>
                        <ckeditor
                            v-model="edit.noi_dung"
                            :editor="editor"
                            :config="editorConfig"
                        />
                        <label class="mt-2">Tình Trạng</label>
                        <select v-model="edit.tinh_trang" class="form-control mt-2">
                            <option value="1">Hoạt Động</option>
                            <option value="0">Tạm Dừng</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button v-on:click="capNhat()" type="button" class="btn btn-primary"
                        data-bs-dismiss="modal">Cập
                        Nhật</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal-icon -->
    <div class="modal fade" id="icon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nội Dung Bài Viết</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span v-html="edit.noi_dung"></span>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import { ClassicEditor, Bold, Essentials, Italic, Mention, Paragraph, Undo, Heading, BlockQuote, Font, Link, List, Alignment, Highlight, Image, FileRepository } from 'ckeditor5';
import { Ckeditor } from '@ckeditor/ckeditor5-vue';
import 'ckeditor5/ckeditor5.css';
export default {
    components: {
        Ckeditor
    },
    data() {
        return {
            create: {
                'tieu_de': "",
                'slug_tieu_de': "",
                'hinh_anh': "",
                'mo_ta_ngan': "",
                'noi_dung': "",
                'tinh_trang': "",
            },
            del: {
                'id': "",
                'tieu_de': "",
            },
            edit: {
                'tieu_de': "",
                'slug_tieu_de': "",
                'hinh_anh': "",
                'mo_ta_ngan': "",
                'noi_dung': "",
                'tinh_trang': "",
            },
            list: [],
            search : {},
            editor: ClassicEditor,
            editorConfig: {
                plugins: [Bold, Essentials, Italic, Mention, Paragraph, Undo, Heading, BlockQuote, Font, Link, List, Alignment, Highlight, Image, FileRepository],
                toolbar: ['heading',
                    '|', 'undo', 'redo', '|', 'bold', 'italic',
                    'fontSize',
                    'fontFamily',
                    'fontColor',
                    'highlight',
                    '|',
                    'link',
                    'bulletedList',
                    'numberedList',
                    'blockQuote',
                    '|',
                    'Alignment',
                ],

            }

        }
    },
    mounted() {
        this.loadData();
    },
    methods: {
        timKiem() {
            axios
                .post("http://127.0.0.1:8000/api/admin/bai-viet/tim-kiem", this.search, {
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
                .post("http://127.0.0.1:8000/api/admin/bai-viet/change-status", value, {
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
                .post("http://127.0.0.1:8000/api/admin/bai-viet/update", this.edit, {
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
                .post("http://127.0.0.1:8000/api/admin/bai-viet/delete", this.del, {
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
                .post("http://127.0.0.1:8000/api/admin/bai-viet/create", this.create, {
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_admin")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.loadData();
                        this.create = {
                            'tieu_de': "",
                            'slug_tieu_de': "",
                            'hinh_anh': "",
                            'mo_ta_ngan': "",
                            'noi_dung': "",
                            'tinh_trang': "",
                        }
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
                .get("http://127.0.0.1:8000/api/admin/bai-viet/data", {
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
<style>
.ck-editor__editable {
    min-height: 300px;
}
</style>