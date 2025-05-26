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
            $table->unsignedBigInteger('id_khoa_hoc')->nullable()->change(); // Thay đổi trường này thành nullable
        });
    }

    public function down()
    {
        Schema::table('ghi_chu', function (Blueprint $table) {
            $table->unsignedBigInteger('id_khoa_hoc')->nullable(false)->change(); // Quay lại trạng thái không nullable
        });
    }
};
