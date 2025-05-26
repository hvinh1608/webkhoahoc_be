<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TaiChinhController;
use Illuminate\Support\Facades\Log;

class AutoGiaoDichMb extends Command
{
    protected $signature = 'auto:giao-dich-mb';
    protected $description = 'Tự động kiểm tra và cộng tiền khi có giao dịch MB Bank';

    public function handle()
    {
        // Gọi hàm autoGiaoDich trong controller
        Log::info('auto:giao-dich-mb is running at ' . now());
        app(TaiChinhController::class)->autoGiaoDich();
        $this->info('Đã kiểm tra giao dịch MB Bank!');
    }
}
