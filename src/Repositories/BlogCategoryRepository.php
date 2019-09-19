<?php namespace Metadeck\Blog\Repositories;

use Metadeck\Blog\Models\BlogCategory;

class BlogCategoryRepository extends BlogBaseRepository
{
    /**
     * Inject the model
     *
     * BlogCategoryRepository constructor.
     * @param BlogCategory $category
     */
    function __construct(BlogCategory $category)
    {
        $this->model = $category;
    }
}
