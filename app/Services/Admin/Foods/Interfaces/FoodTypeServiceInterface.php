<?php
namespace App\Services\Admin\Foods\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface FoodTypeServiceInterface extends BaseServiceInterface
{
    public function getAllActive();
    public function filter($request);
    public function deleteMultipleChecked($request);
    public function changeActive($request);
    public function changeOrder($request);
}
