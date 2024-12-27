<?php

namespace App\Services\Client\Users\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface UserServiceInterface extends BaseServiceInterface
{
    public function updateProfile(&$data, $id);
}
