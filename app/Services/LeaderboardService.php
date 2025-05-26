<?php

namespace App\Services;

use App\Models\KhachHang;
use Illuminate\Support\Facades\Mail;
use App\Mail\LeaderboardNotification;

class LeaderboardService
{
    public function checkForRankChange()
    {
        // Lấy tất cả học viên và tính số bài hoàn thành
        $students = KhachHang::withCount([
            'tienDo as bai_hoan_thanh' => function ($q) {
                $q->where('da_hoan_thanh', true);
            }
        ])
            ->get()
            ->map(function ($kh) {
                // Tính streak cho từng học viên
                $ngays = \App\Models\DiemDanh::where('khach_hang_id', $kh->id)
                    ->orderBy('ngay', 'desc')
                    ->pluck('ngay')
                    ->map(fn($d) => \Carbon\Carbon::parse($d))
                    ->sortDesc()
                    ->values();

                $streak = 0;
                $today = \Carbon\Carbon::today();

                foreach ($ngays as $ngay) {
                    if ($ngay->equalTo($today)) {
                        $streak++;
                        $today->subDay();
                    } else {
                        break;
                    }
                }
                $kh->streak = $streak;
                return $kh;
            })
            // Sắp xếp ưu tiên streak, nếu bằng thì ưu tiên bài hoàn thành
            ->sortByDesc(function ($kh) {
                return [$kh->streak, $kh->bai_hoan_thanh];
            })
            ->values();

        if ($students->count() < 2) return;

        $top1 = $students[0];
        $top2 = $students[1];

        if (
            ($top2->streak === $top1->streak - 1) ||
            ($top2->bai_hoan_thanh === $top1->bai_hoan_thanh - 1)
        ) {
            // Gửi mail cho top1, báo top2 sắp vượt
            Mail::to($top1->email)->send(
                new LeaderboardNotification($top1->ho_va_ten, $top2->ho_va_ten)
            );
        }
    }
}
