<?php

namespace App\Repositories\Client\Bookings\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface BookingInterface extends RepositoryInterface
{
    public function getTicketsByUserId($id);
}
