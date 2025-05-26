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
    Schema::create('binh_luans', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_khoa_hoc');
        $table->unsignedBigInteger('id_khach_hang');
        $table->text('noi_dung');
        $table->text('tra_loi')->nullable(); // admin trả lời
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binh_luans');
    }
};
