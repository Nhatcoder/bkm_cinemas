<?php

namespace App\Services\Admin\Modules\Services;

use App\Models\Module;
use App\Repositories\Admin\Modules\Interfaces\ModuleInterface;
use App\Services\Admin\Modules\Interfaces\ModuleServiceInterface;
use App\Services\Base\BaseService;

class ModuleServices extends BaseService implements ModuleServiceInterface
{

    public function getRepository()
    {
        return ModuleInterface::class;
    }
    public function filter($request)
    {
        return $this->repository->filter($request);
    }


    public function getModule()
    {
        $modules = $this->repository->getModule();
        return $modules;
    }

    public function create(&$data)
    {
        $module = $this->repository->create($data['module']);

        if (!empty($data['permissions'])) {
            $filteredPermissions = array_filter($data['permissions'], function ($permission) {
                return !empty($permission['name']) || !empty($permission['value']);
            });

            if (!empty($filteredPermissions)) {
                $this->repository->createManyPermission($module, $filteredPermissions);
            }
        }

        return true;
    }

    public function update(&$data, $id)
    {
        $mod = $this->repository->find($id);

        if (!$mod) {
            return redirect()->route('admin.modules.index')->with('status_failed', 'Không tìm thấy module');
        }

        $this->repository->update($id, $data['module']);

        $existingPerms = $mod->permissions->pluck('id')->toArray();
        if (!empty($existingPerms)) {
            if (!empty($data['old_permissions'])) {
                $oldPermIds       = array_column($data['old_permissions'], 'id');
                $permsToDelete    = array_diff($existingPerms, $oldPermIds);

                $filteredOldPerms = array_filter($data['old_permissions'], function ($oldPerm) use (&$permsToDelete) {
                    if (empty($oldPerm['name']) && empty($oldPerm['value'])) {
                        $permsToDelete[] = $oldPerm['id'];
                        return false;
                    }
                    return true;
                });

                if (!empty($permsToDelete)) {
                    $this->repository->deletePermissionsByModuleId($mod, $permsToDelete);
                }
                $this->repository->updatePermissionsByModuleId($mod, $filteredOldPerms);
            } else {
                $this->repository->deletePermissionsByModuleId($mod, $existingPerms);
            }
        }

        if (!empty($data['permissions'])) {
            $filteredPerms = array_filter($data['permissions'], function ($perm) {
                return !empty($perm['name']) || !empty($perm['value']);
            });

            if (!empty($filteredPerms)) {
                $this->repository->createManyPermission($mod, $filteredPerms);
            }
        }

        return true;
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
