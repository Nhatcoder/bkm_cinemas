<?php

namespace App\Repositories\Client\Rewards\Repositories;

use App\Models\Reward;
use App\Models\User;
use App\Models\UserReward;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Client\Rewards\Interfaces\RewardInterface;

class RewardRepository extends BaseRepository implements RewardInterface
{
    protected $userRewards;


    public function __construct(
        UserReward  $userRewards
    )
    {
        parent::__construct();
        $this->userRewards = $userRewards;
    }
    public function getModel()
    {
        return Reward::class;
    }

    public function createUserReward($request)
    {
        return $this->userRewards->create($request);
    }

    public function getAll()
    {
        return $this->model->where('active', 1)->orderBy('id', 'desc')->get();
    }

    public function getRewardsByUserId($userId)
    {
        return $this->userRewards->with('reward', 'user')->where('user_id', $userId)->get();
    }

    public function existCode($code)
    {
        return $this->userRewards->where('code', $code)->exists();
    }
}