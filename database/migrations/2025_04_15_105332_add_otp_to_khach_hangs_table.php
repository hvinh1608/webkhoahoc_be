<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('khach_hangs', function (Blueprint $table) {
            $table->string('otp')->nullable();
            $table->timestamp('otp_expired_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('khach_hangs', function (Blueprint $table) {
            $table->dropColumn(['otp', 'otp_expired_at']);
        });
    }
};
