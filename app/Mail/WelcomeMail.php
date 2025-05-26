<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $couponCode;

    public function __construct($user, $couponCode)
    {
        $this->user = $user;
        $this->couponCode = $couponCode;
    }

    public function build()
    {
        return $this->subject('Chào mừng bạn đến với DZFullStack')
                    ->view('chao_mung')
                    ->with([
                        'user' => $this->user,
                        'couponCode' => $this->couponCode
                    ]);
    }
}
