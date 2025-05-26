<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietKhoaHocFree extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_khoa_hoc_free';

    protected $fillable = ['id_khoa_hoc', 'id_khach_hang'];
}
