<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikeBinhLuansTable extends Migration
{
    public function up()
    {
        Schema::create('like_binh_luans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('khach_hang_id');  // Sử dụng khach_hang_id thay vì user_id
            $table->unsignedBigInteger('binh_luan_id');
            $table->timestamps();
            
            // Đảm bảo không có khách hàng nào thích cùng một bình luận hơn một lần
            $table->unique(['khach_hang_id', 'binh_luan_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('like_binh_luans');
    }
}

