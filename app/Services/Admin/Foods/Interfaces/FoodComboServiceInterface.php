<?php
namespace App\Services\Admin\Foods\Interfaces;
use App\Services\Base\BaseServiceInterface;

interface FoodComboServiceInterface extends BaseServiceInterface
{
    public function changeOrder($request);
    public function filter($request);
    public function changeActive($request);
    public function deleteMultipleChecked($request);
}
