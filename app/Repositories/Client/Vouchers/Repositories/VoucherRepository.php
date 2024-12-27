<?php

namespace App\Repositories\Client\Vouchers\Repositories;
use App\Models\UserVoucher;
use App\Models\Voucher;
use App\Repositories\Client\Vouchers\Interfaces\VoucherInterface;

class VoucherRepository  implements VoucherInterface
{
    protected $userVoucher;


    public function __construct(
        UserVoucher  $userVoucher
    )
    {
        $this->userVoucher = $userVoucher;
    }
    public function getModel()
    {
        return Voucher::class;
    }

    public function getAllVoucherByUserId($userId)
    {
        return $this->userVoucher->with('voucher', 'user')->where('user_id', $userId)->where('deleted_at', null)->orderBy('created_at', 'DESC')->get();
    }
}