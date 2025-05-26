<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ThongBaoNapTien extends Mailable
{
    use Queueable, SerializesModels;

    public $so_tien;
    public $ten_khach_hang;

    public function __construct($so_tien, $ten_khach_hang)
    {
        $this->so_tien = $so_tien;
        $this->ten_khach_hang = $ten_khach_hang;
    }

    public function build()
    {
        return $this->subject('Nạp tiền thành công')
            ->view('thongbao_naptien');
    }
}
