<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_provider_to_khach_hangs_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProviderToKhachHangsTable extends Migration
{
    public function up()
    {
        Schema::table('khach_hangs', function (Blueprint $table) {
            $table->string('provider')->nullable()->after('is_first_login');
        });
    }

    public function down()
    {
        Schema::table('khach_hangs', function (Blueprint $table) {
            $table->dropColumn('provider');
        });
    }
}   
