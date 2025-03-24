<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('danh_gias', function (Blueprint $table) {
        $table->tinyInteger('rating')->default(0)->after('noi_dung');
    });
}

public function down()
{
    Schema::table('danh_gias', function (Blueprint $table) {
        $table->dropColumn('rating');
    });
}

};
