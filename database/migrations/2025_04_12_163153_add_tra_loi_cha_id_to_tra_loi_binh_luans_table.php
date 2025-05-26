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
        Schema::table('tra_loi_binh_luans', function (Blueprint $table) {
            $table->unsignedBigInteger('tra_loi_cha_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tra_loi_binh_luans', function (Blueprint $table) {
            $table->dropColumn('tra_loi_cha_id');
        });
    }

};
