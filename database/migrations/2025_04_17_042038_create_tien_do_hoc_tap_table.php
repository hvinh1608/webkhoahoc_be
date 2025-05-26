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
        Schema::create('tien_do_hoc_tap', function (Blueprint $table) {
            $table->id();
            $table->foreignId('khach_hang_id');
            $table->foreignId('bai_hoc_id');
            $table->boolean('da_hoan_thanh')->default(false); // hoặc dùng datetime nếu muốn
            $table->timestamps();

            $table->unique(['khach_hang_id', 'bai_hoc_id']); // tránh trùng bản ghi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tien_do_hoc_tap');
    }
};
