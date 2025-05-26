<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeBinhLuan extends Model
{
    use HasFactory;

    protected $table = 'like_binh_luans';  // Tên bảng

    protected $fillable = ['khach_hang_id', 'binh_luan_id'];  // Các cột có thể mass-assigned

    // Quan hệ với bảng 'khach_hangs'
    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'khach_hang_id');  // Sử dụng khach_hang_id
    }

    // Quan hệ với bảng 'binh_luans'
    public function binhLuan()
    {
        return $this->belongsTo(BinhLuan::class);
    }
}

