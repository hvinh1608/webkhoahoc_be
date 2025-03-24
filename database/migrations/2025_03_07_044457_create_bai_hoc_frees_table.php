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
        Schema::create('bai_hoc_frees', function (Blueprint $table) {
            $table->id();
            $table->integer('id_khoa_hoc_free')->default(1); 
            $table->string('tieu_de');
            $table->integer('bai_hoc_so');
            $table->string('link_bai_hoc');
            $table->integer('tinh_trang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bai_hoc_frees');
    }
};
