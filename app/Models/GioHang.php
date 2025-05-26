<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    protected $table = 'gio_hangs';
    protected $fillable = ['id_khach_hang'];

    public function items()
    {
        return $this->hasMany(GioHangItem::class, 'gio_hang_id');
    }
}
