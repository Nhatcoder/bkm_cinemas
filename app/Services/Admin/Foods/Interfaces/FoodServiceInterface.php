<?php
namespace App\Services\Admin\Foods\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface FoodServiceInterface extends BaseServiceInterface
{
    public function getAllActive();
    public function filter($request);
    public function changeOrder($request);
    public function changeActive($request);
    public function getByMultipleId(array $ids);
    public function deleteMultipleChecked($request);
}
