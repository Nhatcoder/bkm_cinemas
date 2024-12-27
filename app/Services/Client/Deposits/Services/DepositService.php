<?php

namespace App\Services\Client\Deposits\Services;

use App\Repositories\Client\Deposits\Interfaces\DepositInterface;
use App\Services\Base\BaseService;
use App\Services\Client\Deposits\Interfaces\DepositServiceInterface;
use Illuminate\Support\Facades\Auth;

class DepositService extends BaseService implements DepositServiceInterface
{
    public function getRepository()
    {
        return DepositInterface::class;
    }

    public function update(&$data, $id)
    {
        $record = $this->find($id);
        if (!$record) {
            return false;
        }

        if (isset($data['vnp_Amount'])) {
            $dataNew = [
                'balance' => $data['vnp_Amount'] + $record->balance,
                'exp' => $data['exp'],
                'points' => $data['points'],
                'membership_level' => $data['membership_level'],
                'is_new_member' => $data['is_new_member'],
            ];
        }

        if (isset($data['momo_Amount'])) {
            $dataNew = [
                'balance' => $data['momo_Amount'] + $record->balance,
                'exp' => $data['exp'],
                'points' => $data['points'],
                'membership_level' => $data['membership_level'],
                'is_new_member' => $data['is_new_member'],
            ];
        }

        if (isset($data['zaloPay_Amount'])) {
            $dataNew = [
                'balance' => $data['zaloPay_Amount'] + $record->balance,
                'exp' => $data['exp'],
                'points' => $data['points'],
                'membership_level' => $data['membership_level'],
                'is_new_member' => $data['is_new_member'],
            ];
        }

        return $this->repository->update($id, $dataNew);
    }

    public function updatePayment(&$data, $id)
    {
        $record = $this->find($id);
        if (!$record) {
            return false;
        }

        if (isset($data['vnp_Amount'])) {
            $dataNew = [
                'exp' => $data['exp'],
                'membership_level' => $data['membership_level'],
                'is_new_member' => $data['is_new_member'],
            ];
        }

        if (isset($data['momo_Amount'])) {
            $dataNew = [
                'exp' => $data['exp'],
                'membership_level' => $data['membership_level'],
                'is_new_member' => $data['is_new_member'],
            ];
        }

        if (isset($data['zaloPay_Amount'])) {
            $dataNew = [
                'exp' => $data['exp'],
                'membership_level' => $data['membership_level'],
                'is_new_member' => $data['is_new_member'],
            ];
        }

        return $this->repository->update($id, $dataNew);
    }
}
