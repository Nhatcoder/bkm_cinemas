<?php

namespace App\Services\Client\Rewards\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface RewardServiceInterface extends BaseServiceInterface
{
    public function redeemRewards($request);

    public function getRewardsByUserId($userId);
}