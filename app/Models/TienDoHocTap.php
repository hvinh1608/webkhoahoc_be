<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TienDoHocTap extends Model
{
    protected $table = 'tien_do_hoc_tap';
    protected $fillable = ['khach_hang_id', 'bai_hoc_id', 'bai_hoc_id_free', 'da_hoan_thanh'];

    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class);
    }

    public function baiHoc()
    {
        return $this->belongsTo(\App\Models\BaiHoc::class, 'bai_hoc_id', 'id');
    }

    public function baiHocFree()
    {
        return $this->belongsTo(BaiHocFree::class, 'bai_hoc_id_free', 'id');
    }
}
