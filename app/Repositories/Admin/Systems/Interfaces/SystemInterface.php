<?php

namespace App\Repositories\Admin\Systems\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface SystemInterface extends RepositoryInterface
{
    public function getAllSystemByType0SideBar();
    public function getAllSystemByType0($request);
    public function getAllSystemBySystemId($request);
    public function changeActive($id);
    public function changeOrder($id, $order);
}
