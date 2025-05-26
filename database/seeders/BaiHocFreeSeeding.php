<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BaiHocFreeSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { {
            $startDate  = Carbon::create(2024, 10, 1);
            $endDate    = Carbon::create(2024, 12, 1);
            DB::table('bai_hoc_frees')->delete();
            DB::table('bai_hoc_frees')->truncate();
            DB::table('bai_hoc_frees')->insert([

                // 1. Lập trình Laravel cơ bản
                ['id_khoa_hoc_free' => '1', 'tieu_de' => 'Giới thiệu Laravel', 'bai_hoc_so' => '1', 'link_bai_hoc' => 'https://www.youtube.com/embed/ImtZ5yENzgE', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '1', 'tieu_de' => 'Cấu trúc dự án Laravel', 'bai_hoc_so' => '2', 'link_bai_hoc' => 'https://www.youtube.com/embed/M8GqoG0gw7Y', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '1', 'tieu_de' => 'Routing và Controller', 'bai_hoc_so' => '3', 'link_bai_hoc' => 'https://www.youtube.com/embed/UjjybnKeazc', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],

                // 2. ReactJS cho người mới bắt đầu
                ['id_khoa_hoc_free' => '2', 'tieu_de' => 'Giới thiệu ReactJS', 'bai_hoc_so' => '1', 'link_bai_hoc' => 'https://www.youtube.com/embed/Ke90Tje7VS0', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '2', 'tieu_de' => 'Sử dụng JSX', 'bai_hoc_so' => '2', 'link_bai_hoc' => 'https://www.youtube.com/embed/SqcY0GlETPk', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '2', 'tieu_de' => 'Component trong React', 'bai_hoc_so' => '3', 'link_bai_hoc' => 'https://www.youtube.com/embed/KVxZBt4kTRA', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],

                // 3. Python cho lập trình viên
                ['id_khoa_hoc_free' => '3', 'tieu_de' => 'Giới thiệu Python', 'bai_hoc_so' => '1', 'link_bai_hoc' => 'https://www.youtube.com/embed/rfscVS0vtbw', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '3', 'tieu_de' => 'Biến và kiểu dữ liệu', 'bai_hoc_so' => '2', 'link_bai_hoc' => 'https://www.youtube.com/embed/WGJJIrtnfpk', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '3', 'tieu_de' => 'Vòng lặp và điều kiện', 'bai_hoc_so' => '3', 'link_bai_hoc' => 'https://www.youtube.com/embed/6iF8Xb7Z3wQ', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],

                // 4. Node.js và ExpressJS
                ['id_khoa_hoc_free' => '4', 'tieu_de' => 'Giới thiệu Node.js', 'bai_hoc_so' => '1', 'link_bai_hoc' => 'https://www.youtube.com/embed/TlB_eWDSMt4', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '4', 'tieu_de' => 'Cài đặt Express', 'bai_hoc_so' => '2', 'link_bai_hoc' => 'https://www.youtube.com/embed/lY6icfhap2o', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '4', 'tieu_de' => 'Xây dựng REST API', 'bai_hoc_so' => '3', 'link_bai_hoc' => 'https://www.youtube.com/embed/pKd0Rpw7O48', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],

                // 5. Vue.js - Xây dựng SPA
                ['id_khoa_hoc_free' => '5', 'tieu_de' => 'Giới thiệu Vue.js', 'bai_hoc_so' => '1', 'link_bai_hoc' => 'https://www.youtube.com/embed/FXpIoQ_rT_c', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '5', 'tieu_de' => 'Component trong Vue', 'bai_hoc_so' => '2', 'link_bai_hoc' => 'https://www.youtube.com/embed/4deVCNJq3qc', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '5', 'tieu_de' => 'Vue Router', 'bai_hoc_so' => '3', 'link_bai_hoc' => 'https://www.youtube.com/embed/nb8Pj7r3xnw', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],

                // 6. Java Spring Boot nâng cao
                ['id_khoa_hoc_free' => '6', 'tieu_de' => 'Giới thiệu Spring Boot', 'bai_hoc_so' => '1', 'link_bai_hoc' => 'https://www.youtube.com/embed/q8SxXkdgT1o', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '6', 'tieu_de' => 'Cấu trúc dự án Spring Boot', 'bai_hoc_so' => '2', 'link_bai_hoc' => 'https://www.youtube.com/embed/KtHQGs3zFAM', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '6', 'tieu_de' => 'REST API với Spring Boot', 'bai_hoc_so' => '3', 'link_bai_hoc' => 'https://www.youtube.com/embed/LXRU-Z36GEU', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],

                // 7. Machine Learning cơ bản
                ['id_khoa_hoc_free' => '7', 'tieu_de' => 'Giới thiệu Machine Learning', 'bai_hoc_so' => '1', 'link_bai_hoc' => 'https://www.youtube.com/embed/aircAruvnKk', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '7', 'tieu_de' => 'Thuật toán học máy', 'bai_hoc_so' => '2', 'link_bai_hoc' => 'https://www.youtube.com/embed/GwIo3gDZCVQ', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '7', 'tieu_de' => 'Triển khai mô hình Machine Learning', 'bai_hoc_so' => '3', 'link_bai_hoc' => 'https://www.youtube.com/embed/O5xeyoRL95U', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],

                // 8. C++ cho người mới bắt đầu
                ['id_khoa_hoc_free' => '8', 'tieu_de' => 'Giới thiệu C++', 'bai_hoc_so' => '1', 'link_bai_hoc' => 'https://www.youtube.com/embed/KJgsSFOSQv0', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '8', 'tieu_de' => 'Cấu trúc cơ bản của C++', 'bai_hoc_so' => '2', 'link_bai_hoc' => 'https://www.youtube.com/embed/SWZfFNyUsxc', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '8', 'tieu_de' => 'Hàm và lớp trong C++', 'bai_hoc_so' => '3', 'link_bai_hoc' => 'https://www.youtube.com/embed/D4aV6VxL1N0', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],

                // 9. Flutter - Lập trình ứng dụng di động
                ['id_khoa_hoc_free' => '9', 'tieu_de' => 'Giới thiệu Flutter', 'bai_hoc_so' => '1', 'link_bai_hoc' => 'https://www.youtube.com/embed/x0uinJvhNxI', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '9', 'tieu_de' => 'Widgets trong Flutter', 'bai_hoc_so' => '2', 'link_bai_hoc' => 'https://www.youtube.com/embed/h-igXZCCrrc', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '9', 'tieu_de' => 'Flutter State Management', 'bai_hoc_so' => '3', 'link_bai_hoc' => 'https://www.youtube.com/embed/EXH8F31vRoo', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],

                // 10. SQL - Làm chủ cơ sở dữ liệu
                ['id_khoa_hoc_free' => '10', 'tieu_de' => 'Giới thiệu SQL', 'bai_hoc_so' => '1', 'link_bai_hoc' => 'https://www.youtube.com/embed/7S_tz1z_5bA', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '10', 'tieu_de' => 'Câu lệnh SELECT trong SQL', 'bai_hoc_so' => '2', 'link_bai_hoc' => 'https://www.youtube.com/embed/27axs9dO7AE', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
                ['id_khoa_hoc_free' => '10', 'tieu_de' => 'SQL JOIN nâng cao', 'bai_hoc_so' => '3', 'link_bai_hoc' => 'https://www.youtube.com/embed/9yeOJ0ZMUYw', 'tinh_trang' => '1', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ]);
        }
    }
}
