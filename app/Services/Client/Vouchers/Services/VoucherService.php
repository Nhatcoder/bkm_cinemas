<?php

namespace App\Services\Client\Vouchers\Services;

use App\Repositories\Client\Vouchers\Interfaces\VoucherInterface;
use App\Services\Base\BaseService;
use App\Services\Client\Vouchers\Interfaces\VoucherServiceInterface;

class VoucherService extends BaseService implements VoucherServiceInterface
{
 
    public function getRepository()
    {
        return VoucherInterface::class;
    }

    public function getAllVoucherByUserId($userId){
        return $this->repository->getAllVoucherByUserId($userId);
    }


}