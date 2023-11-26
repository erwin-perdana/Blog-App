<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyPostComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_comment_id',
        'user_id',
        'reply',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
