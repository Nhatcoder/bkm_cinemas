<?php
namespace App\Services\Admin\Movies\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface MovieServiceInterface extends BaseServiceInterface
{
    public function changeOrder($request);
    public function filter($request);
    public function changeActive($request);
    public function changeHot($request);
    public function deleteMultipleChecked($request);
}
