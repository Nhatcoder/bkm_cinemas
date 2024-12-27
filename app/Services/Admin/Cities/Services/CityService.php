<?php
namespace App\Services\Admin\Cities\Services;
use App\Repositories\Admin\Cities\Interfaces\CityInterface;
use App\Services\Admin\Cities\Interfaces\CityServiceInterface;
use App\Services\Base\BaseService;

class CityService extends BaseService implements CityServiceInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    public function filter($request)
    {
        return $this->repository->filter($request);
    }

    public function getRepository()
    {
        return CityInterface::class;
    }
}
