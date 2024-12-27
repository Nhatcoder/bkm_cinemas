<?php

namespace App\Services\Client\Home\Services;

use App\Repositories\Client\Home\Interface\HomeRepositoryInterface;
use App\Services\Client\CategoryPosts\Interface\CategoryPostServiceInterface;
use App\Services\Client\Home\Interfaces\HomeServiceInterface;


class HomeService  implements HomeServiceInterface
{
    protected $homeRepository;
    protected $categoryPostRepository;

    public function __construct(
        CategoryPostServiceInterface $categoryPostRepository,
        HomeRepositoryInterface $homeRepository
    ){
        $this->homeRepository = $homeRepository;
        $this->categoryPostRepository = $categoryPostRepository;
    }

    public function sliders()
    {
        return $this->homeRepository->sliders();
    }

    public function movieIsShowing()
    {
        return $this->homeRepository->movieIsShowing();
    }

    public function upcomingMovie()
    {
        return $this->homeRepository->upcomingMovie();
    }
    public function getCategoryPostBySlug($slug)
    {
        return $this->categoryPostRepository->getCategoryPostBySlug($slug);
    }
    public function emailSubscribe($request){
        return $this->homeRepository->emailSubscribe($request);
    }

    public function deleteNotification($id){
        return $this->homeRepository->deleteNotification($id);
    }

}
