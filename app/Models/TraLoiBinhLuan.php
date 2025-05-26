<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TraLoiBinhLuan extends Model
{
    protected $table = 'tra_loi_binh_luans';
    protected $fillable = ['binh_luan_id', 'admin_id', 'noi_dung', 'ten_nguoi_dung', 'tra_loi_cha_id', 'likes_count'];

    public function nhan_vien()
    {
        return $this->belongsTo(NhanVien::class, 'admin_id');
    }

    public function khach_hang()
    {
        return $this->belongsTo(\App\Models\KhachHang::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function tra_loi_con()
    {
        return $this->hasMany(TraLoiBinhLuan::class, 'tra_loi_cha_id')->with('tra_loi_con');
    }

    public function tra_loi_cha()
    {
        return $this->belongsTo(TraLoiBinhLuan::class, 'tra_loi_cha_id');
    }
}
