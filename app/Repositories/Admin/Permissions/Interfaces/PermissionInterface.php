<?php

namespace App\Repositories\Admin\Permissions\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface PermissionInterface extends RepositoryInterface
{
    public function filter($request);
}
