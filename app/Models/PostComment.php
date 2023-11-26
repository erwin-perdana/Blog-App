<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'comment',
    ];

    public function replyPostComment() {
        return $this->hasMany(ReplyPostComment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
