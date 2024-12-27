<?php

namespace App\Services\Admin\Permissions\Services;

use App\Repositories\Admin\Permissions\Interfaces\PermissionInterface;
use App\Services\Admin\Permissions\Interfaces\PermissionServiceInterface;
use App\Services\Base\BaseService;

class PermissionService extends BaseService implements PermissionServiceInterface
{

    public function getRepository()
    {
        return PermissionInterface::class;
    }
    public function filter($request)
    {
        return $this->repository->filter($request);
    }
    public function deleteMultipleChecked($request)
    {
        if (count($request->selectedIds) > 0) {
            foreach ($request->selectedIds as $id) {
                $this->repository->delete($id);
            }
            return true;
        }
    }
}
