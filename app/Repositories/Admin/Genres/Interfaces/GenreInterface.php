<?php

namespace App\Repositories\Admin\Genres\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface GenreInterface extends RepositoryInterface
{
    public function getAll();
    public function delete($id);
    public function filter($request);
    public function getListGenre();
    public function checkPosition($positionValue);
    public function getListGenreEdit($id);
    public function changeOrder($id, $order);
}
