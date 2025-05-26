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
        Schema::table('chi_tiet_khoa_hocs', function (Blueprint $table) {
            $table->boolean('da_thu_hoi')->default(false)->after('da_hoan_tien');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chi_tiet_khoa_hocs', function (Blueprint $table) {
            //
        });
    }
};
