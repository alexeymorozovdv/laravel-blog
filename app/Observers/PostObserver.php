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
        $this->setPublishDate($post);
        $this->setHTML($post);
    }

    /**
     * Listen to the Post creating event.
     */
    public function creating(Post $post)
    {
        $this->setAuthor($post);
    }

    /**
     * If post wasn't published and 'published' checkbox is checked, fill the 'published_at' field
     *
     * @param Post $post
     */
    private function setPublishDate(Post $post)
    {
        if (empty($post->published_at) && $post->is_published) {
            $post->published_at = Carbon::now();
        }
    }

    /**
     * Convert markdown to html
     *
     * @param Post $post
     */
    private function setHTML(Post $post)
    {
        // Illuminate\Mail\Markdown::parse()
        $post->content_html = $post->content_raw;
    }

    /**
     * set the author for a new post
     *
     * @param Post $post
     */
    private function setAuthor(Post $post)
    {
        // $post->user_id = auth()->id();
        $post->user_id = 1;
    }
}
