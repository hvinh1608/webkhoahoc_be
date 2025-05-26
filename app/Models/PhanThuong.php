<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhanThuong extends Model
{
    protected $table = 'phan_thuongs';
    protected $fillable = ['khach_hang_id', 'ngay_lien_tuc', 'da_nhan'];
}

