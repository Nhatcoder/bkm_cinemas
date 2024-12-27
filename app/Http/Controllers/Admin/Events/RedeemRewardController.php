<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use App\Services\Admin\Rewards\Interfaces\RewardServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RedeemRewardController extends Controller
{
    protected $rewardService;

    public function __construct(
        RewardServiceInterface $rewardService
    )
    {
        $this->rewardService = $rewardService;
    }

    public function index()
    {
        $data['userRewards'] = $this->rewardService->getUserRewards();

        return view('admin.pages.redeemRewards.index', compact('data'));
    }

    public function changeStatus(Request $request)
    {
        try {
            $this->rewardService->changeStatus($request);

            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
