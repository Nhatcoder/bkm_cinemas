<?php

namespace App\Repositories\Admin\Menus\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface MenuInterface extends RepositoryInterface
{
    public function deleteAllStructureMenu();

    public function getLastChildId();
}
