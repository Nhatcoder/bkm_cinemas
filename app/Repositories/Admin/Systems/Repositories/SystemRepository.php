<?php

namespace App\Repositories\Admin\Systems\Repositories;

use App\Models\System;
use App\Repositories\Admin\Systems\Interfaces\SystemInterface;
use App\Repositories\Base\BaseRepository;

class SystemRepository extends BaseRepository implements SystemInterface
{
    public function getModel()
    {
        return System::class;
    }

    public function getAllSystemByType0SideBar()
    {
        $systems = $this->model->where('type', 0)
            ->orderBy('order')
            ->get();

        return $systems;
    }

    public function getAllSystemByType0($request)
    {
        $systems = $this->model->where('type', 0);

        if ($request->name) {
            $systems = $systems->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('active') && $request->active !== null) {
            $systems = $systems->where('active', $request->active);
        }

        $systems = $systems->orderBy('order')
            ->orderBy('id');

        $systems = $systems->withCount('childs')->paginate(self::PAGINATION);

        return $systems;
    }

    public function getAllSystemBySystemId($request)
    {
        $systems = $this->model->where('type', $request->system_id);

        if ($request->name) {
            $systems = $systems->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('active') && $request->active !== null) {
            $systems = $systems->where('active', $request->active);
        }

        $systems = $systems->orderBy('order')
            ->orderBy('id')
            ->paginate(self::PAGINATION);

        $systems->appends($request->page);

        return $systems;
    }

    public function delete($id)
    {
        $system = $this->find($id);

        if (!$system) {
            return redirect()->route('admin.systems.index')->with('status_failed', 'Không tìm thấy nội dung');
        }

        if ($system->type == 0) {
            $systemsToDelete = $this->model->where('type', $id)->get();

            foreach ($systemsToDelete as $item) {
                $item->delete();
            }
        }

        $system->delete();

        return $system;
    }

    public function changeActive($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->active ^= 1;
            $result->save();
            return $result;
        }
        return false;
    }

    public function changeOrder($id, $order)
    {
        $result = $this->find($id);
        if ($result) {
            $result->order = $order;
            $result->save();
            return $result;
        }
        return false;
    }
}
