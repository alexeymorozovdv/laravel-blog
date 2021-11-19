<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Listen to the Category saving event.
     */
    public function saving(Post $category): void
    {
        // If there isn't a slug, then create one from the title
        if(empty($category->slug)) $category->slug = Str::slug($category->title, '-');
    }

    /**
     * Listen to the Post creating event.
     */
    public function creating(Post $post)
    {
        // set an author for the new post
        $post->user_id = auth()->id();
    }
}
