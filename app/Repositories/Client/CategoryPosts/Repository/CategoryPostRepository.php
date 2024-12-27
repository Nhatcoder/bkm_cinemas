<?php

namespace App\Repositories\Client\CategoryPosts\Repository;

use App\Models\Post;
use App\Models\CategoryPost;
use App\Models\PostCategory;
use App\Repositories\Client\CategoryPosts\Interface\CategoryPostInterface;


class CategoryPostRepository implements CategoryPostInterface
{
    const PAGINATION = 9;
    private $categoryPost;
    private $post;
    private $postCategory;

    public function __construct(CategoryPost $categoryPost, Post $post, PostCategory $postCategory)
    {
        $this->categoryPost = $categoryPost;
        $this->post = $post;
        $this->postCategory = $postCategory;
    }

    public function getCategoryPostBySlug($slug)
    {
        $categoryPostsBySlug = $this->categoryPost->with(['posts' => function ($query) {
            $query->where('active', 1)->orderBy('id', 'DESC');
        }])
            ->where('slug', $slug)
            ->select('id', 'name', 'slug')
            ->first();
        return $categoryPostsBySlug;
    }
}
