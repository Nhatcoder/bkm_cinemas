<?php
namespace App\Services\Admin\Permissions\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface PermissionServiceInterface extends BaseServiceInterface
{
    public function deleteMultipleChecked($request);
    public function filter($request);
}
