<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('danh_gias', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten');
            $table->string('khoa_hoc');
            $table->string('vai_tro');
            $table->text('noi_dung');
            $table->string('avatar')->default('https://w7.pngwing.com/pngs/842/134/png-transparent-avatar-face-man-boy-male-profile-smiley-avatar-icon.png');
            $table->timestamps();
        });
    }

    public function down()  
    {
        Schema::dropIfExists('danh_gias');
    }
};

