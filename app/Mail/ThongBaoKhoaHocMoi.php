<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ThongBaoKhoaHocMoi extends Mailable
{
    use Queueable, SerializesModels;

    public $tieuDe;
    public $noiDung;

    public function __construct($tieuDe, $noiDung)
    {
        $this->tieuDe = $tieuDe;
        $this->noiDung = $noiDung;
    }

    public function build()
{
    return $this->subject($this->tieuDe)
                ->view('thong-bao-khoa-hoc-moi')
                ->with([
                    'noiDung' => $this->noiDung,
                    'link'    => $this->extractLinkFromContent($this->noiDung),
                ]);
}

private function extractLinkFromContent($content)
{
    preg_match('/https?:\/\/\S+/', $content, $matches);
    return $matches[0] ?? '#';
}

}

