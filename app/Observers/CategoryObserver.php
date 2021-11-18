<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Listen to the BlogCategory saving event.
     */
    public function saving(Category $blogCategory): void
    {
        // If there isn't a slug, then create one from the title
        if(empty($blogCategory->slug)) $blogCategory->slug = Str::slug($blogCategory->title, '-');
    }
}
