<?php

namespace App\Repositories\Client\Users\Repositories;

use App\Models\User;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Client\Users\Interfaces\UserInterface;

class UserRepository extends BaseRepository implements UserInterface
{
    public function getModel()
    {
        return User::class;
    }
}
