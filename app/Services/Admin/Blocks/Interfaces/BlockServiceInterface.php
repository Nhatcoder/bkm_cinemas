<?php
namespace App\Services\Admin\Blocks\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface BlockServiceInterface extends BaseServiceInterface
{
    public function countBlock();
    public function filter($request);
}
