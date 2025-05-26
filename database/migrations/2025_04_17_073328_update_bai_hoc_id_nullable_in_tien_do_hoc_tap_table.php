<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tien_do_hoc_tap', function (Blueprint $table) {
            $table->foreignId('bai_hoc_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('tien_do_hoc_tap', function (Blueprint $table) {
            $table->foreignId('bai_hoc_id')->nullable(false)->change();
        });
    }
};
