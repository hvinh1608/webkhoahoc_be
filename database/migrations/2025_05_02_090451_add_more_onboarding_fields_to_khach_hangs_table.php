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
            $table->string('onboarding_workplace')->nullable();
            $table->string('onboarding_experience')->nullable();
            $table->string('onboarding_age')->nullable();
        });
    }

    public function down()
    {
        Schema::table('khach_hangs', function (Blueprint $table) {
            $table->dropColumn([
                'onboarding_workplace',
                'onboarding_experience',
                'onboarding_age'
            ]);
        });
    }
};
