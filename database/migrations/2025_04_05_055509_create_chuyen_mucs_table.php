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
        Schema::create('chuyen_mucs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_chuyen_muc');
            $table->string('slug_chuyen_muc')->unique(); // Đảm bảo slug là duy nhất
            $table->boolean('tinh_trang')->default(1); // 1: active, 0: inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chuyen_mucs');
    }
};
