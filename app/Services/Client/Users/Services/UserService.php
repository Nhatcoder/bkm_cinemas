<?php

namespace App\Services\Client\Users\Services;

use App\Repositories\Client\Users\Interfaces\UserInterface;
use App\Services\Base\BaseService;
use App\Services\Client\Users\Interfaces\UserServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class UserService extends BaseService implements UserServiceInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getRepository()
    {
        return UserInterface::class;
    }

    public function update(&$data, $id)
    {
        $record = $this->find($id);
        if (!$record) {
            return false;
        }

        if (isset($data['image']) && $data['image']) {
            if ($record->image) {
                $this->deleteAvatar($record->image, 'users');
            }
            $uploadData = $this->uploadFile($data['image'], 'public/users');
            $data['image'] = $uploadData['path'];
        }

        $this->repository->update($id, $data);

        return $data['image'];
    }

    public function updateProfile(&$data, $id)
    {
        $record = $this->find($id);
        if (!$record) {
            return false;
        }

        return $this->repository->update($id, $data);
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
}
