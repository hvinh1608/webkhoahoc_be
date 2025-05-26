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
    Schema::table('ghi_chu', function (Blueprint $table) {
        $table->unsignedBigInteger('id_khoa_hoc_free')->nullable()->after('id_khoa_hoc');
    });
}

public function down()
{
    Schema::table('ghi_chu', function (Blueprint $table) {
        $table->dropColumn('id_khoa_hoc_free');
    });
}

};
