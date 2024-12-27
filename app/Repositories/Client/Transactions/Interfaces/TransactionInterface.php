<?php

namespace App\Repositories\Client\Transactions\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface TransactionInterface extends RepositoryInterface
{
    public function getTransactionByUser($userId);
    public function getTotalMoneyByMonth($request);

    
    
    
    
}
