<?php
// database/migrations/xxxx_xx_xx_add_da_hoan_tien_to_chi_tiet_khoa_hocs_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chi_tiet_khoa_hocs', function (Blueprint $table) {
            $table->boolean('da_hoan_tien')->default(false)->after('so_tien_mua');
        });
    }

    public function down(): void
    {
        Schema::table('chi_tiet_khoa_hocs', function (Blueprint $table) {
            $table->dropColumn('da_hoan_tien');
        });
    }
};
