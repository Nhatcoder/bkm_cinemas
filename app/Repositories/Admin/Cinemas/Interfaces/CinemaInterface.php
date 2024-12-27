<?php

namespace App\Repositories\Admin\Cinemas\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface CinemaInterface extends RepositoryInterface
{
    public function deleteMultiple(array $ids);
    public function filter($request);
    public function getCinemaByArea($area_id);
    public function changeActive($id);
    public function changeOrder($id, $order);
    public function getAllActive();
}
