<?php

namespace App\Services\Admin\Payments\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface PaymentServiceInterface extends BaseServiceInterface
{
    public function filter($request);
    public function changeActive($request);
}