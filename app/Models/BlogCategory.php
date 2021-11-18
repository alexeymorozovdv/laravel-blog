<?php

namespace App\Models;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * App\Models\BlogCategory
 *
 * @property int $id
 * @property int $parent_id
 * @property string $slug
 * @property string $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read BlogCategory $parentCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlogPost[] $posts
 * @property-read int|null $posts_count
 * @method static \Database\Factories\BlogCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BlogCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'slug', 'parent_id', 'description'];

    /**
     * Get all categories with pagination
     *
     * @param Builder $query
     * @param int $perPage
     * @param string[] $columns
     * @return LengthAwarePaginator
     */
    public function scopeGetAllWithPaginate(Builder $query, int $perPage = 10, array $columns = ['id', 'title', 'parent_id']): LengthAwarePaginator
    {
        $result = $query
            ->with('parentCategory')
            ->paginate($perPage, $columns);

        return $result;
    }

    /**
     * Get categories list for select
     *
     * @param Builder $query
     * @return Collection
     */
    public function scopeGetForSelect(Builder $query): Collection
    {
        $result = $query->select('id', 'title')
            ->toBase()
            ->get();

        return $result;
    }

    // Each category has many posts
    public function posts(): HasMany
    {
        return $this->hasMany(BlogPost::class);
    }

    // Category has a parent category
    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }
}
