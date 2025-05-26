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
        Schema::table('coupons', function (Blueprint $table) {
            $table->datetime('expiry_date')->change();
        });
    }

    public function down()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->date('expiry_date')->change();
        });
    }
};
