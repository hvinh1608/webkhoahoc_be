<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tien_do_hoc_tap', function (Blueprint $table) {
            $table->float('last_time')->default(0)->after('da_hoan_thanh');
            $table->boolean('is_favorite')->default(false)->after('last_time');
        });
    }

    public function down(): void
    {
        Schema::table('tien_do_hoc_tap', function (Blueprint $table) {
            $table->dropColumn(['last_time', 'is_favorite']);
        });
    }
};
