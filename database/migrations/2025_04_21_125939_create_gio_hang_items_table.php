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
        Schema::create('gio_hang_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gio_hang_id');
            $table->unsignedBigInteger('id_khoa_hoc');
            $table->integer('quantity')->default(1);
            $table->decimal('gia_ban', 15, 2);
            $table->string('coupon_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gio_hang_items');
    }
};
