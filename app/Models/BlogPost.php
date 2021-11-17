<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\BlogPost
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $title
 * @property string $slug
 * @property string|null $excerpt
 * @property string $content_raw
 * @property string $content_html
 * @property int $is_published
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $author
 * @property-read \App\Models\BlogCategory $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlogComment[] $comments
 * @property-read int|null $comments_count
 * @method static \Database\Factories\BlogPostFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost newQuery()
 * @method static \Illuminate\Database\Query\Builder|BlogPost onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereContentHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereContentRaw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|BlogPost withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BlogPost withoutTrashed()
 * @mixin \Eloquent
 */
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
