<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiemDanh extends Model
{
    use HasFactory;

    protected $table = 'diem_danhs';

    protected $fillable = [
        'khach_hang_id',
        'ngay',
    ];

    public function khachHang()
    {
        return $this->belongsTo(User::class, 'khach_hang_id');
    }
}
