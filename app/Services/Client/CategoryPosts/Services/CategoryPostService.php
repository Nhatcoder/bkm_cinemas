<?php

namespace App\Services\Client\CategoryPosts\Services;


use App\Repositories\Client\CategoryPosts\Interface\CategoryPostInterface;
use App\Services\Client\CategoryPosts\Interface\CategoryPostServiceInterface;

class CategoryPostService implements CategoryPostServiceInterface
{
    protected $categoryPostRepository;

    public function __construct(
        CategoryPostInterface $categoryPostRepository
    ) {
        $this->categoryPostRepository = $categoryPostRepository;
    }

    public function getCategoryPostBySlug($slug){
        return $this->categoryPostRepository->getCategoryPostBySlug($slug);
    }
}
