<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KetQuaTracNghiem extends Model
{
    protected $table = 'ket_qua_trac_nghiem';
    protected $fillable = [
        'khach_hang_id',
        'khoa_hoc_id',
        'so_cau_dung',
        'loai',
    ];
}
