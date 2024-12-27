<?php

namespace App\Policies\Admin\Bookings;

use App\Models\User;

class BookingPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermission('view-booking');
    }

    public function changeStatus(User $user)
    {
        return $user->hasPermission('change-status-booking');
    }
    public function changeRefundStatus(User $user)
    {
        return $user->hasPermission('change-refund-status-booking');
    }

    public function getTickets(User $user)
    {
        return $user->hasPermission('get-tickets-booking');
    }
}
