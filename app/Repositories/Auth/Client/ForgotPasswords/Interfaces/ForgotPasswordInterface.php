<?php

namespace App\Repositories\Auth\Client\ForgotPasswords\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface ForgotPasswordInterface extends RepositoryInterface
{
    public function getUserByEmail($email);

    public function updateOrInsert(array $data, array $where);

    public function getResetToken($token, $email);

    public function deleteByToken($token);
}
