<?php

namespace App\Repositories\Auth\Client\Registers\Repositories;

use App\Models\User;
use App\Repositories\Auth\Client\Registers\Interfaces\RegisterInterface;
use App\Repositories\Base\BaseRepository;

class RegisterRepository extends BaseRepository implements RegisterInterface
{
    public function getModel()
    {
        return User::class;
    }
}
