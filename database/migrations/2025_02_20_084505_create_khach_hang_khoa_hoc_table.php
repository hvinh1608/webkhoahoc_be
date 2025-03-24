<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('khach_hang_khoa_hoc', function (Blueprint $table) {
            $table->id();
            $table->integer('khach_hang_id');
            $table->integer('khoa_hoc_id');
            $table->boolean('trang_thai')->default(1); // 1: Đang học, 0: Đã hoàn thành hoặc bị khóa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_hang_khoa_hoc');
    }
};