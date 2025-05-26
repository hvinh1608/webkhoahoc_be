<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tien_do_hoc_tap', function (Blueprint $table) {
            // Thêm cột bai_hoc_id_free, cho phép null, đặt sau bai_hoc_id
            $table->foreignId('bai_hoc_id_free')
                ->nullable()
                ->after('bai_hoc_id');
        });
    }

    public function down(): void
    {
        Schema::table('tien_do_hoc_tap', function (Blueprint $table) {
            // Gỡ bỏ foreign key và cột nếu rollback
            $table->dropForeign(['bai_hoc_id_free']);
            $table->dropColumn('bai_hoc_id_free');
        });
    }
};
