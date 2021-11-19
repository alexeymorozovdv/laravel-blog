<?php

namespace App\Observers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Listen to the Category saving event.
     */
    public function saving(Post $post): void
    {
        // If there isn't a slug, then create one from the title
        if(empty($post->slug)) $post->slug = Str::slug($post->title, '-');

        // If post wasn't published and 'published' checkbox is checked, fill the 'published_at' field
        if(empty($post->published_at) && $post->is_published) {
            $post->published_at = Carbon::now();
        }

        // Convert markdown to html
        // Illuminate\Mail\Markdown::parse()
        $post->content_html = $post->content_raw;
    }

    /**
     * Listen to the Post creating event.
     */
    public function creating(Post $post)
    {
        // set an author for the new post
        // $post->user_id = auth()->id();
        $post->user_id = 1;
    }
}
