<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GhiChu extends Model
{
    use HasFactory;

    protected $table = 'ghi_chu';

    protected $fillable = [
        'id_khoa_hoc',
        'id_khoa_hoc_free',
        'id_nguoi_dung',
        'noi_dung',
    ];
}
