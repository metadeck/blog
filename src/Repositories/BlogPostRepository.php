<?php namespace Metadeck\Blog\Repositories;

use Illuminate\Support\Carbon;
use Metadeck\Blog\Models\BlogPost;

class BlogPostRepository extends BlogBaseRepository
{
    function __construct(BlogPost $post)
    {
        $this->model = $post;
    }

    public function findBySlug($slug)
    {
        return $this->model
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function latestPosts($count)
    {
        return $this->model
            ->where('scheduled_for', '<', Carbon::now())
            ->orderBy('scheduled_for', 'DESC')
            ->take($count)
            ->get();
    }
}
