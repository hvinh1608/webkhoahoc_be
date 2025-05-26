<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhachHangKhoaHoanThanhTable extends Migration
{
    public function up()
    {
        Schema::create('khach_hang_khoa_hoan_thanh', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('khach_hang_id');
            $table->unsignedBigInteger('khoa_hoc_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('khach_hang_khoa_hoan_thanh');
    }
}
