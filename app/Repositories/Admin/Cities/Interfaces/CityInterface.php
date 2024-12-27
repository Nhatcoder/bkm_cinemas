<?php
namespace App\Repositories\Admin\Cities\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface CityInterface extends RepositoryInterface
{
    public function filter($request);
}
