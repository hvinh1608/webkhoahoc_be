<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class BaiVietSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    // Văn Nhân
    public function run(): void
    {
        $startDate  = Carbon::create(2024, 10, 1);
        $endDate    = Carbon::create(2024, 12, 1);
        DB::table('bai_viets')->delete();
        DB::table('bai_viets')->truncate();
        DB::table('bai_viets')->insert([
            [
                'tieu_de' => 'Tôi đã viết Chrome extension đầu tiên của mình bằng Github Copilot như thế nào?',
                'slug_tieu_de' => 'toi-da-viet-chrome-extension-dau-tien-cua-minh-bang-github-copilot-nhu-the-nao',
                'hinh_anh' => 'https://files.fullstack.edu.vn/f8-prod/blog_posts/9976/65fa652ce3a64.jpg',
                'mo_ta_ngan' => 'Hướng dẫn viết Chrome extension đầu tiên bằng Github Copilot.',
                'noi_dung' => '<ol>
                    <li>Cấu trúc thư mục cơ bản của một extension.</li>
                    <li>Cách tạo manifest.json để khai báo thông tin extension.</li>
                    <li>Viết file background script và content script.</li>
                    <li>Làm thế nào để Copilot gợi ý code một cách thông minh.</li>
                    <li>Debug và đóng gói extension để chạy thử.</li>
                </ol>',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Hành trình trở thành lập trình viên Fullstack từ con số 0',
                'slug_tieu_de' => 'hanh-trinh-tro-thanh-lap-trinh-vien-fullstack-tu-con-so-0',
                'hinh_anh' => 'https://files.fullstack.edu.vn/f8-prod/blog_posts/279/6153f692d366e.jpg',
                'mo_ta_ngan' => 'Chia sẻ lộ trình học tập để trở thành một lập trình viên Fullstack chuyên nghiệp.',
                'noi_dung' => '<ol>
                    <li>Học về HTML, CSS, và JavaScript.</li>
                    <li>Làm quen với các framework Frontend như Vue.js hoặc React.</li>
                    <li>Học về Backend với Node.js và Express.js hoặc Laravel.</li>
                    <li>Hiểu về database: SQL (MySQL, PostgreSQL) và NoSQL (MongoDB).</li>
                    <li>Triển khai dự án thực tế và làm quen với DevOps.</li>
                </ol>',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Những công nghệ quan trọng trong Fullstack Development',
                'slug_tieu_de' => 'nhung-cong-nghe-quan-trong-trong-fullstack-development',
                'hinh_anh' => 'https://files.fullstack.edu.vn/f8-prod/blog_posts/107/613a1f3685814.png',
                'mo_ta_ngan' => 'Tổng hợp các công nghệ quan trọng mà một lập trình viên Fullstack cần nắm vững.',
                'noi_dung' => '<ol>
                    <li>HTML, CSS, JavaScript.</li>
                    <li>Frontend Frameworks: React, Vue.js, Angular.</li>
                    <li>Backend Frameworks: Node.js, Express.js, Laravel, Django.</li>
                    <li>Cơ sở dữ liệu: MySQL, PostgreSQL, MongoDB.</li>
                    <li>Authentication & Authorization: JWT, OAuth.</li>
                    <li>DevOps & Deployment: Docker, Kubernetes, AWS.</li>
                    <li>CI/CD: GitHub Actions, Jenkins.</li>
                </ol>',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'So sánh giữa Fullstack, Frontend và Backend Developer',
                'slug_tieu_de' => 'so-sanh-giua-fullstack-frontend-va-backend-developer',
                'hinh_anh' => 'https://files.fullstack.edu.vn/f8-prod/blog_posts/791/615de64de7e8f.jpg',
                'mo_ta_ngan' => 'Tìm hiểu sự khác nhau giữa các vị trí lập trình viên Fullstack, Frontend và Backend.',
                'noi_dung' => '<ol>
                    <li>Frontend Developer: Chuyên về giao diện người dùng.</li>
                    <li>Backend Developer: Xử lý logic phía server và quản lý database.</li>
                    <li>Fullstack Developer: Kết hợp cả Frontend và Backend.</li>
                </ol>',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Xây dựng một ứng dụng web Fullstack với Vue.js và Laravel',
                'slug_tieu_de' => 'xay-dung-ung-dung-web-fullstack-voi-vuejs-va-laravel',
                'hinh_anh' => 'https://files.fullstack.edu.vn/f8-prod/courses/7.png',
                'mo_ta_ngan' => 'Hướng dẫn xây dựng một ứng dụng web Fullstack hoàn chỉnh với Vue.js và Laravel.',
                'noi_dung' => '<ol>
                    <li>Cài đặt Laravel.</li>
                    <li>Tạo API với Laravel.</li>
                    <li>Cài đặt Vue.js.</li>
                    <li>Xây dựng giao diện.</li>
                    <li>Triển khai ứng dụng.</li>
                </ol>',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Cách tối ưu hiệu suất cho ứng dụng Fullstack',
                'slug_tieu_de' => 'cach-toi-uu-hieu-suat-cho-ung-dung-fullstack',
                'hinh_anh' => 'https://files.fullstack.edu.vn/f8-prod/courses/2.png',
                'mo_ta_ngan' => 'Hướng dẫn tối ưu hóa hiệu suất cho ứng dụng Fullstack với các mẹo hữu ích.',
                'noi_dung' => '<ol>
                    <li>Sử dụng bộ nhớ đệm (Caching).</li>
                    <li>Lazy Loading.</li>
                    <li>Tối ưu truy vấn database.</li>
                    <li>Giảm kích thước file JavaScript và CSS.</li>
                    <li>Tối ưu Server Response.</li>
                    <li>Sử dụng CDN.</li>
                    <li>Kiểm tra hiệu suất với Lighthouse.</li>
                </ol>',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ]
        ]);
    }
}
