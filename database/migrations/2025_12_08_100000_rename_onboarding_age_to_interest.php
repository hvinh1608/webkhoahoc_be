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
        Schema::table('khach_hangs', function (Blueprint $table) {
            $table->renameColumn('onboarding_age', 'onboarding_interest');
        });
    }

    public function down()
    {
        Schema::table('khach_hangs', function (Blueprint $table) {
            $table->renameColumn('onboarding_interest', 'onboarding_age');
        });
    }
};
