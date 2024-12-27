<?php
namespace App\Services\Admin\Cities\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface CityServiceInterface extends BaseServiceInterface
{
    public function filter($request);
}
