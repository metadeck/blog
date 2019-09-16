<?php

namespace Metadeck\Blog;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Metadeck\Blog\Skeleton\SkeletonClass
 */
class BlogFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'blog';
    }
}
