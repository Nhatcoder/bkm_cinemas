<?php

namespace App\Repositories\Admin\Modules\Repositories;

use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\Admin\Modules\Interfaces\ModuleInterface;
use App\Repositories\Base\BaseRepository;

class ModuleRepository extends BaseRepository implements ModuleInterface
{

    public function getModel()
    {
        return Module::class;
    }

    public function getModule()
    {
        if (auth()->user()->cinema_id) {
            $modules = Module::whereHas('permissions', function ($query) {
                $query->whereHas('rolePermissions', function ($subQuery) {
                    $subQuery->whereHas('role', function ($roleQuery) {
                        $roleQuery->where('id', auth()->user()->role_id); 
                    });
                });
            })->get();
        }else{
            $modules = Module::all();
        }
        return $modules;
    }


    public function filter($request)
    {
        $data = $this->model->newQuery();
        $data = $data->with('permissions');
        if ($request->name) {
            $data = $data->where('name', 'like', '%' . $request->name . '%');
        }
        $data = $data->paginate(self::PAGINATION);

        return $data->appends([
            'name' => $request->name,
        ]);
    }

    public function createPermission($record, $data)
    {
        return $record->permissions()->create($data);
    }

    public function createManyPermission($record, $data)
    {
        return $record->permissions()->createMany($data);
    }

    public function updatePermissionsByModuleId($record, $data)
    {
        foreach ($data as $value) {
            $record->permissions()->where('id', $value['id'])->update($value);
        }

        return true;
    }

    public function find($id)
    {
        $result = $this->model->with('permissions')->find($id);

        if ($result) {
            return $result;
        }

        return false;
    }

    public function deletePermissionsByModuleId($module, $permissionsIds)
    {
        return $module->permissions()->whereIn('id', $permissionsIds)->delete();
    }

    public function delete($id)
    {
        $module = $this->find($id);

        if (!$module) {
            return redirect()->route('admin.modules.index')->with('status_failed', 'Không tìm thấy module');
        }

        $module->delete($id);

        $this->deletePermissionsByModuleId($module, $module->permissions()->pluck('id')->toArray());

        return true;
    }
}
