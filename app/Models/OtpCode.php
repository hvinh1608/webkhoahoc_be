<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtpCode extends Model
{
    protected $table = 'otp_codes';
    protected $fillable = [
        'id_khach_hang',
        'otp',
        'expires_at',
    ];
}
