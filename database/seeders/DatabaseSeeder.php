<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LoaiKhoaHocSeeding::class,
            KhachHangSeeding::class,
            BaiHocSeeding::class,
            BaiHocFreeSeeding::class,
            BaiVietSeeding::class,
            TracNghiemSeeder::class,
            NhanVienSeeder::class,
            TaiChinhSeeding::class,
            ChiTietChucNangSeed::class,
            PhanQuyenSeed::class,
            ChiTietPhanQuyenSeeder::class,
            KhoaHocFreeSeeder::class,
            DanhGiaSeeder::class,
        ]);
    }
}
