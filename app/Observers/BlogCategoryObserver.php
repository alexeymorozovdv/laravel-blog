<?php

namespace App\Observers;

use App\Models\BlogCategory;
use Illuminate\Support\Str;

class BlogCategoryObserver
{
    /**
     * Listen to the BlogCategory saving event.
     */
    public function saving(BlogCategory $blogCategory): void
    {
        // If there isn't a slug, then create one from the title
        if(empty($blogCategory->slug)) $blogCategory->slug = Str::slug($blogCategory->title, '-');
    }
}
