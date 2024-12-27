<?php

namespace App\Services\Client\Views\Services;

use App\Repositories\Client\Systems\Interfaces\SystemInterface;
use App\Repositories\Client\Views\Interfaces\ViewInterface;
use App\Services\Client\Views\Interfaces\ViewServiceInterface;

class ViewDataService implements ViewServiceInterface
{

    protected $repository;
    protected $systemRepository;
    public function __construct(
        ViewInterface $repository,
        SystemInterface $systemRepository,
    ){
        $this->repository = $repository;
        $this->systemRepository = $systemRepository;
    }
    public function getNotifications() {

        return $this->repository->getNotifications();
    }

    public function getSytemBySlug($slug)
    {
        return $this->systemRepository->getSytemBySlug($slug);
    }
}
