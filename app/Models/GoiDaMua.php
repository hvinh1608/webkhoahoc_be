<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoiDaMua extends Model
{
    protected $table = 'goi_da_mua';
    protected $fillable = [
        'user_id',
        'loai_goi',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'so_tien'
    ];
}
