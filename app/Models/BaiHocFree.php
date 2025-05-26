<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaiHocFree extends Model
{
    protected $table = 'bai_hoc_frees';
    protected $fillable = [
        'id_khoa_hoc_free',
        'tieu_de',
        'bai_hoc_so',
        'link_bai_hoc',
        'tinh_trang',
    ];
}
