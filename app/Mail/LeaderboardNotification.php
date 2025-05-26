<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeaderboardNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $tenNguoiNhan;
    public $tenNguoiSapVuot;

    public function __construct($tenNguoiNhan, $tenNguoiSapVuot)
    {
        $this->tenNguoiNhan = $tenNguoiNhan;
        $this->tenNguoiSapVuot = $tenNguoiSapVuot;
    }

    public function build()
    {
        return $this->subject('Cảnh báo: Có người sắp vượt bạn trên bảng xếp hạng!')
            ->view('leaderboard_notification')
            ->with([
                'tenNguoiNhan' => $this->tenNguoiNhan,
                'tenNguoiSapVuot' => $this->tenNguoiSapVuot,
            ]);
    }
}
