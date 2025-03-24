<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KhoaHocFreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate  = Carbon::create(2024, 10, 1);
        $endDate    = Carbon::create(2024, 12, 1);
        DB::table('khoa_hoc_frees')->delete();
        DB::table('khoa_hoc_frees')->truncate();
        DB::table('khoa_hoc_frees')->insert([

            [
                'title' => 'Lập trình Laravel cơ bản',
                'slug' => Str::slug('Lập trình Laravel cơ bản'),
                'image' => 'https://gitiho.com/caches/cc_xs_medium/cou_avatar/2024/05_30/b611546305eb0c37c3267a29e0f4cc4f.png',
                'description' => 'Khóa học giúp bạn làm chủ Laravel từ cơ bản đến nâng cao.',
                'students_count' => 500,
                'lesson_count' => 20,
                'duration' => '20 giờ',
                'is_free' => true,
                'link_gioi_thieu' => 'https://www.youtube.com/embed/aGW6IsScDKw?si=uQ5v5UMf4dIWVKL8',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'title' => 'ReactJS cho người mới bắt đầu',
                'slug' => Str::slug('ReactJS cho người mới bắt đầu'),
                'image' => 'https://files.fullstack.edu.vn/f8-prod/courses/13/13.png',
                'description' => 'Khóa học giúp bạn xây dựng ứng dụng với ReactJS.',
                'students_count' => 600,
                'lesson_count' => 18,
                'duration' => '15 giờ',
                'is_free' => true,
                'link_gioi_thieu' => 'https://www.youtube.com/embed/0tIW7TK7p8w?si=ZvMiUM1MLAKhEjw1',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'title' => 'Python cho lập trình viên',
                'slug' => Str::slug('Python cho lập trình viên'),
                'image' => 'https://daotaobinhduong.com/wp-content/uploads/2022/04/Hoc-lap-trinh-Python-co-ban-nang-cao-tai-Binh-Duong.jpg',
                'description' => 'Khóa học Python từ cơ bản đến nâng cao, phù hợp cho lập trình viên.',
                'students_count' => 750,
                'lesson_count' => 25,
                'duration' => '25 giờ',
                'is_free' => true,
                'link_gioi_thieu' => 'https://www.youtube.com/embed/K7ZKTjmZeWw?si=dvsZnmH3PpNnmeiF',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'title' => 'Node.js và ExpressJS',
                'slug' => Str::slug('Node.js và ExpressJS'),
                'image' => 'https://files.fullstack.edu.vn/f8-prod/courses/6.png',
                'description' => 'Học cách xây dựng backend với Node.js và Express.',
                'students_count' => 700,
                'lesson_count' => 22,
                'duration' => '18 giờ',
                'is_free' => true,
                'link_gioi_thieu' => 'https://www.youtube.com/embed/OJacn9HETio?si=e5pIQ7luZ7llKLI8',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'title' => 'Vue.js',
                'slug' => Str::slug('Vue.js'),
                'image' => 'https://i0.wp.com/blog.facialix.com/wp-content/uploads/2023/11/3624814_4744_3.jpg?w=1200&ssl=1',
                'description' => 'Khóa học Vue.js giúp bạn phát triển ứng dụng single-page.',
                'students_count' => 450,
                'lesson_count' => 15,
                'duration' => '17 giờ',
                'is_free' => true,
                'link_gioi_thieu' => 'https://www.youtube.com/embed/1GNsWa_EZdw?si=UD9Bu2WQSrKAx3-Z',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'title' => 'Java Spring Boot nâng cao',
                'slug' => Str::slug('Java Spring Boot nâng cao'),
                'image' => 'https://200lab.io/blog/_next/image?url=https%3A%2F%2Fstatics.cdn.200lab.io%2F2024%2F11%2Fspring-boot-la-gi.png&w=3840&q=75',
                'description' => 'Khóa học Java Spring Boot chuyên sâu dành cho developer.',
                'students_count' => 680,
                'lesson_count' => 24,
                'duration' => '22 giờ',
                'is_free' => true,
                'link_gioi_thieu' => 'https://www.youtube.com/embed/H6m9cioldKw?si=QUs5h64XA3muKm4r',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'title' => 'Machine Learning cơ bản',
                'slug' => Str::slug('Machine Learning cơ bản'),
                'image' => 'https://statics.cdn.200lab.io/2024/10/machine-learning-la-gi.jpeg',
                'description' => 'Học cách xây dựng mô hình Machine Learning từ dữ liệu thực tế.',
                'students_count' => 800,
                'lesson_count' => 30,
                'duration' => '30 giờ',
                'is_free' => true,
                'link_gioi_thieu' => 'https://www.youtube.com/embed/ADg3VdITIVs?si=0WnKmIU6bH0C8aX2',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'title' => 'C++ cho người mới bắt đầu',
                'slug' => Str::slug('C++ cho người mới bắt đầu'),
                'image' => 'https://s3-sgn09.fptcloud.com/codelearnstorage/files/thumbnails/lap-trinh-cpp-co-ban_4af6f617fbec4380b4e046a7797624e1.png',
                'description' => 'Khóa học C++ giúp bạn nắm vững các khái niệm lập trình cơ bản.',
                'students_count' => 550,
                'lesson_count' => 12,
                'duration' => '15 giờ',
                'is_free' => true,
                'link_gioi_thieu' => 'https://www.youtube.com/embed/74B6PXO97Tw?si=shC5B3J8Ir26r70w',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'title' => 'Flutter - Lập trình ứng dụng di động',
                'slug' => Str::slug('Flutter - Lập trình ứng dụng di động'),
                'image' => 'https://vtiacademy.edu.vn/upload/images/banner-home/flutter-la-gi-tai-sao-nen-hoc-cong-cu-lap-trinh-flutter.jpg',
                'description' => 'Xây dựng ứng dụng di động đa nền tảng với Flutter.',
                'students_count' => 620,
                'lesson_count' => 20,
                'duration' => '20 giờ',
                'is_free' => true,
                'link_gioi_thieu' => 'https://www.youtube.com/embed/qsXdttFoglI?si=NNwkUybEkdDXpP3W',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'title' => 'SQL - Làm chủ cơ sở dữ liệu',
                'slug' => Str::slug('SQL - Làm chủ cơ sở dữ liệu'),
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXYu81F26mi7eudFn01NvM_w6sxgtVh2monA&s',
                'description' => 'Khóa học SQL giúp bạn thao tác với cơ sở dữ liệu MySQL, PostgreSQL.',
                'students_count' => 700,
                'lesson_count' => 16,
                'duration' => '16 giờ',
                'is_free' => true,
                'link_gioi_thieu' => 'https://www.youtube.com/embed/tchgfPvyx8g?si=FJynesqATDmE30tQ',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ]
        ]);
    }
}
