<?php

namespace App\Services\Client\Bookings\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface BookingServiceInterface extends BaseServiceInterface
{
    public function getTicketsByUserId($id, $date);
}
