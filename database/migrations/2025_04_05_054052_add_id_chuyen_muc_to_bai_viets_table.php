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
        Schema::table('bai_viets', function (Blueprint $table) {
            // Thêm cột id_chuyen_muc
            $table->unsignedBigInteger('id_chuyen_muc');  // Cột id_chuyen_muc
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bai_viets', function (Blueprint $table) {
            //
        });
    }
};
