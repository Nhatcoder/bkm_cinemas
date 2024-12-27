<?php

namespace App\Repositories\Auth\Client\ForgotPasswords\Repositories;

use App\Models\PasswordResetToken;
use App\Models\User;
use App\Repositories\Auth\Client\ForgotPasswords\Interfaces\ForgotPasswordInterface;
use App\Repositories\Base\BaseRepository;

class ForgotPasswordRepository extends BaseRepository implements ForgotPasswordInterface
{
    protected $passwordResetToken;

    public function __construct(
        PasswordResetToken $passwordResetToken
    ) {
        parent::__construct();
        $this->passwordResetToken = $passwordResetToken;
    }

    public function getModel()
    {
        return User::class;
    }

    public function getUserByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function updateOrInsert(array $data, array $where)
    {
        return $this->passwordResetToken->updateOrInsert($data, $where);
    }

    public function getResetToken($token, $email)
    {
        return $this->passwordResetToken->where('token', $token)
            ->where('email', $email)
            ->first();
    }

    public function deleteByToken($token)
    {
        return $this->passwordResetToken->where('token', $token)->delete();
    }
}
