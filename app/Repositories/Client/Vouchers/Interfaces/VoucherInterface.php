<?php

namespace App\Repositories\Client\Vouchers\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface VoucherInterface 
{
    public function getAllVoucherByUserId($userId);
}