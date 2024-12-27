<?php


namespace App\Services\Client\Posts\Services;

use App\Repositories\Client\Posts\Interface\PostInterface;
use App\Services\Client\Posts\Interface\PostServiceInterface;

class PostService implements PostServiceInterface
{
    protected $postRepository;
    protected $homeRepository;

    public function __construct(
        PostInterface $postRepository,
    ) {
        $this->postRepository = $postRepository;
    }

    public function getPostFirst($slug)
    {
        return $this->postRepository->getPostFirst($slug);
    }

    public function getPostFirstByCateSlug($slugCate, $slug)
    {
        return $this->postRepository->getPostFirstByCateSlug($slugCate, $slug);
    }

    public function getPostRelated($slugCate, $slug)
    {
        return $this->postRepository->getPostRelated($slugCate, $slug);
    }

    public function getPostByCategory($slug)
    {
        return $this->postRepository->getPostByCategory($slug);
    }

}
