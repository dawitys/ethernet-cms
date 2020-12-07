<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'posts_order'
    ];

    protected $with = [
        'posts'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'page_post');
    }
}
