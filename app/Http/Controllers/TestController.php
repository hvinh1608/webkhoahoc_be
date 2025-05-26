<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function testMail()
    {
        $data['name'] =   'hongvinh';
        Mail::to('hvinh.job@gmail.com')->send(new \App\Mail\MasterMail('Tiêu đề abc', 'demo', $data));
    }
    public function kichHoatMail()
    {
        $data['ho_va_ten'] =   'hongvinh';
        $data['link'] =   'http://localhost:5173/kich-hoat';

        Mail::to('hvinh.job@gmail.com@gmail.com')->send(new \App\Mail\MasterMail('Tiêu đề abc', 'kich_hoat', $data));
    }
}
