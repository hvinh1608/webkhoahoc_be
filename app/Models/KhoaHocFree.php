<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhoaHocFree extends Model
{
    protected $table = 'khoa_hoc_frees';
    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'students_count',
        'lesson_count',
        'duration',
        'is_free',
        'link_gioi_thieu'
    ];
}
