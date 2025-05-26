<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_add_ten_nguoi_dung_to_tra_loi_binh_luans_table.php

    public function up()
    {
        Schema::table('tra_loi_binh_luans', function (Blueprint $table) {
            $table->string('ten_nguoi_dung')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tra_loi_binh_luans', function (Blueprint $table) {
            $table->dropColumn('ten_nguoi_dung');
        });
    }
};
