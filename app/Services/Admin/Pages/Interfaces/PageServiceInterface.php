<?php

namespace App\Services\Admin\Pages\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface PageServiceInterface extends BaseServiceInterface
{
    public function countPage();
    public function filter($request);
    public function getAllActive();
}
