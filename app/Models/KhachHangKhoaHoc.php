<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachHangKhoaHoc extends Model
{
    protected $table = 'khach_hang_khoa_hoc';
    protected $fillable = [
        'khach_hang_id',
        'khoa_hoc_id',
        'trang_thai',
    ];
}