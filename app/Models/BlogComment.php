<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    // Each comment belongs to a post
    public function post()
    {
        return $this->belongsTo(BlogPost::class);
    }

    // Each comment belongs to an author
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
