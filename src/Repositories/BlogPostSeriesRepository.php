<?php namespace Metadeck\Blog\Repositories;

use Metadeck\Blog\Models\BlogPostSeries;

class BlogPostSeriesRepository extends BlogBaseRepository
{
    function __construct(BlogPostSeries $postSeries)
    {
        $this->model = $postSeries;
    }
}
