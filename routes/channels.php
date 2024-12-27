<?php

use App\Models\Booking;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('showtime.{showtimeId}', function ($user, $showtimeId) {
    return ['user' => $user, 'showtimeId' => $showtimeId];
});

Broadcast::channel('change_status_order.{cinema_id}', function ($user, $cinema_id) {
    return ['user' => $user, 'cinema_id' => $cinema_id];
});

Broadcast::channel('change_status_order_client.{user_id}', function ($user, $user_id) {
    return ['user' => $user, 'user_id' => $user_id];
});

Broadcast::channel('change_refund_status_order.{user_id}', function ($user, $user_id) {
    return ['user' => $user, 'user_id' => $user_id];
});





