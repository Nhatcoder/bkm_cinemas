<?php

namespace App\Services\Admin\Systems\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface SystemServiceInterface extends BaseServiceInterface
{
    public function changeOrder($request);
    public function changeActive($request);
    public function getAllSystemBySystemId($request);
    public function getAllSystemByType0($request);
    public function deleteMultipleChecked($request);
}
