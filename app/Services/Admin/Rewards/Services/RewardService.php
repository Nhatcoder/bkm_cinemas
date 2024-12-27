<?php

namespace App\Services\Admin\Rewards\Services;

use App\Repositories\Admin\Rewards\Interfaces\RewardInterface;
use App\Services\Admin\Rewards\Interfaces\RewardServiceInterface;
use App\Services\Base\BaseService;
use Illuminate\Support\Facades\Storage;

class RewardService extends BaseService implements RewardServiceInterface
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getRepository()
    {
        return RewardInterface::class;
    }
    public function filter($request)
    {
        return $this->repository->filter($request);
    }

    public function create(&$data)
    {
        if (isset($data['image']) && $data['image']) {
            $uploadData = $this->uploadFile($data['image'], 'public/rewards');
            $data['image'] = $uploadData['path'];
        }
        return $this->repository->create($data);
    }

    public function update(&$data, $id)
    {
        $record = $this->find($id);
        if (!$record) {
            return false;
        }
        if (isset($data['image']) && $data['image']) {
            if ($record->image) {
                $this->deleteAvatar($record->image, 'actors');
            }
            $uploadData = $this->uploadFile($data['image'], 'public/actors');
            $data['image'] = $uploadData['path'];
        }
        return $this->repository->update($id, $data);
    }

    public function deleteMultipleChecked($request)
    {

        if (count($request->selectedIds) < 0) {
            return false;
        }
        $this->repository->deleteMultiple($request->selectedIds);
        return true;
    }

    private function deleteAvatar($avatar, $folderName)
    {
        $path = "public/$folderName/" . basename($avatar);
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }

    private function uploadFile($data, $folderName)
    {
        $path = $data->store($folderName);

        return [
            'name' => $data->getClientOriginalName(),
            'path' => Storage::url($path),
        ];
    }

    public function getUserRewards()
    {
        return $this->repository->getUserRewards();
    }

    public function changeStatus($request)
    {
        $userReward = $this->repository->updateRewardByCode($request->code);

        if (!$userReward) {
            return false;
        }

        if ($userReward->status == 1) {
            return false;
        }

        $userReward->status = $request->status == 0 ? 1 : 0;
        $userReward->save();

        return true;
    }
    public function changeActive($request){
        return $this->repository->changeActive($request);
    }
}
