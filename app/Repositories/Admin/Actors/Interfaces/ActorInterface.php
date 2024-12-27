<?php

namespace App\Repositories\Admin\Actors\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface ActorInterface extends RepositoryInterface
{
    public function deleteMultiple(array $ids);
    public function filter($request);
    public function createMany($data, $role);
}
