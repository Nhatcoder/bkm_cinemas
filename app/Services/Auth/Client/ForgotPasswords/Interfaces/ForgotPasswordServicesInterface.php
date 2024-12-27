<?php

namespace App\Services\Auth\Client\ForgotPasswords\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface ForgotPasswordServicesInterface extends BaseServiceInterface
{
    public function getUserByEmail($email);

    public function updateOrInsert(array $data, array $where);

    public function getResetToken($token, $email);

    public function deleteByToken($token);
}