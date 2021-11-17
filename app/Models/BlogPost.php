<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use HasFactory, SoftDeletes;

    // Each post belongs to an author
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Each post belongs to a category
    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    // Each post has many comments
    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }

}
