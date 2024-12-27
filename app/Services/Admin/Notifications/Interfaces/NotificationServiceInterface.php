<?php

namespace App\Services\Admin\Notifications\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface NotificationServiceInterface extends BaseServiceInterface
{
    public function getByType($type);
    public function filter($request);
    public function deleteMultipleChecked($request);
    public function getByCinemaId($cinema_id);
}
