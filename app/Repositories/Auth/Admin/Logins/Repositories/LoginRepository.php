<?php

namespace App\Repositories\Auth\Admin\Logins\Repositories;

use App\Models\User;
use App\Repositories\Auth\Admin\Logins\Interfaces\LoginInterface;
use App\Repositories\Base\BaseRepository;

class LoginRepository extends BaseRepository implements LoginInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function checkEmailGuard($email)
    {
        return $this->model->select('id', 'email', 'password', 'type', 'status')
            ->where('email', strtolower($email))
            ->whereIn('type', [
                'admin',
                'manage',
                'staff'
            ])->first();
    }
}
