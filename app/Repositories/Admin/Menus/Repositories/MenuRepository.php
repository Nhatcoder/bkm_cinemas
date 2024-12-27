<?php

namespace App\Repositories\Admin\Menus\Repositories;

use App\Models\Menu;
use App\Repositories\Admin\Menus\Interfaces\MenuInterface;
use App\Repositories\Base\BaseRepository;

class MenuRepository extends BaseRepository implements MenuInterface
{
    public function getModel()
    {
        return Menu::class;
    }

    public function getAll()
    {
        $menus = $this->model->with('childrenRecursive')
            ->where('parent_id', 0)
            ->get();
        return $menus;
    }

    public function getLastChildId()
    {
        $menus = $this->model->with('childrenRecursive')
            ->get();

        return $menus;
    }

    public function deleteAllStructureMenu()
    {
        return $this->model->truncate();
    }

    public function delete($id)
    {
        $menus = $this->model->get();

        if (!empty($menus)) {
            foreach ($menus as $menu) {
                $menu->forceDelete();
            }
            return true;
        } else {
            return false;
        }

    }
}
