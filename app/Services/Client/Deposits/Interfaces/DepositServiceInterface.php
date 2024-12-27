<?php

namespace App\Services\Client\Deposits\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface DepositServiceInterface extends BaseServiceInterface
{
    public function updatePayment(&$data, $id);
}