<?php
namespace App\Services\Admin\BlockTypes\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface BlockTypeServiceInterface extends BaseServiceInterface
{
    public function countBlockType();
    public function getAllActive();
    public function filter($request);
}
