<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChuyenMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chuyen_mucs')->delete();

        DB::table('chuyen_mucs')->truncate();

        DB::table('chuyen_mucs')->insert([
            ['id' => 1, 'ten_chuyen_muc' => 'Mục 1', 'slug_chuyen_muc' => 'muc-1', 'tinh_trang' => 1],
            ['id' => 2, 'ten_chuyen_muc' => 'Mục 2', 'slug_chuyen_muc' => 'muc-2', 'tinh_trang' => 1],
            ['id' => 3, 'ten_chuyen_muc' => 'Mục 3', 'slug_chuyen_muc' => 'muc-3', 'tinh_trang' => 1],

        ]);
    }
}

