<template>
    <div class="card">
        <div class="card-header mt-2">
            <h4>Danh Sách Khóa Học Đã Mua</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center align-middle">
                        <tr>
                            <th>#</th>
                            <th>Tên Khóa Học</th>
                            <th>Ngày Mua</th>
                            <th>Gía Mua</th>
                            <th>Hình Ảnh</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <template v-for="(value, index) in list" :key="index">
                            <tr>
                                <th class="text-center">{{ index + 1 }}</th>
                                <td>{{ value.ten_khoa_hoc }}</td>
                                <td class="text-center">{{ formatdate(value.created_at) }}</td>
                                <td class="text-end">{{ formatVND(value.so_tien_mua) }}</td>
                                <td class="text-center">
                                    <img :src="value.hinh_anh" style="width: 200px;">
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            list:[]
        }
    },
    mounted() {
        this.loadDanhSachKhoaHoc()
    },
    methods: {
        formatdate(thoi_gian) {
            const date = new Date(thoi_gian);
            return date.toLocaleString();
        },
        formatVND(number){
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number);
        },
        loadDanhSachKhoaHoc(){
            axios
                .get("http://127.0.0.1:8000/api/home-page/loai-khoa-hoc/danh-sach-khoa-hoc",{
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_khach_hang")
                    }
                })
                .then((res) => {
                    this.list = res.data.data
                });
        }
    },
}
</script>
<style>
    
</style>