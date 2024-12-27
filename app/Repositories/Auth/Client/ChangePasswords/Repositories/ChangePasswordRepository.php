<?php

namespace App\Repositories\Auth\Client\ChangePasswords\Repositories;

use App\Models\User;
use App\Repositories\Auth\Client\ChangePasswords\Interfaces\ChangePasswordInterface;
use App\Repositories\Base\BaseRepository;

class ChangePasswordRepository extends BaseRepository implements ChangePasswordInterface
{
    public function getModel()
    {
        return User::class;
    }
}
