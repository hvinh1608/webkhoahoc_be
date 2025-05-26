<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyIdKhoaHocNullableInBinhLuans extends Migration
{
    public function up()
    {
        Schema::table('binh_luans', function (Blueprint $table) {
            // Sửa cột id_khoa_hoc để cho phép null
            $table->unsignedBigInteger('id_khoa_hoc')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('binh_luans', function (Blueprint $table) {
            // Trả lại cột id_khoa_hoc không cho phép null
            $table->unsignedBigInteger('id_khoa_hoc')->nullable(false)->change();
        });
    }
}
