<template>
    <div class="container-fluid">
        <div class="row row-cols-lg-2">
            <div class="col mx-auto">
                <div class="mb-4 text-center">
                    <img src="https://dzfullstack.com/assets/images/logo-1.png" width="180" alt="">
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="text-center">
                                <h3 class="">ĐỔI MẬT KHẨU</h3>
                            </div>
                            <hr>
                            <div class="form-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="mb-2">Mật Khẩu Mới</label>
                                        <div class="input-group"> <span class="input-group-text"><i
                                                    class="fa-solid fa-envelope"></i></span>
                                            <input v-model="tai_Khoan.password" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="mb-2">Xác Nhận Mật Khẩu</label>
                                        <div class="input-group"> <span class="input-group-text"><i
                                                    class="fa-solid fa-envelope"></i></span>
                                            <input v-model="tai_Khoan.re_password" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button v-on:click="changePassword()" type="submit"
                                                class="btn btn-primary"><i class="fa-solid fa-lock-open"></i>Thay Đổi Mật Khẩu</button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <router-link to="/khach-hang/dang-nhap">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-secondary">Đăng Nhập<i
                                                        class="ms-2 fa-solid fa-arrow-right"></i></button>
                                            </div>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    props: ['hash_reset'],
    data() {
        return {
            tai_Khoan:{
                hash_reset : this.$route.params.hash_reset
            }
        }
    },
    methods: {
        changePassword(){
            axios
                .post('http://127.0.0.1:8000/api/khach-hang/doi-mat-khau',this.tai_Khoan)
                    .then((res)=>{
                        if(res.data.status){
                            this.$toast.success(res.data.message);
                            this.$router.push('/khach-hang/dang-nhap')
                        }else{
                            this.$toast.error(res.data.message)
                        }
                })
        }
    },
}
</script>
<style></style>