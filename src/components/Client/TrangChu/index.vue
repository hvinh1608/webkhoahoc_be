<template>
    <div class="row">
        <div class="col-lg-12">
            <div id="carouselExampleControls" class="carousel slide pointer-event" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class=""></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class=""></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="active"
                        aria-current="true"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active rounded-4" data-bs-interval="10000"
                        style="background-color: #1C2331;">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center ">
                                <div class="container ms-5">
                                    <h2 class="text-white mb-4">Mở bán khóa JavaScript Pro
                                        <i class="fa-brands fa-square-web-awesome-stroke text-warning"></i>
                                    </h2>
                                    <span class="text-white">
                                        Từ 20/10/2024 khóa học sẽ có giá 1.399k (-200k nếu pre-order khóa
                                        HTML
                                        CSS Pro). Khi full khóa học sẽ trở về giá gốc.
                                    </span>
                                    <p class="mt-4"><button class="btn btn-outline-light rounded-4"> <b>HỌC
                                                THỬ
                                                MIỄN PHÍ</b> </button></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <img src="https://files.fullstack.edu.vn/f8-prod/banners/37/66b5a6b16d31a.png"
                                    class="d-block w-100 rounded-4" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item rounded-4" data-bs-interval="2000" style="background-color: #1C2331;">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center ">
                                <div class="container ms-5">
                                    <h2 class="text-white mb-4">Học HTML CSS cho người mới
                                        <i class="fa-brands fa-square-web-awesome-stroke text-warning"></i>
                                    </h2>
                                    <span class="text-white">
                                        Thực hành dự án với Figma, hàng trăm bài tập và thử thách, tặng kèm
                                        Flashcards, v.v.
                                    </span>
                                    <p class="mt-4"><button class="btn btn-outline-light rounded-4"> <b>HỌC
                                                THỬ
                                                MIỄN PHÍ</b> </button></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <img src="https://files.fullstack.edu.vn/f8-prod/banners/20/6308a6bf603a4.png"
                                    class="d-block w-100 rounded-4" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item rounded-4" style="background-color: #1C2331;">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center ">
                                <div class="container ms-5">
                                    <h2 class="text-white mb-4">Học ReactJS Miễn Phí!
                                    </h2>
                                    <span class="text-white">
                                        Khóa học ReactJS từ cơ bản tới nâng cao. Kết quả của khóa học này là
                                        bạn có thể làm hầu hết các dự án thường gặp với ReactJS.
                                    </span>
                                    <p class="mt-4"><button class="btn btn-outline-light rounded-4"> <b>ĐĂNG
                                                KÝ NGAY</b> </button></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <img src="https://files.fullstack.edu.vn/f8-prod/banners/Banner_web_ReactJS.png"
                                    class="d-block w-100 rounded-4" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="alert alert-warning bg-warning alert-dismissible fade show py-2 rounded-4">
                        <marquee>
                            <div class="d-flex align-items-center mt-2">
                                <div class="font-35 "><i class="bx bx-bell"></i>
                                </div>
                                <div class="ms-3">
                                    <div class="fs-5">Với mong muốn mang đến kiến thức chất lượng, miễn phí
                                        cho mọi người, với tâm huyết phá bỏ rào cản kiến thức từ việc giáo
                                        dục thu phí. Chúng tôi - DZFullStack đã lập nên trang website này để
                                        thế giới phẳng hơn.

                                        Bất cứ ai có mong muốn khai phá thế giới. Phá bỏ mọi thứ ngăn cản sự
                                        phát triển tất yếu bền vững của xã hội đều là DZer (Thành viên của
                                        DZFullStack).</div>
                                </div>
                            </div>
                        </marquee>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-12 text-center">
                    <h2>KHÓA HỌC PRO <i class="fa-brands fa-square-web-awesome-stroke text-warning"></i>
                    </h2>
                    <p>Các khóa học lập trình online <span class="text-warning">PRO</span> vừa được
                        DZFullStack ra mắt</p>
                </div>
                <div class="col-lg-12 mt-2">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
                        <template v-for="(value, index) in list_khoa_hoc" :key="index">
                            <template v-if="index < 5">
                                <router-link :to="`/chi-tiet-khoa-hoc/` + value.id + '-' + value.slug_khoa_hoc">
                                    <div class="col d-flex">
                                        <div class="card rounded-4 flex-fill">
                                            <img :src="value.hinh_anh" class="card-img-top"
                                                style="border-top-left-radius: 20px; border-top-right-radius: 20px; height: 180px;"
                                                alt="...">
                                            <div class="">
                                                <div class="position-absolute top-0 end-0 m-3 product-discount"><i
                                                        class="fa-brands fa-square-web-awesome-stroke text-warning fa-xl"></i>
                                                </div>
                                            </div>
                                            <div class="card-body d-flex flex-column">
                                                <h6 class="card-title cursor-pointer">{{ value.ten_khoa_hoc }}</h6>
                                                <div class="clearfix mt-auto">
                                                    <p class="mb-0 float-start"><span
                                                            class="me-2 text-decoration-line-through text-secondary">{{
                                                            formatVND(value.gia_goc) }}</span><b class="text-danger">{{ formatVND(value.gia_ban)
                                                            }}</b>
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-between mt-4">
                                                    <p class="text-secondary"><i class="fa-solid fa-users me-1"></i>
                                                        131.495</p>
                                                    <p class="text-secondary"><i class="fa-solid fa-circle-play me-1"></i>
                                                        100</p>
                                                    <p class="text-secondary"><i class="fa-solid fa-clock me-1"></i>
                                                        116h44p</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </router-link>
                            </template>

                        </template>

                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <button class="btn btn-lg btn-outline-secondary radius-30 px-5">Xem thêm</button>
                </div>
            </div>
            <div class="row mt-5 position-relative">
                <div class="col-lg-12">
                    <div class="card">
                        <img src="https://zendvn.com/frontend/assets/images/background/9.jpg" class="card-img"
                            alt="...">
                        <div class="card-img-overlay">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div class="home-text">
                                    <h2 class="card-title">Tài nguyên lập trình</h2>
                                    <p class="card-text">Trắc nghiệm lập trình và các bài tập lập trình được
                                        sắp xếp theo nhiều chuyên mục khác nhau, với nhiều cấp độ từ dễ
                                        đến khó, đây là nơi giúp các lập trình viên thực hành và luyện
                                        code.</p>
                                    <a class="btn btn-lg btn-danger px-5 radius-30">Trắc nghiệm</a>
                                    <a class="btn btn-lg btn-dark px-5 radius-30">Bài tập</a>
                                    <a class="btn btn-lg btn-info px-5 radius-30">Video</a>
                                </div>
                                <img src="https://zendvn.com/frontend/assets/images/background/index_background_link_to_resources_02.png"
                                    class="card-img" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 text-center">
                    <h2>KHÓA HỌC MIẾN PHÍ <i class="fa-solid fa-fire-flame-curved text-danger"></i>
                    </h2>
                    <p>Các khóa học lập trình online <span class="text-danger">MIỄN PHÍ</span> vừa được
                        DZFullStack ra mắt.</p>
                    <p>Nội dung chi tiết trong từng video cung cấp đầy đủ kiến thức chuyên môn và giúp học
                        viên trải nghiệm môi trường vừa học vừa làm trong thực tế, giúp các bạn tự tin khi
                        đi làm</p>
                </div>
                <div class="col-lg-12 mt-2">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
                        <div class="col d-flex">
                            <div class="card rounded-4 flex-fill">
                                <img src="https://files.fullstack.edu.vn/f8-prod/courses/7.png" class=" card-img-top"
                                    style="border-top-left-radius: 20px; border-top-right-radius: 20px; height: 180px;"
                                    alt="...">
                                <div class="">
                                    <div class="position-absolute top-0 end-0 m-3 product-discount">
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title cursor-pointer">Kiến Thức Nhập Môn IT</h6>
                                    <div class="clearfix mt-auto">
                                        <p class="mb-0 float-start">
                                            <b class="text-danger">Miễn Phí</b>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <p class="text-secondary"><i class="fa-solid fa-users me-1"></i>
                                            131.495</p>
                                        <p class="text-secondary"><i class="fa-solid fa-circle-play me-1"></i> 100</p>
                                        <p class="text-secondary"><i class="fa-solid fa-clock me-1"></i>
                                            116h44p</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-4 flex-fill">
                                <img src="https://files.fullstack.edu.vn/f8-prod/courses/21/63e1bcbaed1dd.png"
                                    class=" card-img-top"
                                    style="border-top-left-radius: 20px; border-top-right-radius: 20px; height: 180px;"
                                    alt="...">
                                <div class="">
                                    <div class="position-absolute top-0 end-0 m-3 product-discount">
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title cursor-pointer">Lập trình C++ cơ bản, nâng cao
                                    </h6>
                                    <div class="clearfix mt-auto">
                                        <p class="mb-0 float-start">
                                            <b class="text-danger">Miễn Phí</b>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <p class="text-secondary"><i class="fa-solid fa-users me-1"></i>
                                            131.495</p>
                                        <p class="text-secondary"><i class="fa-solid fa-circle-play me-1"></i> 100</p>
                                        <p class="text-secondary"><i class="fa-solid fa-clock me-1"></i>
                                            116h44p</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-4 flex-fill">
                                <img src="https://files.fullstack.edu.vn/f8-prod/courses/2.png" class=" card-img-top"
                                    style="border-top-left-radius: 20px; border-top-right-radius: 20px; height: 180px;"
                                    alt="...">
                                <div class="">
                                    <div class="position-absolute top-0 end-0 m-3 product-discount">
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title cursor-pointer">HTML CSS từ Zero đến Hero</h6>
                                    <div class="clearfix mt-auto">
                                        <p class="mb-0 float-start">
                                            <b class="text-danger">Miễn Phí</b>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <p class="text-secondary"><i class="fa-solid fa-users me-1"></i>
                                            131.495</p>
                                        <p class="text-secondary"><i class="fa-solid fa-circle-play me-1"></i> 100</p>
                                        <p class="text-secondary"><i class="fa-solid fa-clock me-1"></i>
                                            116h44p</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-4 flex-fill">
                                <img src="https://files.fullstack.edu.vn/f8-prod/courses/1.png" class=" card-img-top"
                                    style="border-top-left-radius: 20px; border-top-right-radius: 20px; height: 180px;"
                                    alt="...">
                                <div class="">
                                    <div class="position-absolute top-0 end-0 m-3 product-discount">
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title cursor-pointer">Lập Trình JavaScript Cơ Bản</h6>
                                    <div class="clearfix mt-auto">
                                        <p class="mb-0 float-start">
                                            <b class="text-danger">Miễn Phí</b>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <p class="text-secondary"><i class="fa-solid fa-users me-1"></i>
                                            131.495</p>
                                        <p class="text-secondary"><i class="fa-solid fa-circle-play me-1"></i> 100</p>
                                        <p class="text-secondary"><i class="fa-solid fa-clock me-1"></i>
                                            116h44p</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-4 flex-fill">
                                <img src="https://files.fullstack.edu.vn/f8-prod/courses/12.png" class=" card-img-top"
                                    style="border-top-left-radius: 20px; border-top-right-radius: 20px; height: 180px;"
                                    alt="...">
                                <div class="">
                                    <div class="position-absolute top-0 end-0 m-3 product-discount">
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title cursor-pointer">Lập Trình JavaScript Nâng Cao</h6>
                                    <div class="clearfix mt-auto">
                                        <p class="mb-0 float-start">
                                            <b class="text-danger">Miễn Phí</b>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <p class="text-secondary"><i class="fa-solid fa-users me-1"></i>
                                            131.495</p>
                                        <p class="text-secondary"><i class="fa-solid fa-circle-play me-1"></i> 100</p>
                                        <p class="text-secondary"><i class="fa-solid fa-clock me-1"></i>
                                            116h44p</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <button class="btn btn-lg btn-outline-secondary radius-30 px-5">Xem thêm</button>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 text-center">
                    <h2>CẢM NHẬN CỦA HỌC VIÊN VỀ KHÓA HỌC <i class="fa-regular fa-message text-primary"></i>
                    </h2>
                </div>
                <div class="col-lg-12 mt-2">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                        <div class="col d-flex">
                            <div class="card shadow flex-fill radius-30">
                                <div class="card-body text-center">
                                    <div class="p-4 radius-15">
                                        <img src="../../../assets/images/avatars/avatar-1.png" width="150" height="150"
                                            class="rounded-circle shadow" alt="">
                                        <h5 class="mb-0 mt-5">Pauline I. Bird</h5>
                                        <p class="mb-3">Webdeveloper</p>
                                        <span>Lộ trình học phù hợp với các bạn sinh viên bị mất gốc cũng như
                                            các bạn muốn chuyển qua mảng lập trình.
                                            Giảng viên rất có tâm và nhiều kinh nghiệm, cách giảng dạy và
                                            truyền đạt cho học viên rất hiệu quả, giúp dễ tiếp thu các kiến
                                            thức mới.</span>
                                        <div class="ms-auto">
                                            <div class="mt-3">
                                                <button class="btn btn-primary radius-30 me-2">Xem
                                                    Thêm</button>
                                                <button class="btn btn-primary radius-30">Xem Chứng
                                                    Nhận</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card shadow flex-fill radius-30">
                                <div class="card-body text-center">
                                    <div class="p-4 radius-15">
                                        <img src="../../../assets/images/avatars/avatar-2.png" width="150" height="150"
                                            class="rounded-circle shadow" alt="">
                                        <h5 class="mb-0 mt-5">Ralph L. Alva</h5>
                                        <p class="mb-3">UI Developer</p>
                                        <span>- Chương trình phù hợp với những người mới làm quen với lập trình. Có các
                                            phần mở rộng thêm với học viên. Giảng viên nhiệt tình nhiều kinh nghiệm. Giờ
                                            sửa bài tập được sửa từng học viên qua đó học viên sẽ sửa được lỗi tốt
                                            hơn</span>
                                        <div class="ms-auto">
                                            <div class="mt-3">
                                                <button class="btn btn-primary radius-30 me-2">Xem
                                                    Thêm</button>
                                                <button class="btn btn-primary radius-30">Xem Chứng
                                                    Nhận</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card shadow flex-fill radius-30">
                                <div class="card-body text-center">
                                    <div class="p-4 radius-15">
                                        <img src="../../../assets/images/avatars/avatar-3.png" width="150" height="150"
                                            class="rounded-circle shadow" alt="">
                                        <h5 class="mb-0 mt-5">John B. Roman</h5>
                                        <p class="mb-3">Graphic Designer</p>
                                        <span>- Giảng viên có tâm, có tầm, giảng dạy dễ hiểu, giọng nói dễ
                                            nghe, thiện cảm và hài hước
                                            - Luôn hỗ trợ học viên hết mình và truyền đạt kiến thức rất sát
                                            với nhu cầu thực tế của học viên</span>
                                        <div class="ms-auto">
                                            <div class="mt-3">
                                                <button class="btn btn-primary radius-30 me-2">Xem
                                                    Thêm</button>
                                                <button class="btn btn-primary radius-30">Xem Chứng
                                                    Nhận</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card shadow flex-fill radius-30">
                                <div class="card-body text-center">
                                    <div class="p-4 radius-15">
                                        <img src="../../../assets/images/avatars/avatar-4.png" width="150" height="150"
                                            class="rounded-circle shadow" alt="">
                                        <h5 class="mb-0 mt-5">David O. Buckley</h5>
                                        <p class="mb-3">Android Developer</p>
                                        <span>Khóa học cung cấp đầy đủ kiến thức cơ bản để các bạn đi làm.
                                            Đặc biệt khi thực hiện các task học viên được hướng dẫn chi tiết
                                            từng bước để thực hiện các task.</span>
                                        <div class="ms-auto">
                                            <div class="mt-3">
                                                <button class="btn btn-primary radius-30 me-2">Xem
                                                    Thêm</button>
                                                <button class="btn btn-primary radius-30">Xem Chứng
                                                    Nhận</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card shadow flex-fill radius-30">
                                <div class="card-body text-center">
                                    <div class="p-4 radius-15">
                                        <img src="../../../assets/images/avatars/avatar-5.png" width="150" height="150"
                                            class="rounded-circle shadow" alt="">
                                        <h5 class="mb-0 mt-5">Jessica Doe</h5>
                                        <p class="mb-3">Android Developer</p>
                                        <span>Khoá học chất lượng. Khóa học được thiết kế có hệ thống, giúp học viên
                                            tiếp cận kiến thức một cách bài bản.Giảng viên luôn nhiệt huyết và tận tâm,
                                            không ngừng hỗ trợ học viên một cách chi tiết và tỉ mỉ.</span>
                                        <div class="ms-auto">
                                            <div class="mt-3">
                                                <button class="btn btn-primary radius-30 me-2">Xem
                                                    Thêm</button>
                                                <button class="btn btn-primary radius-30">Xem Chứng
                                                    Nhận</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card shadow flex-fill radius-30">
                                <div class="card-body text-center">
                                    <div class="p-4 radius-15">
                                        <img src="../../../assets/images/avatars/avatar-6.png" width="150" height="150"
                                            class="rounded-circle shadow" alt="">
                                        <h5 class="mb-0 mt-5">Tiger Xink</h5>
                                        <p class="mb-3">Android Developer</p>
                                        <span>Khóa học này vượt xa mong đợi của mình. Nội dung khóa học rất tốt, bao
                                            quát và cung cấp nhiều kiến thức. Sự nhiệt tình và thân thiện của giảng viên
                                            cũng là một điểm cộng lớn. </span>
                                        <div class="ms-auto">
                                            <div class="mt-3">
                                                <button class="btn btn-primary radius-30 me-2">Xem
                                                    Thêm</button>
                                                <button class="btn btn-primary radius-30">Xem Chứng
                                                    Nhận</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <button class="btn btn-lg btn-outline-secondary radius-30 px-5">Xem thêm</button>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 text-center">
                    <h2>BÀI VIẾT CỦA CHÚNG TÔI <i class="fa-regular fa-newspaper"></i>
                    </h2>
                    <p>DZFullStack tổng hợp bài viết kiến thức lập trình, thông báo và tin tức</p>
                </div>
                <div class="col-lg-12 mt-2">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-3 product-grid">
                        <div class="col d-flex">
                            <div class="card rounded-4 flex-fill">
                                <img src="https://zendvn.com/images/article/g3ZqJjKUnJ.jpeg" class=" card-img-top"
                                    style="border-top-left-radius: 20px; border-top-right-radius: 20px; height: 300px;"
                                    alt="...">
                                <div class="">
                                    <div class="position-absolute top-0 end-0 m-3 product-discount">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title cursor-pointer">Phương pháp Lập danh sách công việc (To Do
                                        List)</h5>
                                    <div class="clearfix mt-auto">
                                        <p class="mb-0 float-start">
                                            Mọi người có thể Google sẽ ra nhiều phương pháp và cách hướng dẫn lập list
                                            task để làm việc hiệu quả hơn. Qua quá trình mình áp dụng và hướng dẫn lại
                                            một số anh em học viên, có một số lưu ý mình chia sẻ lại với mọi người như
                                            sau
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-4 flex-fill">
                                <img src="https://zendvn.com/images/article/72y04aqffx.jpeg" class=" card-img-top"
                                    style="border-top-left-radius: 20px; border-top-right-radius: 20px; height: 300px;"
                                    alt="...">
                                <div class="">
                                    <div class="position-absolute top-0 end-0 m-3 product-discount">
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title cursor-pointer">Lập trình viên Ctrl C, Ctrl V và Ctrl X
                                    </h6>
                                    <div class="clearfix mt-auto">
                                        <p class="mb-0 float-start">
                                            Nếu Ctrl C và Ctrl V là một nghệ thuật, thì coder khi Copy Paste phải là một
                                            nghệ sĩ Có lẻ phím Ctrl là phím nằm trong tốp các phím được sử dụng nhiều
                                            nhất đối với các bạn coder (đương nhiên mình cũng không ngoại lệ) và có lẻ
                                            vì bị lạm dụng nhiều quá nên hôm nay em nó đã chính thức biểu tình ngưng làm
                                            việc.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-4 flex-fill">
                                <img src="https://zendvn.com/images/article/b37Ez9toyX.jpeg" class=" card-img-top"
                                    style="border-top-left-radius: 20px; border-top-right-radius: 20px; height: 300px;"
                                    alt="...">
                                <div class="">
                                    <div class="position-absolute top-0 end-0 m-3 product-discount">
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title cursor-pointer">Xây dựng video training cần gì?</h6>
                                    <div class="clearfix mt-auto">
                                        <p class="mb-0 float-start">
                                            Trong thời gian qua ZendVN nhận được rất nhiều câu hỏi như là "Để sản xuất
                                            các video training như mình, cần chuẩn bị ít nhất những gì?". Để trả lời câu
                                            hỏi đó cho các bạn thì các bạn hãy đọc bài tâm sự này và tiến hành đầu tư,
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-4 flex-fill">
                                <img src="https://zendvn.com/images/article/DZeaWRlkPA.png" class=" card-img-top"
                                    style="border-top-left-radius: 20px; border-top-right-radius: 20px; height: 300px;"
                                    alt="...">
                                <div class="">
                                    <div class="position-absolute top-0 end-0 m-3 product-discount">
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title cursor-pointer">Hướng dẫn cài đặt Laravel trên MacOS</h6>
                                    <div class="clearfix mt-auto">
                                        <p class="mb-0 float-start">
                                            Bài viết Hướng dẫn cài đặt Laravel trên MacOS sẽ giúp các bạn mới chuyển
                                            sang hệ điều hành này có thể cài đặt và chạy chương trình Laravel đầu tiên
                                            trên.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-4 flex-fill">
                                <img src="https://zendvn.com/images/article/BnTpItidIL.png" class=" card-img-top"
                                    style="border-top-left-radius: 20px; border-top-right-radius: 20px; height: 300px;"
                                    alt="...">
                                <div class="">
                                    <div class="position-absolute top-0 end-0 m-3 product-discount">
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title cursor-pointer">Hướng dẫn sử dụng Visual Studio Code A-Z toàn
                                        tập</h6>
                                    <div class="clearfix mt-auto">
                                        <p class="mb-0 float-start">
                                            Sử dụng Visual Studio Code từ A đến Z dành cho các bạn mới bắt đầu học lập
                                            trình cho đến những anh em lập trình viên đã đi làm, bài viết này còn tổng
                                            hợp các extension hay, cách tạo snippet, phím tắt tiện dụng trong VSCode.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-4 flex-fill">
                                <img src="https://zendvn.com/images/article/pyiHpZ9eoz.jpeg" class=" card-img-top"
                                    style="border-top-left-radius: 20px; border-top-right-radius: 20px; height: 300px;"
                                    alt="...">
                                <div class="">
                                    <div class="position-absolute top-0 end-0 m-3 product-discount">
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title cursor-pointer"> Con vịt </h6>
                                    <div class="clearfix mt-auto">
                                        <p class="mb-0 float-start">
                                            Facebook là ảo, nơi để khoe để vui chứ không phải nơi người ta than vãn về
                                            công việc và cuộc sống của họ.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <button class="btn btn-lg btn-outline-secondary radius-30 px-5">Xem thêm</button>
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
            list_khoa_hoc: []
        }
    },
    mounted() {
        this.loadKhoaHoc()
    },
    methods: {
        formatVND(number){
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format( number,)
        },
        loadKhoaHoc() {
            axios
                .get("http://127.0.0.1:8000/api/home-page/loai-khoa-hoc/data-open")
                .then((res) => {
                    this.list_khoa_hoc = res.data.data;
                });
        }
    },
}
</script>
<style></style>