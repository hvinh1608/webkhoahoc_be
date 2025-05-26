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
    Schema::create('ket_qua_trac_nghiem', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('khach_hang_id');
        $table->unsignedBigInteger('khoa_hoc_id');
        $table->integer('so_cau_dung')->nullable();
        $table->string('loai')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ket_qua_trac_nghiem');
    }
};
