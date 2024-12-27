<?php

use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\Blocks\BlockController;
use App\Http\Controllers\Admin\Blocks\BlockTypeController;
use App\Http\Controllers\Admin\CategoryPostController;
use App\Http\Controllers\Admin\CinemaController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Events\VoucherController;
use App\Http\Controllers\Admin\Events\RewardController;
use App\Http\Controllers\Admin\Events\RedeemRewardController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\Foods\FoodComboController;
use App\Http\Controllers\Admin\Foods\FoodController;
use App\Http\Controllers\Admin\Foods\FoodTypeController;
use App\Http\Controllers\Admin\Members\ModuleController;
use App\Http\Controllers\Admin\Members\RoleController;
use App\Http\Controllers\Admin\Members\UserController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SeatLayoutController;
use App\Http\Controllers\Admin\SeatTypeController;
use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\Error\Admin\ErrorController;
use Illuminate\Support\Facades\Route;

// Auth Admin

// Namespace Error Admin


Route::group(['prefix' => 'file-manager', 'middleware' => ['web', 'admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::prefix('error')
    ->controller(ErrorController::class)
    ->name('error.')
    ->group(function () {
        Route::get('/404', 'notFound')->name('notFound');
        Route::get('/authorize-error', 'authorizeError')->name('authorize-error');
    });

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/login', [LoginController::class, 'login'])
            ->name('login')
            ->middleware('checkLogin');

        Route::post('/loginSubmit', [LoginController::class, 'loginSubmit'])
            ->name('loginSubmit')
            ->middleware('checkLogin');

        Route::post('/logout', [LoginController::class, 'logout'])
            ->name('logout');

        Route::middleware('admin')
            ->group(function () {

                Route::get('/', [DashboardController::class, 'dashboard'])
                    ->name('dashboard')
                    ->middleware('authorizeAction:viewAny,Dashboard');

                Route::controller(DashboardController::class)
                    ->name('dashboards.')
                    ->group(function () {
                        Route::get('/getRevenueAndTicketData', 'getRevenueAndTicketData')
                            ->name('getRevenueAndTicketData');

                        Route::post('/getAreaByCity', 'getAreaByCity')
                            ->name('getAreaByCity');

                        Route::post('/getCinemaByArea', 'getCinemaByArea')
                            ->name('getCinemaByArea');
                    });

                Route::prefix('systems')
                    ->controller(SystemController::class)
                    ->name('systems.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\System');
                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\System');

                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\System');

                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\System');

                        Route::post('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\System');

                        Route::delete('/{id}/delete', 'delete')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\System');

                        Route::post('/change-order', 'changeOrder')
                            ->name('changeOrder')
                            ->middleware('authorizeAction:changeOrder,App\Models\System');

                        Route::post('/change-active', 'changeActive')
                            ->name('changeActive')
                            ->middleware('authorizeAction:changeActive,App\Models\System');

                        Route::post('/removeAvatarImage', 'removeAvatarImage')
                            ->name('removeAvatarImage');

                        Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                            ->name('deleteItemMultipleChecked')
                            ->middleware('authorizeAction:deleteMultiple,App\Models\System');
                    });

                Route::prefix('room-manager')
                    ->group(function () {
                        Route::prefix('rooms')
                            ->controller(RoomController::class)
                            ->name('rooms.')
                            ->group(function () {
                                Route::get('/', 'index')
                                    ->name('index')
                                    ->middleware('authorizeAction:viewAny,App\Models\Room');

                                Route::get('/create', 'create')
                                    ->name('create')
                                    ->middleware('authorizeAction:create,App\Models\Room');

                                Route::post('/store', 'store')
                                    ->name('store')
                                    ->middleware('authorizeAction:create,App\Models\Room');

                                Route::get('/{room}/edit', 'edit')->name('edit')
                                    ->middleware('authorizeAction:update,App\Models\Room');

                                Route::post('/{room}/update', 'update')->name('update')
                                    ->middleware('authorizeAction:update,App\Models\Room');

                                Route::delete('/{room}', 'destroy')->name('destroy')
                                    ->middleware('authorizeAction:delete,App\Models\Room');
                            });
                        Route::prefix('seat-layouts')
                            ->controller(SeatLayoutController::class)
                            ->name('seat-layouts.')
                            ->group(function () {
                                Route::get('/', 'index')
                                    ->name('index')
                                    ->middleware('authorizeAction:viewAny,App\Models\SeatLayout');
                                Route::get('/create', 'create')
                                    ->name('create')
                                    ->middleware('authorizeAction:create,App\Models\SeatLayout');
                                Route::post('/store', 'store')
                                    ->name('store')
                                    ->middleware('authorizeAction:create,App\Models\SeatLayout');
                                Route::get('/{seatLayout}/edit', 'edit')
                                    ->name('edit')
                                    ->middleware('authorizeAction:update,App\Models\SeatLayout');
                                Route::post('/{seatLayout}/update', 'update')
                                    ->name('update')
                                    ->middleware('authorizeAction:update,App\Models\SeatLayout');
                                Route::delete('{seatLayout}', 'destroy')
                                    ->name('destroy')
                                    ->middleware('authorizeAction:delete,App\Models\SeatLayout');;
                            });

                        Route::prefix('seat-types')
                            ->controller(SeatTypeController::class)
                            ->name('seat-types.')
                            ->group(function () {
                                Route::get('/', 'index')
                                    ->name('index')
                                    ->middleware('authorizeAction:viewAny,App\Models\SeatType');
                                Route::get('/create', 'create')
                                    ->name('create')
                                    ->middleware('authorizeAction:create,App\Models\SeatType');
                                Route::post('/store', 'store')
                                    ->name('store')
                                    ->middleware('authorizeAction:create,App\Models\SeatType');
                                Route::get('/{seatType}/edit', 'edit')
                                    ->name('edit')
                                    ->middleware('authorizeAction:update,App\Models\SeatType');
                                Route::post('/{seatType}/update', 'update')
                                    ->name('update')
                                    ->middleware('authorizeAction:update,App\Models\SeatType');
                                Route::delete('{seatType}', 'destroy')
                                    ->name('destroy')
                                    ->middleware('authorizeAction:destroy,App\Models\SeatType');
                            });
                    });

                Route::prefix('menus')
                    ->controller(MenuController::class)
                    ->name('menus.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\Menu');

                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\Menu');

                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\Menu');

                        Route::get('/delete', 'delete')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\Menu');
                    });

                Route::prefix('pages')
                    ->controller(PageController::class)
                    ->name('pages.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\Page');

                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\Page');

                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\Page');

                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\Page');

                        Route::post('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\Page');

                        Route::delete('/{id}/delete', 'delete')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\Page');

                        Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                            ->name('deleteItemMultipleChecked')
                            ->middleware('authorizeAction:deleteMultiple,App\Models\Page');
                    });

                Route::prefix('blocks')
                    ->controller(BlockController::class)
                    ->name('blocks.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\Block');

                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\Block');

                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\Block');

                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\Block');

                        Route::post('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\Block');

                        Route::delete('/{id}/delete', 'delete')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\Block');

                        Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                            ->name('deleteItemMultipleChecked')
                            ->middleware('authorizeAction:deleteMultiple,App\Models\Block');
                    });

                Route::prefix('blockTypes')
                    ->controller(BlockTypeController::class)
                    ->name('blockTypes.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\BlockType');

                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\BlockType');

                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\BlockType');

                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\BlockType');

                        Route::post('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\BlockType');

                        Route::delete('/{id}/delete', 'delete')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\BlockType');

                        Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                            ->name('deleteItemMultipleChecked')
                            ->middleware('authorizeAction:deleteMultiple,App\Models\BlockType');
                    });

                Route::prefix('categoryPosts')
                    ->controller(CategoryPostController::class)
                    ->name('categoryPosts.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\CategoryPost');

                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\CategoryPost');

                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\CategoryPost');

                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\CategoryPost');

                        Route::post('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\CategoryPost');

                        Route::delete('/{id}/delete', 'delete')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\CategoryPost');

                        Route::post('/change-order', 'changeOrder')
                            ->name('changeOrder')
                            ->middleware('authorizeAction:changeOrder,App\Models\CategoryPost');

                        Route::post('/change-position', 'changePosition')
                            ->name('changePosition')
                            ->middleware('authorizeAction:changePosition,App\Models\CategoryPost');

                        Route::post('/removeAvatarImage', 'removeAvatarImage')
                            ->name('removeAvatarImage');

                        Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                            ->name('deleteItemMultipleChecked')
                            ->middleware('authorizeAction:deleteMultiple,App\Models\CategoryPost');
                    });

                Route::prefix('posts')
                    ->controller(PostController::class)
                    ->name('posts.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\Post');

                        Route::post('/send-promotion', 'sendPromotion')
                            ->name('sendPromotion')
                            ->middleware('authorizeAction:sendPromotion,App\Models\Post');

                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\Post');

                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\Post');

                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\Post');

                        Route::post('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\Post');

                        Route::delete('/{id}/delete', 'delete')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\Post');

                        Route::post('/change-order', 'changeOrder')
                            ->name('changeOrder')
                            ->middleware('authorizeAction:changeOrder,App\Models\Post');

                        Route::post('/change-hot', 'changeHot')
                            ->name('changeHot')
                            ->middleware('authorizeAction:changeHot,App\Models\Post');

                        Route::post('/change-active', 'changeActive')
                            ->name('changeActive')
                            ->middleware('authorizeAction:changeActive,App\Models\Post');

                        Route::post('/change-status', 'changeStatus')
                            ->name('changeStatus')
                            ->middleware('authorizeAction:changeStatus,App\Models\Post');

                        Route::delete('/destroyImage/{id}', 'destroyImage')
                            ->name('destroyImage');

                        Route::post('/removeAvatarImage', 'removeAvatarImage')
                            ->name('removeAvatarImage');

                        Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                            ->name('deleteItemMultipleChecked')
                            ->middleware('authorizeAction:deleteMultiple,App\Models\Post');

                        Route::post('/saveTemporary', 'saveTemporary')
                            ->name('saveTemporary');

                        Route::post('/preview', 'preview')
                            ->name('preview');

                        Route::get('/preview/view', 'showPreview')
                            ->name('preview.view');

                        Route::get('/{id}/copy', 'copy')
                            ->name('copy')
                            ->middleware('authorizeAction:copy,App\Models\Post');

                        Route::post('/copy', 'storeCopy')
                            ->name('storeCopy')
                            ->middleware('authorizeAction:copy,App\Models\Post');
                    });

                Route::prefix('tags')
                    ->controller(TagController::class)
                    ->name('tags.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\Tag');

                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\Tag');

                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\Tag');

                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\Tag');

                        Route::post('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\Tag');

                        Route::delete('/{id}/delete', 'delete')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\Tag');

                        Route::post('/change-order', 'changeOrder')
                            ->name('changeOrder')
                            ->middleware('authorizeAction:changeOrder,App\Models\Tag');

                        Route::post('/change-active', 'changeActive')
                            ->name('changeActive')
                            ->middleware('authorizeAction:changeActive,App\Models\Tag');

                        Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                            ->name('deleteItemMultipleChecked')
                            ->middleware('authorizeAction:deleteMultiple,App\Models\Tag');
                    });

                Route::prefix('genres-movie')
                    ->controller(GenreController::class)
                    ->name('genres.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\Genre');

                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\Genre');

                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\Genre');

                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\Genre');

                        Route::post('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\Genre');

                        Route::delete('/{id}/delete', 'delete')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\Genre');

                        Route::post('/change-order', 'changeOrder')
                            ->name('changeOrder')
                            ->middleware('authorizeAction:changeOrder,App\Models\Genre');

                        Route::post('/change-position', 'changePosition')
                            ->name('changePosition')
                            ->middleware('authorizeAction:changePosition,App\Models\Genre');

                        Route::post('/removeAvatarImage', 'removeAvatarImage')
                            ->name('removeAvatarImage');

                        Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                            ->name('deleteItemMultipleChecked')
                            ->middleware('authorizeAction:deleteMultiple,App\Models\Genre');
                    });

                Route::prefix('movie')
                    ->controller(MovieController::class)
                    ->name('movies.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\Movie');

                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\Movie');

                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\Movie');

                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\Movie');

                        Route::put('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\Movie');

                        Route::delete('/{id}/delete', 'delete')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\Movie');

                        Route::post('/change-order', 'changeOrder')
                            ->name('changeOrder')
                            ->middleware('authorizeAction:changeOrder,App\Models\Movie');

                        Route::post('/change-active', 'changeActive')
                            ->name('changeActive')
                            ->middleware('authorizeAction:changeActive,App\Models\Movie');

                        Route::post('/change-hot', 'changeHot')
                            ->name('changeHot')
                            ->middleware('authorizeAction:changeHot,App\Models\Movie');

                        Route::post('/removeAvatarImage', 'removeAvatarImage')
                            ->name('removeAvatarImage')
                            ->middleware('authorizeAction:update,App\Models\Movie');

                        Route::post('/removeBannerImage', 'removeBannerImage')
                            ->name('removeBannerImage')
                            ->middleware('authorizeAction:update,App\Models\Movie');

                        Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                            ->name('deleteItemMultipleChecked')
                            ->middleware('authorizeAction:viewAny,App\Models\Movie');
                        Route::post('/getAreaByCity', 'getAreaByCity')
                            ->name('getAreaByCity');

                        Route::post('/getCinemaByArea', 'getCinemaByArea')
                            ->name('getCinemaByArea');
                    });

                Route::prefix('actors')
                ->controller(ActorController::class)
                ->name('actors.')
                ->group(function () {
                    Route::get('/', 'index')
                        ->name('index')
                        ->middleware('authorizeAction:viewAny,App\Models\Actor');

                    Route::get('/create', 'create')
                        ->name('create')
                        ->middleware('authorizeAction:create,App\Models\Actor');

                    Route::post('/store', 'store')
                        ->name('store')
                        ->middleware('authorizeAction:create,App\Models\Actor');

                    Route::get('/{id}/edit', 'edit')
                        ->name('edit')
                        ->middleware('authorizeAction:update,App\Models\Actor');

                    Route::put('/{id}/update', 'update')
                        ->name('update')
                        ->middleware('authorizeAction:update,App\Models\Actor');

                    Route::delete('/{id}/delete', 'destroy')
                        ->name('delete')
                        ->middleware('authorizeAction:delete,App\Models\Actor');

                    Route::post('/removeAvatarImage', 'removeAvatarImage')
                        ->name('removeAvatarImage')
                        ->middleware('authorizeAction:update,App\Models\Actor');

                    Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                        ->name('deleteItemMultipleChecked')
                        ->middleware('authorizeAction:deleteMultiple,App\Models\Actor');
                });

                Route::prefix('users')
                    ->controller(UserController::class)
                    ->name('users.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\User');

                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\User');

                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\User');

                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\User');

                        Route::post('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\User');

                        Route::delete('/{id}/delete', 'delete')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\User');

                        Route::post('/removeAvatarImage', 'removeAvatarImage')
                            ->name('removeAvatarImage');

                        Route::post('/change-status', 'changeStatus')
                            ->name('changeStatus')
                            ->middleware('authorizeAction:changeStatus,App\Models\User');
                    });

                Route::prefix('roles')
                    ->controller(RoleController::class)
                    ->name('roles.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\Role');

                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\Role');

                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\Role');

                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\Role');

                        Route::post('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\Role');

                        Route::delete('/{id}/delete', 'delete')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\Role');

                        Route::post('/removeAvatarImage', 'removeAvatarImage')
                            ->name('removeAvatarImage')
                            ->middleware('authorizeAction:update,App\Models\Role');
                    });

                Route::prefix('modules')
                    ->controller(ModuleController::class)
                    ->name('modules.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\Module');

                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\Module');

                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\Module');

                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\Module');

                        Route::post('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\Module');

                        Route::delete('/{id}/delete', 'delete')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\Module');

                        Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                            ->name('deleteItemMultipleChecked')
                            ->middleware('authorizeAction:deleteMultiple,App\Models\Module');
                    });

                Route::prefix('foods')
                    ->controller(FoodController::class)
                    ->name('foods.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\Food');
                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\Food');
                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\Food');
                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\Food');
                        Route::put('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\Food');
                        Route::delete('/{id}/delete', 'destroy')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\Food');
                        Route::post('/change-order', 'changeOrder')
                            ->name('changeOrder')
                            ->middleware('authorizeAction:changeOrder,App\Models\Food');
                        Route::post('/change-active', 'changeActive')
                            ->name('changeActive')
                            ->middleware('authorizeAction:changeActive,App\Models\Food');
                        Route::post('/removeAvatarImage', 'removeAvatarImage')
                            ->name('removeAvatarImage');
                        Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                            ->name('deleteItemMultipleChecked')
                            ->middleware('authorizeAction:deleteMultiple,App\Models\Post');
                    });

                Route::prefix('food-types')
                    ->controller(FoodTypeController::class)
                    ->name('food-types.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\FoodType');
                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\FoodType');
                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\FoodType');
                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\FoodType');
                        Route::put('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\FoodType');
                        Route::delete('/{id}/delete', 'destroy')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\FoodType');
                        Route::post('/change-order', 'changeOrder')
                            ->name('changeOrder')
                            ->middleware('authorizeAction:changeActive,App\Models\FoodType');
                        Route::post('/change-active', 'changeActive')
                            ->name('changeActive')
                            ->middleware('authorizeAction:viewAny,App\Models\FoodType');
                        Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                            ->name('deleteItemMultipleChecked')
                            ->middleware('authorizeAction:deleteMultiple,App\Models\FoodType');
                    });

                // Route::prefix('food-combos')
                //     ->controller(FoodComboController::class)
                //     ->name('food-combos.')
                //     ->group(function () {
                //         Route::get('/', 'index')
                //             ->name('index')
                //             ->middleware('authorizeAction:viewAny,App\Models\FoodCombo');
                //         Route::get('/create', 'create')
                //             ->name('create')
                //             ->middleware('authorizeAction:create,App\Models\FoodCombo');
                //         Route::post('/store', 'store')
                //             ->name('store')
                //             ->middleware('authorizeAction:create,App\Models\FoodCombo');
                //         Route::get('/{id}/edit', 'edit')
                //             ->name('edit')
                //             ->middleware('authorizeAction:update,App\Models\FoodCombo');
                //         Route::put('/{id}/update', 'update')
                //             ->name('update')
                //             ->middleware('authorizeAction:update,App\Models\FoodCombo');
                //         Route::delete('/{id}/delete', 'destroy')
                //             ->name('delete')
                //             ->middleware('authorizeAction:delete,App\Models\FoodCombo');
                //         Route::post('/change-order', 'changeOrder')
                //             ->name('changeOrder')
                //             ->middleware('authorizeAction:viewAny,App\Models\FoodCombo');
                //         Route::post('/change-active', 'changeActive')
                //             ->name('changeActive')
                //             ->middleware('authorizeAction:viewAny,App\Models\FoodCombo');
                //         Route::post('/removeAvatarImage', 'removeAvatarImage')
                //             ->name('removeAvatarImage');
                //         Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                //             ->name('deleteItemMultipleChecked')
                //             ->middleware('authorizeAction:deleteMultiple,App\Models\FoodCombo');
                //     });

                Route::prefix('cities')
                    ->controller(CityController::class)
                    ->name('cities.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\City');
                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\City');
                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\City');
                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\City');
                        Route::put('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\City');
                        Route::delete('/{id}/delete', 'destroy')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\City');
                    });

                Route::prefix('areas')
                    ->controller(AreaController::class)
                    ->name('areas.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\Area');
                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\Area');
                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\Area');
                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\Area');
                        Route::put('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\Area');
                        Route::delete('/{id}/delete', 'destroy')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\Area');
                    });

                Route::prefix('payments')
                    ->controller(PaymentController::class)
                    ->name('payments.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\Payment');
                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\Payment');
                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\Payment');
                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\Payment');
                        Route::put('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\Payment');
                        Route::delete('/{id}/delete', 'delete')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\Payment');
                        Route::post('/change-active', 'changeActive')
                            ->name('changeActive')
                            ->middleware('authorizeAction:changeActive,App\Models\Payment');
                        Route::post('/removeAvatarImage', 'removeAvatarImage')
                            ->name('removeAvatarImage')
                            ->middleware('authorizeAction:update,App\Models\Payment');
                    });

                Route::prefix('redeem-rewards')
                    ->controller(RedeemRewardController::class)
                    ->name('redeemRewards.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\UserReward');
                        Route::post('/change-status', 'changeStatus')
                            ->name('changeStatus')
                            ->middleware('authorizeAction:changeStatus,App\Models\UserReward');
                    });

                Route::prefix('rewards')
                    ->controller(RewardController::class)
                    ->name('rewards.')
                    ->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/create', 'create')
                            ->middleware('authorizeAction:create,App\Models\Reward')
                            ->name('create');
                        Route::post('/store', 'store')
                            ->middleware('authorizeAction:create,App\Models\Reward')
                            ->name('store');
                        Route::get('/{id}/edit', 'edit')
                            ->middleware('authorizeAction:update,App\Models\Reward')
                            ->name('edit');
                        Route::put('/{id}/update', 'update')
                            ->middleware('authorizeAction:update,App\Models\Reward')
                            ->name('update');
                        Route::delete('/{id}/delete', 'destroy')
                            ->middleware('authorizeAction:delete,App\Models\Reward')
                            ->name('delete');
                        Route::post('/change-active', 'changeActive')
                            ->name('changeActive');
                        Route::post('/removeAvatarImage', 'removeAvatarImage')
                            ->middleware('authorizeAction:update,App\Models\Reward')
                            ->name('removeAvatarImage');
                        Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                            ->middleware('authorizeAction:deleteMultiple,App\Models\Reward')
                            ->name('deleteItemMultipleChecked');
                    });

                Route::prefix('vouchers')
                    ->controller(VoucherController::class)
                    ->name('vouchers.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->middleware('authorizeAction:viewAny,App\Models\Voucher')
                            ->name('index');
                        Route::get('/create', 'create')
                            ->middleware('authorizeAction:create,App\Models\Voucher')
                            ->name('create');
                        Route::post('/store', 'store')
                            ->middleware('authorizeAction:create,App\Models\Voucher')
                            ->name('store');
                        Route::get('/{id}/edit', 'edit')
                            ->middleware('authorizeAction:update,App\Models\Voucher')
                            ->name('edit');
                        Route::put('/{id}/update', 'update')
                            ->middleware('authorizeAction:update,App\Models\Voucher')
                            ->name('update');
                        Route::delete('/{id}/delete', 'destroy')
                            ->middleware('authorizeAction:delete,App\Models\Voucher')
                            ->name('delete');
                        Route::post('/gift', 'getAccountByVoucher')
                            ->name('getAccountByVoucher');
                        Route::post('/gift-voucher-account', 'giftVoucherAccount')
                            ->middleware('authorizeAction:giftVoucher,App\Models\Voucher')
                            ->name('giftVoucherAccount');
                        Route::post('/search-users', 'searchUser')
                            ->name('searchUser');
                            Route::post('/change-active', 'changeActive')
                            ->name('changeActive');
                        Route::post('/removeAvatarImage', 'removeAvatarImage')
                            ->middleware('authorizeAction:update,App\Models\Voucher')
                            ->name('removeAvatarImage');
                        Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                            ->middleware('authorizeAction:deleteMultiple,App\Models\Voucher')
                            ->name('deleteItemMultipleChecked');
                    });

                Route::prefix('cinemas')
                    ->controller(CinemaController::class)
                    ->name('cinemas.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\Cinema');
                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\Cinema');
                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\Cinema');
                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\Cinema');
                        Route::put('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\Cinema');
                        Route::delete('/{id}/delete', 'destroy')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\Cinema');
                        Route::post('/change-active', 'changeActive')
                            ->name('changeActive')
                            ->middleware('authorizeAction:changeActive,App\Models\Cinema');
                        Route::post('/removeAvatarImage', 'removeAvatarImage')
                            ->name('removeAvatarImage')
                            ->middleware('authorizeAction:update,App\Models\Cinema');
                        Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                            ->name('deleteItemMultipleChecked')
                            ->middleware('authorizeAction:deleteMultiple,App\Models\Cinema');
                        Route::get('/get-areas-by-cityId', 'ajaxGetAreaByCityId')
                            ->name('ajaxGetAreaByCityId');
                    });

                Route::prefix('orders')
                    ->controller(OrderController::class)
                    ->name('orders.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\Booking');
                        Route::post('/{id}/change-status', 'changeStatus')
                            ->name('changeStatus');
                        Route::post('/{id}/change-refund-status', 'changeRefundStatus')
                            ->name('changeRefundStatus');
                        Route::post('/{id}/change-get-ticket', 'changeGetTickets')
                            ->name('changeGetTickets');
                        Route::post('/change-many-tickets', 'changeManyTickets')
                            ->name('changeManyTickets');
                    });

                Route::prefix('notifications')
                    ->controller(NotificationController::class)
                    ->name('notifications.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\Notification');

                        Route::get('/create', 'create')
                            ->name('create')
                            ->middleware('authorizeAction:create,App\Models\Notification');

                        Route::post('/store', 'store')
                            ->name('store')
                            ->middleware('authorizeAction:create,App\Models\Notification');

                        Route::get('/{id}/edit', 'edit')
                            ->name('edit')
                            ->middleware('authorizeAction:update,App\Models\Notification');

                        Route::put('/{id}/update', 'update')
                            ->name('update')
                            ->middleware('authorizeAction:update,App\Models\Notification');

                        Route::delete('/{id}/delete', 'destroy')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\Notification');

                        Route::post('/delete-item-multiple-checked', 'deleteItemMultipleChecked')
                            ->name('deleteItemMultipleChecked')
                            ->middleware('authorizeAction:deleteMultiple,App\Models\Notification');

                        Route::get('/get-by-cinema', 'getByCinemaId')
                            ->name('getByCinemaId');

                        Route::get('/get-by-type', 'getByType')
                            ->name('getByType');
                    });

                Route::prefix('contacts')
                    ->controller(ContactController::class)
                    ->name('contacts.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index')
                            ->middleware('authorizeAction:viewAny,App\Models\Contact');
                        Route::delete('/{id}/delete', 'destroy')
                            ->name('delete')
                            ->middleware('authorizeAction:delete,App\Models\Contact');
                    });
            });
    });
