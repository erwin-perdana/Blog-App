<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'content',
        'user_id',
        'date',
    ];

    public function postComments() {
        return $this->hasMany(PostComment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getImageAttribute($value)
    {
        return url('storage/' . $value);
    }
}
