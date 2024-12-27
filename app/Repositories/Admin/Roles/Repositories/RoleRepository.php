<?php

namespace App\Repositories\Admin\Roles\Repositories;

use App\Models\Role;
use App\Repositories\Admin\Roles\Interfaces\RoleInterface;
use App\Repositories\Base\BaseRepository;
use App\Traits\RemoveImageTrait;

class RoleRepository extends BaseRepository implements RoleInterface
{
    use RemoveImageTrait;
    public function getModel()
    {
        return Role::class;
    }

    public function getAll()
    {
        $query = $this->model->newQuery();
        $query->with(['permissions', 'users']);

        if (auth()->user()->cinema_id) { {
                $query->whereHas('user', function ($subQuery) {
                    $subQuery->where('id', auth()->user()->id);
                });
            }
        }

        return $query->paginate(self::PAGINATION);
    }

    public function find($id)
    {
        $result = $this->model->with('permissions')->find($id);

        if ($result) {
            return $result;
        }

        return false;
    }

    public function delete($id)
    {
        $role = $this->find($id);

        if (!$role) {
            return redirect()->route('admin.roles.index')->with('status_failed', 'Không tìm thấy vai trò');
        }

        $this->existImage($role, 'image', 'roles');

        $role->delete($id);

        if (!empty($role->permissions)) {
            $role->permissions()->detach();
        }

        return true;
    }
}
