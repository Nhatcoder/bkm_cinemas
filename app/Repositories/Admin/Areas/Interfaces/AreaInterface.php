<?php
namespace App\Repositories\Admin\Areas\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface AreaInterface extends RepositoryInterface
{
    public function filter($request);
    public function getByCityId($cityId);
}
