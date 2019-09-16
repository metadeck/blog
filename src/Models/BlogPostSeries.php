<?php

namespace Metadeck\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BlogPostSeries extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'slug'
    ];

    /**
     * The posts belonging to this series
     */
    public function posts(): BelongsToMany
    {
        return $this
            ->belongsToMany(BlogPost::class, 'blog_post_series_post')
            ->withPivot('order')
            ->orderBy('blog_post_series_post.order', 'asc');
    }
}
