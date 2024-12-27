<?php

namespace App\Repositories\Client\Deposits\Repositories;

use App\Models\User;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Client\Deposits\Interfaces\DepositInterface;

class DepositRepository extends BaseRepository implements DepositInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function updatePayment(&$data, $id)
    {
        return $this->update($data, $id);
    }
}
