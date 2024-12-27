<?php

namespace App\Services\Auth\Admin\Logins\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface LoginServiceInterface extends BaseServiceInterface
{
    public function checkEmailGuard($email);
}