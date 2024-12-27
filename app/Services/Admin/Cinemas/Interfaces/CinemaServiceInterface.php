<?php
namespace App\Services\Admin\Cinemas\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface CinemaServiceInterface extends BaseServiceInterface
{
    public function changeOrder($request);
    public function filter($request);
    public function getCinemaByArea($area_id);
    public function changeActive($request);
    public function getAllActive();
    public function deleteMultipleChecked($request);

}
