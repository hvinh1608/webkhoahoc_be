<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chi_tiet_khoa_hoc_free', function (Blueprint $table) {
            $table->id();
            $table->integer('id_khoa_hoc');
            $table->integer('id_khach_hang');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_khoa_hoc_free');
    }
};
