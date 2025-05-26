<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongTinDangKy extends Model
{
    use HasFactory;
    protected $table = 'thong_tin_dang_kys';
    protected $fillable = ['email'];
}

