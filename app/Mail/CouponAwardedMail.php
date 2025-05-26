<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CouponAwardedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $coupon;

    public function __construct($coupon)
    {
        $this->coupon = $coupon;
    }

    public function build()
    {
        return $this->subject('Bạn nhận được mã giảm giá từ DZFullStack!')
            ->view('coupon_awarded');
    }
}
