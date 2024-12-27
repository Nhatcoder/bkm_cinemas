<?php

namespace App\Services\Admin\Modules\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface ModuleServiceInterface extends BaseServiceInterface
{
    public function deleteMultipleChecked($request);
    public function filter($request);
    public function getModule();
}
