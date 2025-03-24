<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nhan_viens')->delete();

        DB::table('nhan_viens')->truncate();

        DB::table('nhan_viens')->insert([
            [
                'email'             =>  'hvinh.job@gmail.com',
                'password'          =>  '123456',
                'ho_va_ten'         =>  'Trần Ngô Hồng Vinh',
                'so_dien_thoai'     =>  '0335446435',
                'dia_chi'           =>  'Đà Nẵng',
                'tinh_trang'        =>  1,
                'id_quyen'          =>  1,
            ],
            [
                'email'             =>  'khacbac@gmail.com',
                'password'          =>  '123456',
                'ho_va_ten'         =>  'Trương Khắc Bắc',
                'so_dien_thoai'     =>  '0388824999',
                'dia_chi'           =>  'Đà Nẵng',
                'tinh_trang'        =>  1,
                'id_quyen'          =>  1,
            ],
        ]);
    }
}
