<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    public $table = 'danh_gias';
    public $fillable = [
        'ho_ten',
        'khoa_hoc',
        'vai_tro',
        'noi_dung',
        'rating',
        'avatar',
    ];
}
