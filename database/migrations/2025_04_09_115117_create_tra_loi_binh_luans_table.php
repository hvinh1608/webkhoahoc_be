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
    Schema::create('tra_loi_binh_luans', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('binh_luan_id');
        $table->unsignedBigInteger('admin_id'); // admin trả lời
        $table->text('noi_dung');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tra_loi_binh_luans');
    }
};
