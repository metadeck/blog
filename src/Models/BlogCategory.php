<?php

namespace Metadeck\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug'
    ];

    /**
     * The posts belonging to this series
     */
    public function posts(): HasMany
    {
        return $this->hasMany(BlogPost::class);
    }
}
