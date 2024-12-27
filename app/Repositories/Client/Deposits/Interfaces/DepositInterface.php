<?php

namespace App\Repositories\Client\Deposits\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface DepositInterface extends RepositoryInterface
{
    public function updatePayment(&$data, $id);
}
