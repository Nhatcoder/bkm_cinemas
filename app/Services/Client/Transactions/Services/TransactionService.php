<?php

namespace App\Services\Client\Transactions\Services;

use App\Repositories\Client\Transactions\Interfaces\TransactionInterface;
use App\Services\Base\BaseService;
use App\Services\Client\Transactions\Interfaces\TransactionServiceInterface;

class TransactionService extends BaseService implements TransactionServiceInterface
{
    public function getRepository()
    {
        return TransactionInterface::class;
    }

    public function getTransactionByUser($userId)
    {
        return $this->repository->getTransactionByUser($userId);
        
    }
    public function getTotalMoneyByYear($request){
        return $this->repository->getTotalMoneyByYear($request);
    }
    public function getTotalMoneyByMonth($request){
        return $this->repository->getTotalMoneyByMonth($request);

    }
}
