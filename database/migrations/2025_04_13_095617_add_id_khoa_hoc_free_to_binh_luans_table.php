<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdKhoaHocFreeToBinhLuansTable extends Migration
{
    public function up()
    {
        Schema::table('binh_luans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_khoa_hoc_free')->nullable()->after('id_khoa_hoc');  // Thêm cột id_khoa_hoc_free
        });
    }

    public function down()
    {
        Schema::table('binh_luans', function (Blueprint $table) {
            $table->dropColumn('id_khoa_hoc_free');  // Xóa cột id_khoa_hoc_free
        });
    }
}
