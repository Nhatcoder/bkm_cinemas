<?php
namespace App\Services\Admin\Menus\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface MenuServiceInterface extends BaseServiceInterface
{
    public function storeMenuItems(array $items, $parentId = 0);
    public function getLastChildId();
}
