<?php
namespace App\Services\Admin\Areas\Interfaces;
use App\Services\Base\BaseServiceInterface;

interface AreaServiceInterface extends BaseServiceInterface
{
    public function filter($request);
    public function getByCityId($cityId);
}
