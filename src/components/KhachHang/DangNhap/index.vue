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
                                <h3 class="">ĐĂNG NHẬP TÀI KHOẢN</h3>
                            </div>
                            <hr>
                            <div class="form-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="mb-2">Email</label>
                                        <div class="input-group"> <span class="input-group-text"><i
                                                    class="fa-solid fa-envelope"></i></span>
                                            <input v-model="tai_Khoan.email" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="mb-2">Password</label>
                                        <div class="input-group"> <span class="input-group-text"><i
                                                    class="fa-solid fa-lock"></i></span>
                                            <input v-model="tai_Khoan.password" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="mb-2">Recaptcha</label>
                                        <div class="input-group">
                                            <div class="g-recaptcha"
                                                data-sitekey="6LcGsYwqAAAAAGbO3dMvso_ZzpESyqLJ3lOin-p0" ref="recaptcha">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button v-on:click="dangNhap()" type="submit" class="btn btn-primary"><i
                                                    class="fa-solid fa-lock-open"></i>Đăng
                                                Nhập</button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <router-link to="/khach-hang/dang-ky">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-secondary">Đăng Ký Tài
                                                    Khoản<i class="ms-2 fa-solid fa-arrow-right"></i></button>
                                            </div>
                                        </router-link>
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <GoogleLogin :callback="callback" style="width: 100%;" />
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
import { decodeCredential } from 'vue3-google-login'
export default {
    data() {
        return {
            tai_Khoan: {
                'email': "",
                'password': "",
            }
        }
    },
    mounted() {
        this.kiemTraDangNhap();
        const recaptchaScript = document.createElement('script')
        recaptchaScript.setAttribute('src', 'https://www.google.com/recaptcha/api.js')
        recaptchaScript.onerror = () => {
            this.$toast.error("Không thể tải Recaptcha. Vui lòng thử lại sau.")
        }
        document.head.appendChild(recaptchaScript)
    },
    methods: {
        dangNhap() {
            let code = grecaptcha.getResponse();
            if (!code) {
                this.$toast.error("Bạn chưa chọn recaptcha");
            }
            else {
                this.tai_Khoan.code = code;
                axios
                    .post("http://127.0.0.1:8000/api/khach-hang/dang-nhap", this.tai_Khoan)
                    .then((res) => {
                        if (res.data.status == 1) {
                            this.$toast.success(res.data.message);
                            this.create = {
                                'email': "",
                                'password': "",
                            };
                            localStorage.setItem("key_khach_hang", res.data.key);
                            this.$router.push('/trac-nghiem')
                        }
                        else {
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

        },
        kiemTraDangNhap() {
            axios
                .get("http://127.0.0.1:8000/api/khach-hang/check-login", {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("key_khach_hang")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$router.push('/trac-nghiem')
                    }
                });
        },
        callback(res) {
            var user = {
                "credential" : res.credential
            }
            axios
                .post("http://127.0.0.1:8000/api/khach-hang/dang-nhap-google", user)
                .then((res) => {
                    if (res.data.status == 1) {
                        this.$toast.success(res.data.message);
                        localStorage.setItem("key_khach_hang", res.data.key);
                        this.$router.push('/trac-nghiem')
                    }
                    else {
                        this.$toast.error(res.data.message);
                    }
                })
                // .catch((res) => {
                //     const list = Object.values(res.response.data.errors);
                //     list.forEach((v, i) => {
                //         this.$toast.error(v[0]);
                //     });
                // })
        }
    },
}
</script>
<style></style>