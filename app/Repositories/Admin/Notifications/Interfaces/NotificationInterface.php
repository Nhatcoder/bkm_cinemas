<?php

namespace App\Repositories\Admin\Notifications\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface NotificationInterface extends RepositoryInterface
{
    public function getByType($type);
    public function deleteMultiple(array $ids);
    public function filter($request);
    public function getByCinemaId($cinema_id);
}
