<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('danh_gias', function (Blueprint $table) {
            $table->string('avatar')->nullable()->default(null)->change();
        });
    }

    public function down()
    {
        Schema::table('danh_gias', function (Blueprint $table) {
            $table->string('avatar')->default('https://w7.pngwing.com/pngs/842/134/png-transparent-avatar-face-man-boy-male-profile-smiley-avatar-icon.png')->change();
        });
    }
};

