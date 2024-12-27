<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CinemaController;
use App\Http\Controllers\Api\CityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\FoodTypeController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\SeatController;
use App\Http\Controllers\Api\SeatLayoutController;
use App\Http\Controllers\Api\SeatTypeController;
use App\Http\Controllers\Api\ShowtimeController;
use App\Http\Controllers\api\VoucherController;
use App\Models\Cinema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

Route::name('api.')->group(function () {
    Route::resource('seats', SeatController::class);
    Route::resource('seat-layouts', SeatLayoutController::class);
    Route::resource('seat-types', SeatTypeController::class);
    Route::get('seat-types-key-by-code', [SeatTypeController::class, 'getSeatTypesKeyByCode']);
    Route::controller(RoomController::class)->prefix('rooms')->name('rooms.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{room}', 'show')->name('show');
        Route::post('', 'store')->name('store');
        Route::put('{room}', 'update')->name('update');
        Route::delete('{room}', 'destroy')->name('destroy');
    });
    Route::controller(ShowtimeController::class)->prefix('showtimes')->name('showtimes.')->group(function () {
        Route::get('getShowtimesByDayAndRoomId', 'getShowtimesByDayAndRoomId');
        Route::get('{showtime}/detail', 'getShowtimeDetailById');
        Route::get('getShowtimeDetailForMovie', 'getShowtimeDetailForMovie');
        Route::get('', 'index');
        Route::get('{showtime}', 'show');
        Route::post('{showtime}/book-seat', 'bookSeat');
        Route::post('', 'store');
        Route::put('{showtime}', 'update');
        Route::put('{showtime}/clear-movie', 'clearShowtimeMovie');
        Route::put('{showtime}/update-movie', 'updateShowtimeMovie');
        Route::delete('{showtime}', 'destroy');
    });
    Route::controller(FoodController::class)->prefix('foods')->name('foods.')->group(function () {
        Route::get('', 'index');
        Route::get('{food}', 'show');
        Route::post('', 'store');
        Route::put('{food}', 'update');
        Route::delete('{showtime}', 'destroy');
    });
    Route::controller(FoodTypeController::class)->prefix('food-types')->name('food-types.')->group(function () {
        Route::get('', 'index');
        Route::get('{food-type}', 'show');
        Route::post('', 'store');
        Route::put('{food-type}', 'update');
        Route::delete('{food-type}', 'destroy');
    });
    Route::controller(MovieController::class)->prefix('movies')->name('movies.')->group(function () {
        Route::get('', 'index');
        Route::get('{movie}', 'show');
        Route::post('', 'store');
        Route::put('{movie}', 'update');
        Route::delete('{movie}', 'destroy');
    });
    Route::controller(AuthController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('getCurrentUser', 'getCurrentUser');
    });
    Route::controller(CinemaController::class)->prefix('cinemas')->name('cinemas.')->group(function () {
        Route::get('', 'index');
    });
    Route::controller(CityController::class)->prefix('cities')->name('cities.')->group(function () {
        Route::get('', 'index');
        Route::get('{city}', 'show');
        Route::post('', 'store');
        Route::put('{city}', 'update');
        Route::delete('{city}', 'destroy');
    });

    Route::controller(BookingController::class)->prefix('bookings')->name('bookings.')->group(function () {
        Route::get('', 'index');
        Route::get('{booking}', 'show');
        Route::post('', 'store');
        Route::put('{booking}', 'update');
        Route::delete('{booking}', 'destroy');
    });

    Route::controller(PaymentController::class)->prefix('payments')->name('payments.')->group(function () {
        Route::post('/processDeposit', 'processDeposit');
        Route::get('/vnpayReturn', 'vnpayReturn')->name('vnpayReturn');
        Route::get('/momoReturn', 'momoReturn')->name('momoReturn');
        Route::get('/zaloPayReturn', 'zaloPayReturn')->name('zaloPayReturn');
    });

    Route::controller(BookingController::class)->prefix('orders')->name('orders.')->group(function () {
        Route::post('/{id}/change-status', 'changeStatus')
            ->name('changeStatus');
        Route::post('/{id}/change-refund-status', 'changeRefundStatus')
            ->name('changeRefundStatus');
    });


    Route::controller(VoucherController::class)->prefix('vouchers')->name('vouchers.')->group(function () {
        Route::get('', 'index');
        Route::get('getUserVouchers', 'getUserVouchers');
        Route::get('getVoucherByCode/{code}', 'getVoucherByCode');
        Route::get('{voucher}', 'show');
        Route::post('', 'store');
        Route::put('{voucher}', 'update');
        Route::delete('{voucher}', 'destroy');
    });
});
