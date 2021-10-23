<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    use HasFactory, Commentable;

    protected $fillable = [
        'thumbnail', 'title', 'slug', 'content', 'category_id'
    ];

    protected $with = [
        'category', 'tags', 'user'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getTakeImageAttribute()
    {
        return "/storage/$this->thumbnail";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
