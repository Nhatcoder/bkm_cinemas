<?php
namespace App\Services\Admin\Vouchers\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface VoucherServiceInterface extends BaseServiceInterface
{
    public function deleteMultipleChecked($request);
    public function filter($request);
    public function getAccountByVoucher($request);
    public function  getAccountByKeyword($request);
    public function giftVoucherToAccount($request);
    public function changeActive($request);
}
