<?php

namespace App\Services\Auth\Client\ChangePasswords\Services;

use App\Repositories\Auth\Client\ChangePasswords\Interfaces\ChangePasswordInterface;
use App\Services\Auth\Client\ChangePasswords\Interfaces\ChangePasswordServiceInterface;
use App\Services\Base\BaseService;

class ChangePasswordService extends BaseService implements ChangePasswordServiceInterface
{
    public function getRepository()
    {
        return ChangePasswordInterface::class;
    }
}
