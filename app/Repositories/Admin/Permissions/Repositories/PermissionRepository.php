<?php

namespace App\Repositories\Admin\Permissions\Repositories;

use App\Models\Permission;
use App\Repositories\Admin\Permissions\Interfaces\PermissionInterface;
use App\Repositories\Base\BaseRepository;

class PermissionRepository extends BaseRepository implements PermissionInterface
{
    public function getModel()
    {
        return Permission::class;
    }
    public function filter($request)
    {
        $data = $this->model->newQuery();
        if ($request->name) {
            $data = $data->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->type) {
            $data = $data->where('type', $request->type);
        }
        $data = $data->paginate(self::PAGINATION);

        return $data->appends([
            'name' => $request->name,
            'type' => $request->type
        ]);
    }
}
