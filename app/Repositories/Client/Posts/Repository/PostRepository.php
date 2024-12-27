<?php

namespace App\Repositories\Client\Posts\Repository;

use App\Models\Post;
use App\Models\CategoryPost;
use App\Models\PostCategory;
use App\Repositories\Client\Posts\Interface\PostInterface;

class PostRepository implements PostInterface
{

    const PAGINATION = 10;
    const LIMIT = 8;

    private $categoryPost;
    private $post;
    private $postCategory;

    public function __construct(CategoryPost $categoryPost, Post $post, PostCategory $postCategory)
    {
        $this->categoryPost = $categoryPost;
        $this->post = $post;
        $this->postCategory = $postCategory;
    }

    public function getPostFirst($slug)
    {
        $post = $this->post->where('slug', $slug)->select("name", "slug", "description", "content", "avatar", "created_at")->first();
        return $post;
    }

    public function getPostFirstByCateSlug($slugCate, $slug)
    {
        $post = $this->post
                ->where('slug', $slug)
                ->where('active', 1)
                ->whereHas('postCategories', function ($query) use ($slugCate) {
                    $query->whereNull('deleted_at') // Kiểm tra deleted_at trong bảng trung gian
                          ->whereHas('category', function ($subQuery) use ($slugCate) {
                              $subQuery->where('slug', $slugCate); // Kiểm tra slug của category
                          });
                })
                ->select('name', 'slug', 'description', 'content', 'avatar', 'created_at')
                ->first();

        return $post;
    }

    public function getPostRelated($slugCate, $slug)
    {
        return  $this->post
            ->where('slug', '!=', $slug)
            ->whereHas('categories', function ($query) use ($slugCate) {
                $query->where('slug', $slugCate);
            })
            ->select("name", "slug", "description", "content", "avatar", "created_at")
            ->limit(self::LIMIT)
            ->get();
    }

    public function getPostByCategory($slug)
    {
        return $this->post
            ->whereHas('categories', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->where('active', 1)
            ->select('name', 'slug', 'description', 'content', 'avatar', 'created_at')
            ->get();
    }
}
