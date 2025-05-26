<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GuiChungChiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tenNguoiDung;
    public $tenKhoaHoc;
    public $ngayHoanThanh;
    public $pdf;

    public function __construct($tenNguoiDung, $tenKhoaHoc, $ngayHoanThanh, $pdf)
    {
        $this->tenNguoiDung = $tenNguoiDung;
        $this->tenKhoaHoc = $tenKhoaHoc;
        $this->ngayHoanThanh = $ngayHoanThanh;
        $this->pdf = $pdf;
    }

    public function build()
    {
        return $this->subject('Chứng chỉ hoàn thành khóa học')
            ->view('gui-chung-chi')
            ->attachData($this->pdf->output(), 'chung-chi-hoan-thanh.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
