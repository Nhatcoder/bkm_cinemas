<?php
namespace App\Services\Admin\Users\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface UserServiceInterface extends BaseServiceInterface
{
    public function changeStatus($request);
    public function filter($request);
}
