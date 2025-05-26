<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GioHangItem extends Model
{
    protected $table = 'gio_hang_items';
    protected $fillable = ['gio_hang_id', 'id_khoa_hoc', 'quantity', 'gia_ban', 'coupon_code'];

    public function gioHang()
    {
        return $this->belongsTo(GioHang::class, 'gio_hang_id');
    }

    public function khoaHoc()
    {
        return $this->belongsTo(LoaiKhoaHoc::class, 'id_khoa_hoc');
    }
}
