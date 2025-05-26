<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use App\Console\Commands\AutoGiaoDichMb;

class Kernel extends ConsoleKernel
{
    // Đăng ký thủ công command
    protected $commands = [
        AutoGiaoDichMb::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            Log::info('Schedule is running at ' . now());
            app(\App\Services\LeaderboardService::class)->checkForRankChange();
        })->everyMinute();

        $schedule->command('auto:giao-dich-mb')->everyMinute();
    }

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');
    }
}
