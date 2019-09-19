<?php namespace Metadeck\Blog\Repositories;

use Metadeck\Blog\Models\BlogPostSeries;

class BlogPostSeriesRepository extends BlogBaseRepository
{
    /**
     * Inject the model
     *
     * BlogPostSeriesRepository constructor.
     * @param BlogPostSeries $postSeries
     */
    function __construct(BlogPostSeries $postSeries)
    {
        $this->model = $postSeries;
    }
}
