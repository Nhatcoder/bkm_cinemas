<?php

namespace App\Services\Admin\Roles\Services;

use App\Repositories\Admin\Roles\Interfaces\RoleInterface;
use App\Services\Admin\Roles\Interfaces\RoleServiceInterface;
use App\Services\Base\BaseService;
use App\Traits\RemoveImageTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Storage;

class RoleService extends BaseService implements RoleServiceInterface
{
    use StorageImageTrait, RemoveImageTrait;

    public function getRepository()
    {
        return RoleInterface::class;
    }

    public function getRoles()
    {
        return $this->repository->getRoles();
    }

    public function create(&$data)
    {
        if (!empty($data['role']['image'])) {
            $uploadData = $this->uploadFile($data['role']['image'], 'public/roles');
            $data['role']['image'] = $uploadData['path'];
        } else {
            $data['role']['image'] = null;
        }

        $user = auth()->user();
        $dataCreate = [
            'name' => $data['role']['name'],
            'type' => $data['role']['type'],
            'description' => $data['role']['description'],
            'user_id' => $user->id,
            'image' => $data['role']['image']
        ];

        $role = $this->repository->create($dataCreate);

        if (!empty($data['permissions']) && is_array($data['permissions']) && count($data['permissions']) > 0) {
            $role->permissions()->attach($data['permissions']);
        }

        return true;
    }

    public function update(&$data, $id)
    {
        $role = $this->repository->find($id);

        if (!$role) {
            return redirect()->route('admin.roles.index')->with('status_failed', 'Không tìm thấy vai trò');
        }

        if (!empty($data['role']['image'])) {
            if ($role->image) {
                $this->deleteAvatar($role->image, 'roles');
            }
            $uploadData = $this->uploadFile($data['role']['image'], 'public/roles');
            $data['role']['image'] = $uploadData['path'];
        } else {
            $data['role']['image'] = $role->image;
        }

        $user = auth()->user();
        if (!empty($user->cinema_id)) {
            $dataUpdate = [
                'name' => $data['role']['name'],
                'type' => $data['role']['type'],
                'description' => $data['role']['description'],
                'user_id' => $user->id,
                'image' => $data['role']['image']
            ];
        } else {
            $dataUpdate = [
                'name' => $data['role']['name'],
                'type' => $data['role']['type'],
                'description' => $data['role']['description'],
                'user_id' => null,
                'image' => $data['role']['image']
            ];
        }

        $this->repository->update($id, $dataUpdate);

        if (!empty($data['permissions']) && is_array($data['permissions'])) {
            $currentPermissions = $role->permissions->pluck('id')->toArray();

            $newPermissions = $data['permissions'];

            $permissionsToDetach = array_diff($currentPermissions, $newPermissions);

            if (!empty($permissionsToDetach)) {
                $role->permissions()->detach($permissionsToDetach);
            }

            $permissionsToAttach = array_diff($newPermissions, $currentPermissions);

            if (!empty($permissionsToAttach)) {
                $role->permissions()->attach($permissionsToAttach);
            }
        } else {
            $role->permissions()->detach();
        }

        return true;
    }

    private function uploadFile($data, $folderName)
    {
        $path = $data->store($folderName);

        return [
            'name' => $data->getClientOriginalName(),
            'path' => Storage::url($path),
        ];
    }

    private function deleteAvatar($avatar, $folderName)
    {
        $path = "public/$folderName/" . basename($avatar);
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }
}
