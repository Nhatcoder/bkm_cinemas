<?php

namespace App\Services\Client\Rewards\Services;

use App\Repositories\Client\Users\Interfaces\UserInterface;
use App\Repositories\Client\Rewards\Interfaces\RewardInterface;
use App\Services\Base\BaseService;
use App\Services\Client\Rewards\Interfaces\RewardServiceInterface;
use Illuminate\Support\Facades\Auth;

class RewardService extends BaseService implements RewardServiceInterface
{
    protected $userInterface;

    public function __construct(
        UserInterface $userInterface
    )
    {
        $this->userInterface = $userInterface;
        parent::__construct();
    }

    public function getRepository()
    {
        return RewardInterface::class;
    }

    public function generateGiftCode($length = 8) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $randomCode = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomCode .= $characters[rand(0, $charactersLength - 1)];
        }
    
        return $randomCode;
    }

    public function generateUniqueGiftCode($length = 8) {
        do {
            $code = $this->generateGiftCode($length);
            $exists = $this->repository->existCode($code);
        } while ($exists);
    
        return $code;
    }

    public function redeemRewards($request)
    {
        $userId = Auth::user()->id;
        $userPoints = Auth::user()->points;

        $reward = $this->repository->find($request->reward_id);

        if (!empty($reward)) {
            $userReward = $this->repository->createUserReward([
                'code' => $this->generateUniqueGiftCode(),
                'user_id' => $userId ?? null,
                'reward_id' => $request->reward_id,
                'quantity' => 1,
                'points_spent' => $request->points_spent
            ]);
            
            if ($userReward) {
                $this->userInterface->update(Auth::user()->id,[
                    'points' => $userPoints - $request->points_spent
                ]);
            }
        }

        return [
            'points' => $userPoints - $request->points_spent,
            'userRewardsCount' => $this->repository->getRewardsByUserId($userId)->count(),
            'code' => $this->generateUniqueGiftCode(),
            'name' => $reward->name,
            'image' => $reward->image,
            'status' => $reward->status
        ];
    }

    public function getRewardsByUserId($userId)
    {
        return $this->repository->getRewardsByUserId($userId);
    }
}