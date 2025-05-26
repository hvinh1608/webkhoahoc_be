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
        Schema::table('trac_nghiems', function (Blueprint $table) {
            $table->unsignedBigInteger('khoa_hoc_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trac_nghiems', function (Blueprint $table) {
            //
        });
    }
};
