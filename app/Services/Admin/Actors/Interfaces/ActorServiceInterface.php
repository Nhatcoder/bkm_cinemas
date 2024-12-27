<?php
namespace App\Services\Admin\Actors\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface ActorServiceInterface extends BaseServiceInterface
{
    public function deleteMultipleChecked($request);
    public function filter($request);
}
