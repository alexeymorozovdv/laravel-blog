<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BlogComment
 *
 * @property int $id
 * @property int $user_id
 * @property int $post_id
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $author
 * @property-read \App\Models\BlogPost $post
 * @method static \Database\Factories\BlogCommentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereUserId($value)
 * @mixin \Eloquent
 */
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
