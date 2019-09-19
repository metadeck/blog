<?php namespace Metadeck\Blog\Repositories;

use Illuminate\Support\Carbon;
use Metadeck\Blog\Models\BlogPost;

class BlogPostRepository extends BlogBaseRepository
{
    /**
     * Inject the model
     *
     * BlogPostRepository constructor.
     * @param BlogPost $post
     */
    function __construct(BlogPost $post)
    {
        $this->model = $post;
    }

    /**
     * Get the latest posts from the blog
     *
     * @param $count
     * @return mixed
     */
    public function latest($count)
    {
        return $this->model
            ->where('scheduled_for', '<', Carbon::now())
            ->orderBy('scheduled_for', 'DESC')
            ->take($count)
            ->get();
    }
}
