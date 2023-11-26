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
        'category_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function postComments() {
        return $this->hasMany(PostComment::class);
    }
}
