<?php

namespace App\Repositories\Client\Rewards\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface RewardInterface extends RepositoryInterface
{
    public function createUserReward($request);

    public function getRewardsByUserId($userId);

    public function existCode($code);
}