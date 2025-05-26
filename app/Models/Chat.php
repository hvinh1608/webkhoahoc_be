<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';
    protected $fillable = ['user_id', 'messages'];
    protected $casts = [
        'messages' => 'array',
    ];
}
