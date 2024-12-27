<?php

namespace App\Services\Client\Bookings\Services;

use App\Repositories\Client\Bookings\Interfaces\BookingInterface;
use App\Services\Base\BaseService;
use App\Services\Client\Bookings\Interfaces\BookingServiceInterface;

class BookingService extends BaseService implements BookingServiceInterface
{
    public function getRepository()
    {
        return BookingInterface::class;
    }

    public function getTicketsByUserId($id, $date = null)
    {
        return $this->repository->getTicketsByUserId($id, $date);
    }
}
