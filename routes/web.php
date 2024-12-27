<?php

use App\Events\BookSeat;
use App\Http\Controllers\Client\PostByCategoryController;
use App\Jobs\ResetSeatStatus;
use App\WebSockets\CustomWebSocketHandler;
use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\DepositController;
use App\Http\Controllers\Client\PaymentController;
use App\Http\Controllers\Auth\Client\AuthController;
use App\Http\Controllers\Client\ListMoviesController;
use App\Http\Controllers\Auth\Client\GoogleController;
use App\Http\Controllers\Client\MovieDetailController;
use App\Http\Controllers\Auth\Client\FacebookController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Client\PostDetailController;
use App\Http\Controllers\Client\ShowScheduleController;
use App\Http\Controllers\client\ShowtimeController;
use App\Http\Controllers\Client\TicketPriceController;
use App\Models\Showtime;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',                     [HomeController::class, 'index'])->name('home');

// Tài khoản
Route::get('/tai-khoan',              [AuthController::class, 'account'])->name('account');

Route::post('/register',            [AuthController::class, 'register'])
    ->middleware('checkLogin')
    ->name('register');

Route::post('/login',               [AuthController::class, 'login'])
    ->middleware('checkLogin')
    ->name('login');

Route::post('/logout',              [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/quen-mat-khau',      [AuthController::class, 'forgotPassword'])
    ->middleware('checkLogin')
    ->name('forgotPassword');

Route::post('/sendResetLinkEmail',  [AuthController::class, 'sendResetLinkEmail'])
    ->middleware('checkLogin')
    ->name('sendResetLinkEmail');

Route::post('/resetPassword',       [AuthController::class, 'resetPassword'])
    ->middleware('checkLogin')
    ->name('resetPassword');

Route::post('/changePassword',      [AuthController::class, 'changePassword'])
    ->name('changePassword');

Route::post('/updateAvatar',        [AuthController::class, 'updateAvatar'])
    ->name('updateAvatar');

Route::post('/updateProfile',        [AuthController::class, 'updateProfile'])
    ->name('updateProfile');

Route::post('/redeem',              [AuthController::class, 'redeem'])
    ->name('rewards.redeem');
// End Tài khoản

// Đăng nhập facebook
Route::prefix('facebook')
    ->name('facebook.')
    ->controller(FacebookController::class)
    ->middleware('checkLogin')
    ->group(function () {
        Route::get('/redirect', 'redirectToFacebook')->name('redirectToFacebook');

        Route::get('/callback', 'handleFacebookCallback')->name('handleFacebookCallback');
    });
// End đăng nhập facebook

// Đăng nhập google
Route::prefix('google')
    ->name('google.')
    ->controller(GoogleController::class)
    ->middleware('checkLogin')
    ->group(function () {
        Route::get('/redirect', 'redirectToGoogle')->name('redirectToGoogle');

        Route::get('/callback', 'handleGoogleCallback')->name('handleGoogleCallback');
    });
// End đăng nhập google

Route::get('tim-kiem', [ListMoviesController::class, 'searchMovies'])->name('search');


// Nạp tiền
Route::post('/processDeposit', [DepositController::class, 'processDeposit'])->name('processDeposit');

Route::get('/vnpayReturn', [DepositController::class, 'vnpayReturn'])->name('vnpayReturn');

Route::get('/momoReturn', [DepositController::class, 'momoReturn'])->name('momoReturn');

Route::get('/zaloPayReturn', [DepositController::class, 'zaloPayReturn'])->name('zaloPayReturn');
// End Nạp tiền

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/email-subscribe', [HomeController::class, 'emailSubscribe'])->name('emailSubscribe');
Route::post('/getTotalMoneyByYear', [AuthController::class, 'getTotalMoneyByYear'])->name('getTotalMoneyByYear');
Route::post('/getTotalMoneyByMonth', [AuthController::class, 'getTotalMoneyByMonth'])->name('getTotalMoneyByMonth');

Route::post('/deleteNotification', [HomeController::class, 'deleteNotification'])->name('deleteNotification');

Route::get('/profile', function () {
    return view('client.pages.profile.info');
});
Route::get('/profile-pass', function () {
    return view('client.pages.profile.change-pass-word');
});
Route::get('/profile-change-info', function () {
    return view('client.pages.profile.change-info');
});
Route::get('/profile-history-ticket', function () {
    return view('client.pages.profile.history-ticket');
});

Route::get('/phim', [ListMoviesController::class, 'movies'])->name('movie');

Route::get('/phim/{slug}', [MovieDetailController::class, 'movieDetail'])->name('movie.detail');

Route::get('/gioi-thieu', [AboutController::class, 'index'])->name('about');
Route::get('/gia-ve', [TicketPriceController::class, 'index'])->name('ticket-price');

Route::get('/dat-ve/{showtime}', [ShowtimeController::class, 'detail'])->name("buy-ticket");

Route::get('/thanh-cong', [BookingController::class, 'paymentSuccess'])->name('thanh-cong');
Route::get('/that-bai', [BookingController::class, 'paymentFailed'])->name('that-bai');

Route::get('/dat-ve/xac-nhan', function () {
    return view('client.pages.payment-verification');
});

Route::get('/dat-ve/thanh-toan', function () {
    return view('client.pages.payment-verification-step2');
});

Route::get('/lien-he', [ContactController::class, 'index'])->name('contact');
Route::post('/submit-contact', [ContactController::class, 'submit'])
    ->middleware('throttle:1,2')
    ->name('submit.contact');

Route::get('/{slug}', [PostController::class, 'list'])->name('post.list');

Route::get('/{cate_slug}/{slug}', [PostController::class, 'detail'])->name('post.detail');


