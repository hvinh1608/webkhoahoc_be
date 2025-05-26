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
            $table->string('onboarding_job')->nullable();
            $table->string('onboarding_purpose')->nullable();
        });
    }

    public function down()
    {
        Schema::table('khach_hangs', function (Blueprint $table) {
            $table->dropColumn(['onboarding_job', 'onboarding_purpose']);
        });
    }
};
