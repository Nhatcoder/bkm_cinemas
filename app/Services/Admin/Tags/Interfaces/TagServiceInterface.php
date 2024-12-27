<?php

namespace App\Services\Admin\Tags\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface TagServiceInterface extends BaseServiceInterface
{
    public function getRepository();
    public function create(&$request);
    public function update(&$request, $id);
    public function changeActive($request);
    public function changePosition($request);
    public function changeOrder($request);
    public function deleteMultipleChecked($request);
}
