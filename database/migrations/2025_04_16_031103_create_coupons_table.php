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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();  // Mã giảm giá
            $table->enum('type', ['percent', 'amount']);  // Loại giảm giá: theo phần trăm hoặc theo số tiền
            $table->decimal('value', 10, 2);  // Giá trị giảm giá
            $table->datetime('expiry_date');  // Ngày hết hạn
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coupons');
    }
};
