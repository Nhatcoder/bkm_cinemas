<?php

namespace App\Services\Auth\Client\ForgotPasswords;

use App\Repositories\Auth\Client\ForgotPasswords\Interfaces\ForgotPasswordInterface;
use App\Services\Auth\Client\ForgotPasswords\Interfaces\ForgotPasswordServicesInterface;
use App\Services\Base\BaseService;

class ForgotPasswordService extends BaseService implements ForgotPasswordServicesInterface
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getRepository()
    {
        return ForgotPasswordInterface::class;
    }

    public function getUserByEmail($email)
    {
        return $this->repository->getUserByEmail($email);
    }

    public function updateOrInsert(array $data, array $where)
    {
        return $this->repository->updateOrInsert($data, $where);
    }

    public function getResetToken($token, $email)
    {
        return $this->repository->getResetToken($token, $email);
    }

    public function deleteByToken($token)
    {
        return $this->repository->deleteByToken($token);
    }
}
