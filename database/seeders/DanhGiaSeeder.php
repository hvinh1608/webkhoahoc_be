<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DanhGiaSeeder extends Seeder
{
    public function run()
    {
        $startDate  = Carbon::create(2024, 10, 1);
        $endDate    = Carbon::create(2024, 12, 1);
        DB::table('danh_gias')->delete();
        DB::table('danh_gias')->truncate();
        DB::table('danh_gias')->insert([
            [
                'ho_ten' => 'Hồng Vinh',
                'khoa_hoc' => 'Laravel từ A-Z',
                'vai_tro' => 'Học viên',
                'noi_dung' => 'Khóa học rất bổ ích và dễ hiểu!',
                'rating' => rand(3, 5), // Rating từ 3 đến 5 sao
                'avatar' => 'avatars/avatar1.jpg',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'ho_ten' => 'Trần Thị B',
                'khoa_hoc' => 'Vue.js cơ bản',
                'vai_tro' => 'Học viên',
                'noi_dung' => 'Giảng viên dạy rất có tâm, mình học hiểu nhanh.',
                'rating' => rand(3, 5),
                'avatar' => 'avatars/avatar2.jpg',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'ho_ten' => 'Sơn Tùng-MTP',
                'khoa_hoc' => 'React Native nâng cao',
                'vai_tro' => 'Học viên',
                'noi_dung' => 'Mình đã có thể tự làm một app sau khi học xong!',
                'rating' => rand(3, 5),
                'avatar' => 'avatars/avatar3.jpg',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'ho_ten' => 'Phạm Hồng D',
                'khoa_hoc' => 'Node.js và Express',
                'vai_tro' => 'Học viên',
                'noi_dung' => 'Giảng viên giải thích rất kỹ, ví dụ thực tế nhiều.',
                'rating' => rand(3, 5),
                'avatar' => 'avatars/avatar4.jpg',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'ho_ten' => 'Lê Thanh E',
                'khoa_hoc' => 'Python cho người mới bắt đầu',
                'vai_tro' => 'Học viên',
                'noi_dung' => 'Chương trình rất bài bản và có nhiều bài tập thực hành.',
                'rating' => rand(3, 5),
                'avatar' => 'avatars/avatar5.jpg',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'ho_ten' => 'Phạm Thị F',
                'khoa_hoc' => 'Fullstack JavaScript',
                'vai_tro' => 'Học viên',
                'noi_dung' => 'Rất phù hợp cho những ai muốn trở thành lập trình viên fullstack.',
                'rating' => rand(3, 5),
                'avatar' => 'avatars/avatar6.jpg',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
        ]);
    }
}
