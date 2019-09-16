<?php

namespace Metadeck\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Tags\HasTags;

class BlogPost extends Model implements HasMedia
{
    use HasTags, HasMediaTrait, SoftDeletes;

    /**
     * Fillable properties.
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'summary',
        'body',
        'seo_title',
        'seo_description',
        'scheduled_for',
        'featured',
        'content_type'
    ];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'featured' => 'boolean',
        'scheduled_for' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * The attributes that should be mutated to dates.
     * @var array
     */
    protected $dates = [
        'scheduled_for',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Appended fields.
     * @var array
     */
    protected $appends = ['published'];

    /**
     * Published mutator.
     * @return bool
     */
    public function getPublishedAttribute(): bool
    {
        return now() > $this->scheduled_for;
    }

    /**
     * The category this post belongs to
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * Author of the post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(config('blog.user_model'), 'user_id');
    }

    /**
     * Register a media collection for the user profile image
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('featured_image')->singleFile();
    }

    /**
     * Register the conversions to perform on the media items
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(130)->height(130);
        $this->addMediaConversion('index')->width(300)->height(300);
    }

}
