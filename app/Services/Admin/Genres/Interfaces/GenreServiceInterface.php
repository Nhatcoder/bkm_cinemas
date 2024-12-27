<?php

namespace App\Services\Admin\Genres\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface GenreServiceInterface extends BaseServiceInterface
{
    public function getListGenreEdit($id);
    public function filter($request);
    public function changeOrder($request);
    public function changePosition($request);
    public function deleteMultipleChecked($request);
}
