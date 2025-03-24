<template>
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12">
                    <h1>{{ chi_tiet_khoa_hoc.ten_khoa_hoc }}</h1>
                    <span>{{ chi_tiet_khoa_hoc.mo_ta_ngan }}</span>
                </div>
                <hr class="mt-3 mb-3">
                <div class="col-lg-12">
                    <h4>Nội dung khóa học</h4>
                    <b>11</b> chương - <b>138</b> bài học - Thời lượng <b>10 giờ 29 phút</b>
                </div>
                <div class="col-lg-12 mt-3">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <h6>1. Giới thiệu</h6>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p><i class="fa-solid fa-circle-play me-2"></i> 1. Giới thiệu khóa học</p>
                                        <p>01:03</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p><i class="fa-solid fa-circle-play me-2"></i> 2. Cài đặt Dev - C++</p>
                                        <p>02:31</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p><i class="fa-solid fa-circle-play me-2"></i> 3. Hướng dẫn sử dụng Dev - C++
                                        </p>
                                        <p>03:33</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h6>2.Biến và kiểu dữ liệu</h6>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p><i class="fa-solid fa-circle-play me-2"></i> 1. Giới thiệu khóa học</p>
                                        <p>01:03</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p><i class="fa-solid fa-circle-play me-2"></i> 2. Cài đặt Dev - C++</p>
                                        <p>02:31</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p><i class="fa-solid fa-circle-play me-2"></i> 3. Hướng dẫn sử dụng Dev - C++
                                        </p>
                                        <p>03:33</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h6>3. Cấu trúc điều khiển và vòng lặp</h6>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p><i class="fa-solid fa-circle-play me-2"></i> 1. Giới thiệu khóa học</p>
                                        <p>01:03</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p><i class="fa-solid fa-circle-play me-2"></i> 2. Cài đặt Dev - C++</p>
                                        <p>02:31</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p><i class="fa-solid fa-circle-play me-2"></i> 3. Hướng dẫn sử dụng Dev - C++
                                        </p>
                                        <p>03:33</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <iframe width="100%" height="515" style="border-radius: 20px;"
                src="https://www.youtube.com/embed/Da1tpV9TMU0?si=gdWaKQGW9qqjySC2" frameborder="0"
                allowfullscreen></iframe>
            <h4 class="text-danger mt-2 text-center">{{ formatVND(chi_tiet_khoa_hoc.gia_ban) }}</h4>
            <div class="text-center">
                <button v-on:click="muaKhoaHoc()" type="button" class="btn btn-primary px-5 radius-30 mt-2">ĐĂNG KÝ HỌC</button>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <p><i class="fa-solid fa-gauge-high"></i> Trình độ cơ bản</p>
                <p><i class="fa-solid fa-film"></i> Tổng số 138 bài học</p>
                <p><i class="fa-solid fa-clock"></i> Thời lượng 10 giờ 29 phút</p>
                <p><i class="fa-solid fa-battery-full"></i> Học mọi lúc, mọi nơi</p>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    props : ['id_khoa_hoc','slug_khoa_hoc'],
    data() {
        return {
            id_khoa_hoc : this.$route.params.id_khoa_hoc,
            chi_tiet_khoa_hoc : {}
        }
    },
    mounted() {
      this.loadChiTietKhoaHoc()  
    },
    methods: {
        muaKhoaHoc(){
            var payload = {
                id_khoa_hoc : this.id_khoa_hoc,
                so_tien_mua : this.chi_tiet_khoa_hoc.gia_ban
            }
            axios
                .post("http://127.0.0.1:8000/api/home-page/mua-khoa-hoc/create", payload,{
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_khach_hang")
                    }
                })
                .then((res) => {
                    if(res.data.status==1){
                        this.$toast.success(res.data.message)
                        this.$router.push('/danh-sach-khoa-hoc')
                    }
                    else if(res.data.status == 2){
                        this.$toast.warning(res.data.message);
                        this.$router.push('/profile')
                    }
                    else{
                        this.$toast.error(res.data.message);
                    }
                }).catch((res) => {
                    this.$toast.error('Vui lòng đăng nhập để mua khóa học');
                })
        },
        formatVND(number){
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format( number,)
        },
        loadChiTietKhoaHoc(){
            axios
                .get("http://127.0.0.1:8000/api/home-page/loai-khoa-hoc/chi-tiet/" + this.id_khoa_hoc)
                .then((res) => {
                    if(res.data.status==1){
                        this.chi_tiet_khoa_hoc = res.data.data;
                    }
                    else{
                        this.$toast.error(res.data.message);
                        this.$toast.push('/');
                    }
                });
        }
    },
}
</script>
<style></style>