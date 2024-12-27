<?php

namespace App\Repositories\Admin\Vouchers\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface VoucherInterface extends RepositoryInterface
{
    public function deleteMultiple(array $ids);
    public function filter($request);

    public function getAccountByVoucher($request);
    public function  getAccountByKeyword($request);
    public function giftVoucherToAccount($request);
    public function changeActive($id);
    // public function createMany($data, $role);
}
