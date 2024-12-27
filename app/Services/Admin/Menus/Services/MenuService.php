<?php

namespace App\Services\Admin\Menus\Services;

use App\Repositories\Admin\Menus\Interfaces\MenuInterface;
use App\Services\Admin\Menus\Interfaces\MenuServiceInterface;
use App\Services\Base\BaseService;

class MenuService extends BaseService implements MenuServiceInterface
{
    public function getRepository()
    {
        return MenuInterface::class;
    }

    public function getLastChildId()
    {
        return $this->repository->getLastChildId();
    }

    public function create(&$request)
    {
        $menuData = $request->menu;

        $this->repository->deleteAllStructureMenu();

        $this->storeMenuItems($menuData);

        return true;
    }

    public function storeMenuItems(array $items, $parentId = 0)
    {
        foreach ($items as $item) {
            $menu = $this->repository->create([
                'name' => $item['name'],
                'slug' => $item['slug'],
                'url' => $item['url'],
                'type' => $item['type'],
                'record_id' => $item['record_id'],
                'parent_id' => $parentId
            ]);

            if (isset($item['children']) && is_array($item['children'])) {
                $this->storeMenuItems($item['children'], $menu->id);
            }
        }

        return $menu;
    }

}
