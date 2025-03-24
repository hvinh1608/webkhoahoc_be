<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KhachHangSeeding extends Seeder
{
    public function run(): void
    {
        $startDate  = Carbon::create(2024, 10, 1);
        $endDate    = Carbon::create(2024, 12, 1);
        DB::table('khach_hangs')->delete();
        DB::table('khach_hangs')->truncate();
        DB::table('khach_hangs')->insert([
            [
                'ho_va_ten' => 'Nguyễn Văn A',
                'email' => 'nguyenvana@example.com',
                'password' => 123456,
                'so_dien_thoai' => '0912345678',
                'so_du' => '5000000',
                'ngay_sinh' => '1995-06-15',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Admin',
                'email' => 'admin@master.com',
                'password' => 123456,
                'so_dien_thoai' => '0123456789',
                'so_du' => '2000000',
                'ngay_sinh' => '2001-01-01',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Trần Thị B',
                'email' => 'tranthib@example.com',
                'password' => 123456,
                'so_dien_thoai' => '0987654321',
                'so_du' => '3000000',
                'ngay_sinh' => '1998-11-23',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ]
        ]);
    }
}
