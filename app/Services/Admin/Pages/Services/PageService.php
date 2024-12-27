<?php

namespace App\Services\Admin\Pages\Services;

use App\Repositories\Admin\Pages\Interfaces\PageInterface;
use App\Services\Admin\Pages\Interfaces\PageServiceInterface;
use App\Services\Base\BaseService;

class PageService extends BaseService implements PageServiceInterface
{

    public function getRepository()
    {
        return PageInterface::class;
    }
    
    public function filter($request)
    {
        return $this->repository->filter($request);
    }

    public function countPage()
    {
        return $this->repository->countPage();
    }

    public function getAllActive()
    {
        return $this->repository->getAllActive();
    }
}
