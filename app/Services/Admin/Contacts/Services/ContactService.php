<?php
namespace App\Services\Admin\Contacts\Services;
use App\Repositories\Admin\Contacts\Interfaces\ContactInterface;
use App\Services\Admin\Contacts\Interfaces\ContactServiceInterface;
use App\Services\Base\BaseService;

class ContactService extends BaseService implements ContactServiceInterface
{
    public function getRepository()
    {
        return ContactInterface::class;
    }

    public function filter($request)
    {
        return $this->repository->filter($request);
    }
}
