<?php

namespace App\Services\Auth\Admin\Logins\Services;

use App\Repositories\Auth\Admin\Logins\Interfaces\LoginInterface;
use App\Repositories\Auth\Admin\Logins\Repository\LoginRepository;
use App\Services\Auth\Admin\Logins\Interfaces\LoginServiceInterface;
use App\Services\Base\BaseService;

class LoginService extends BaseService implements LoginServiceInterface
{
    public function getRepository()
    {
        return LoginInterface::class;
    }

    public function checkEmailGuard($email)
    {
        return $this->repository->checkEmailGuard($email);
    }
}
