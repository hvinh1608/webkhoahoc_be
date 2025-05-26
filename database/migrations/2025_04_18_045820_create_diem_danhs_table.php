<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('diem_danhs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('khach_hang_id');
            $table->date('ngay');
            $table->timestamps();

            $table->unique(['khach_hang_id', 'ngay']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diem_danhs');
    }
};
