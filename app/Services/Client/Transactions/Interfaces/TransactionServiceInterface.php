<?php

namespace App\Services\Client\Transactions\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface TransactionServiceInterface extends BaseServiceInterface
{
    public function getTransactionByUser($userId);
    public function getTotalMoneyByYear($request);
    public function getTotalMoneyByMonth($request);
    
    
}
