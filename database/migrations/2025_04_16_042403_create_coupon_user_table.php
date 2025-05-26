<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('coupon_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Lưu id của người dùng
            $table->unsignedBigInteger('coupon_id'); // Lưu id của mã giảm giá
            $table->timestamp('used_at')->nullable(); // Thời gian sử dụng mã
            $table->enum('status', ['used', 'unused'])->default('unused'); // Trạng thái mã giảm giá
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coupon_user');
    }
};
