<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\KhachHang;

class BinhLuan extends Model
{
    protected $table = 'binh_luans';
    protected $fillable = ['id_khoa_hoc', 'id_khoa_hoc_free' ,'id_khach_hang', 'noi_dung', 'tra_loi', 'likes_count'];

    public function khach_hang()
    {
        return $this->belongsTo(KhachHang::class, 'id_khach_hang');
    }

    public function ds_tra_loi()
    {
        return $this->hasMany(TraLoiBinhLuan::class, 'binh_luan_id');
    }

    public function likes()
    {
        return $this->hasMany(LikeBinhLuan::class, 'binh_luan_id');
    }
}
