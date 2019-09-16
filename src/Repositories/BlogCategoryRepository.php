<?php namespace Metadeck\Blog\Repositories;

use Metadeck\Blog\Models\BlogCategory;

class BlogCategoryRepository extends BlogBaseRepository
{
    function __construct(BlogCategory $category)
    {
        $this->model = $category;
    }
}
