<?php

namespace App\Repositories\Admin\Movies\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface MovieInterface extends RepositoryInterface
{
    public function createGenre($record, $data);
    public function filter($request);
    public function createMovieActors($record, $data);
    public function deleteGenre($record, $data);
    public function deleteActor($record, $data);
    public function changeActive($id);
    public function changeHot($id);
    public function changeOrder($id, $order);
    public function deleteMultiple(array $ids);

}
