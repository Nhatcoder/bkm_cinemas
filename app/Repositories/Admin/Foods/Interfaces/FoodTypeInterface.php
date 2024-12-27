<?php

namespace App\Repositories\Admin\Foods\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface FoodTypeInterface extends RepositoryInterface
{
    public function deleteMultiple(array $ids);

    public function filter($request);

    public function getAllActive();

    public function changeActive($id);

    public function changeOrder($id, $order);
}
