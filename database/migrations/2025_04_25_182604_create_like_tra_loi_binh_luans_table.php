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
    Schema::create('like_tra_loi_binh_luans', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('khach_hang_id');
        $table->unsignedBigInteger('tra_loi_binh_luan_id');
        $table->timestamps();

        // $table->foreign('khach_hang_id')->references('id')->on('khach_hangs')->onDelete('cascade');
        // $table->foreign('tra_loi_binh_luan_id')->references('id')->on('tra_loi_binh_luans')->onDelete('cascade');
        // $table->unique(['khach_hang_id', 'tra_loi_binh_luan_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like_tra_loi_binh_luans');
    }
};
