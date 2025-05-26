<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeTraLoiBinhLuan extends Model
{
    protected $table = 'like_tra_loi_binh_luans';
    protected $fillable = ['khach_hang_id', 'tra_loi_binh_luan_id'];
}
