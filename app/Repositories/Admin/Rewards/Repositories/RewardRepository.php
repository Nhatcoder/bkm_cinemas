<?php

namespace App\Repositories\Admin\Rewards\Repositories;
use App\Models\Reward;
use App\Models\User;
use App\Models\UserReward;
use App\Repositories\Admin\Rewards\Interfaces\RewardInterface;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\DB;

class RewardRepository extends BaseRepository implements RewardInterface
{
    protected $userReward;
    protected $user;

    public function __construct(
        UserReward $userReward,
        User $user
    )
    {
        parent::__construct();
        $this->userReward = $userReward;
        $this->user = $user;
    }

    public function getModel()
    {
        return Reward::class;
    }

    public function filter($request)
    {
        $data = $this->model->newQuery();
        $data = $this->filterByName( $data);
        $data = $this->applyOrdering( $data,$request);
        $data = $data->paginate(self::PAGINATION);

        return $data->appends([
            'name' => $request->name,
            'order_with' => $request->order_with,
        ]);
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();
            return true;
        }

        return false;
    }

    public function deleteMultiple(array $ids)
    {
        collect($ids)->chunk(1000)->each(function ($chunk) {
            $this->model->whereIn('id', $chunk)->delete();
        });
        return true;
    }

    protected function filterByName($query)
    {
        if (!empty(request()->name)) {
            return $query->where('name', 'like', '%' . request()->name . '%');
        }
        return $query;
    }

    protected function applyOrdering($query, $request)
    {
        if (!empty($request->order_with)) {
            switch ($request->order_with) {
                case 'dateASC':
                    return $query->orderBy('created_at', 'asc');
                case 'dateDESC':
                    return $query->orderBy('created_at', 'desc');
            }
        }
        return $query;
    }

    public function getUserRewards()
    {
        return $this->user->whereHas('rewards')
            ->with([
                'rewards',
                'area',
                'cinemas' => function ($query) {
                    $query->whereColumn('cinemas.area_id', 'areas.id');
                }
            ])
            ->paginate(12);
    }

    public function updateRewardByCode($code)
    {
        return $this->userReward->where('code', $code)->first();
    }
    public function changeActive($id)
    {
        $result = $this->model->find($id)->first();
        if ($result) {
            $result->active ^= 1;
            $result->save();
            return $result;
        }
        return false;
    }
}
