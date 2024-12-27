<?php

namespace App\Providers\Admin;

use App\Models\System;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class BreadcrumbServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        View::composer('admin.*', function ($view) {
            $routeName = Route::currentRouteName();

            $breadcrumbs = [
                ['title' => __('language.admin.home'), 'url' => route('admin.dashboard')],
            ];

            switch ($routeName) {
                    // Dashboard
                case 'admin.dashboard':
                    $breadcrumbs[] = ['title' => __('language.admin.dashboard'), 'url' => route('admin.dashboard')];
                    break;


                    // Posts
                case 'admin.posts.index':
                    $breadcrumbs[] = ['title' => __('language.admin.posts.list'), 'url' => route('admin.posts.index')];
                    break;
                case 'admin.posts.create':
                    $breadcrumbs[] = ['title' => __('language.admin.posts.list'), 'url' => route('admin.posts.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.posts.create'), 'url' => route('admin.posts.create')];
                    break;
                case 'admin.posts.edit':
                    $breadcrumbs[] = ['title' => __('language.admin.posts.list'), 'url' => route('admin.posts.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.posts.edit'), 'url' => route('admin.posts.edit', request()->id)];
                    break;

                    // Category Posts
                case 'admin.categoryPosts.index':
                    $breadcrumbs[] = ['title' => __('language.admin.categoryPosts.list'), 'url' => route('admin.categoryPosts.index')];
                    break;
                case 'admin.categoryPosts.create':
                    $breadcrumbs[] = ['title' => __('language.admin.categoryPosts.list'), 'url' => route('admin.categoryPosts.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.categoryPosts.create'), 'url' => route('admin.categoryPosts.create')];
                    break;
                case 'admin.categoryPosts.edit':
                    $breadcrumbs[] = ['title' => __('language.admin.categoryPosts.list'), 'url' => route('admin.categoryPosts.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.categoryPosts.edit'), 'url' => route('admin.categoryPosts.edit', request()->id)];
                    break;

                    // genres
                case 'admin.genres.index':
                    $breadcrumbs[] = ['title' => __('language.admin.genres.list'), 'url' => route('admin.genres.index')];
                    break;
                case 'admin.genres.create':
                    $breadcrumbs[] = ['title' => __('language.admin.genres.list'), 'url' => route('admin.genres.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.genres.create'), 'url' => route('admin.genres.create')];
                    break;
                case 'admin.genres.edit':
                    $breadcrumbs[] = ['title' => __('language.admin.genres.list'), 'url' => route('admin.genres.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.genres.edit'), 'url' => route('admin.genres.edit', request()->id)];
                    break;

                case 'admin.movies.index':
                    $breadcrumbs[] = ['title' => __('language.admin.movies.list'), 'url' => route('admin.movies.index')];
                    break;
                case 'admin.movies.create':
                    $breadcrumbs[] = ['title' => __('language.admin.movies.list'), 'url' => route('admin.movies.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.movies.create'), 'url' => route('admin.movies.create')];
                    break;
                case 'admin.movies.edit':
                    $breadcrumbs[] = ['title' => __('language.admin.movies.list'), 'url' => route('admin.movies.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.movies.edit'), 'url' => route('admin.movies.edit', request()->id)];
                    break;

                    // Tags
                case 'admin.tags.index':
                    $breadcrumbs[] = ['title' => __('language.admin.tags.list'), 'url' => route('admin.tags.index')];
                    break;
                case 'admin.tags.create':
                    $breadcrumbs[] = ['title' => __('language.admin.tags.list'), 'url' => route('admin.tags.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.tags.create'), 'url' => route('admin.tags.create')];
                    break;
                case 'admin.tags.edit':
                    $breadcrumbs[] = ['title' => __('language.admin.tags.list'), 'url' => route('admin.tags.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.tags.edit'), 'url' => route('admin.tags.edit', request()->id)];
                    break;

                    // Systems
                case 'admin.systems.index':
                    $breadcrumbs[] = ['title' => __('language.admin.systems.title'), 'url' => route('admin.tags.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.systems.list'), 'url' => route('admin.systems.index')];

                    if (request()->has('system_id')) {
                        $system = System::find(request()->system_id);

                        // Tạo một mảng tạm để lưu các hệ thống theo thứ tự ngược lại (từ con lên cha)
                        $tempBreadcrumbs = [];

                        // Bắt đầu từ hệ thống hiện tại và tìm cha của nó cho đến khi không còn cha nữa
                        while ($system) {
                            $tempBreadcrumbs[] = [
                                'title' => $system->name,
                                'url' => route('admin.systems.index', ['system_id' => $system->id])
                            ];
                            $system = $system->parent; // Lấy hệ thống cha
                        }

                        // Đảo ngược mảng tạm để có đúng thứ tự từ cha đến con
                        $tempBreadcrumbs = array_reverse($tempBreadcrumbs);

                        // Gộp mảng tạm vào mảng breadcrumbs chính
                        $breadcrumbs = array_merge($breadcrumbs, $tempBreadcrumbs);
                    }

                    break;

                case 'admin.systems.create':
                    $breadcrumbs[] = ['title' => __('language.admin.systems.title'), 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => __('language.admin.systems.list'), 'url' => route('admin.systems.index')];

                    if (request()->has('system_id')) {
                        $system = System::find(request()->system_id);

                        // Tạo một mảng tạm để lưu các hệ thống theo thứ tự ngược lại (từ con lên cha)
                        $tempBreadcrumbs = [];

                        // Bắt đầu từ hệ thống hiện tại và tìm cha của nó cho đến khi không còn cha nữa
                        while ($system) {
                            $tempBreadcrumbs[] = [
                                'title' => $system->name,
                                'url' => route('admin.systems.create', ['system_id' => $system->id])
                            ];
                            $system = $system->parent; // Lấy hệ thống cha
                        }

                        // Đảo ngược mảng tạm để có đúng thứ tự từ cha đến con
                        $tempBreadcrumbs = array_reverse($tempBreadcrumbs);

                        // Gộp mảng tạm vào mảng breadcrumbs chính
                        $breadcrumbs = array_merge($breadcrumbs, $tempBreadcrumbs);
                    }

                    $breadcrumbs[] = ['title' => __('language.admin.systems.create'), 'url' => route('admin.systems.create')];

                    break;

                case 'admin.systems.edit':
                    $breadcrumbs[] = ['title' => __('language.admin.systems.title'), 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => __('language.admin.systems.list'), 'url' => route('admin.systems.index')];

                    if (request()->has('system_id')) {
                        $system = System::find(request()->system_id);

                        // Tạo một mảng tạm để lưu các hệ thống theo thứ tự ngược lại (từ con lên cha)
                        $tempBreadcrumbs = [];

                        // Bắt đầu từ hệ thống hiện tại và tìm cha của nó cho đến khi không còn cha nữa
                        while ($system) {
                            $tempBreadcrumbs[] = [
                                'title' => $system->name,
                                'url' => route('admin.systems.create', ['system_id' => $system->id])
                            ];
                            $system = $system->parent; // Lấy hệ thống cha
                        }

                        // Đảo ngược mảng tạm để có đúng thứ tự từ cha đến con
                        $tempBreadcrumbs = array_reverse($tempBreadcrumbs);

                        // Gộp mảng tạm vào mảng breadcrumbs chính
                        $breadcrumbs = array_merge($breadcrumbs, $tempBreadcrumbs);
                    }

                    $breadcrumbs[] = ['title' => __('language.admin.systems.edit'), 'url' => route('admin.systems.edit', request()->id)];
                    break;

                    // Menus
                case 'admin.menus.index':
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.menus.title'), 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.menus.name'), 'url' => route('admin.menus.index')];
                    break;
                case 'admin.menus.create':
                    $breadcrumbs[] = ['title' => 'Danh sách menu', 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => 'Thêm menu', 'url' => route('admin.menus.create')];
                    break;
                case 'admin.menus.edit':
                    $breadcrumbs[] = ['title' => 'Danh sách menu', 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => 'Cập nhật menu', 'url' => route('admin.menus.edit', request()->id)];
                    break;

                    // Pages
                case 'admin.pages.index':
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.pages.title'), 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.pages.list'), 'url' => route('admin.pages.index')];
                    break;
                case 'admin.pages.create':
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.pages.title'), 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.pages.list'), 'url' => route('admin.pages.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.pages.add'), 'url' => route('admin.pages.create')];
                    break;
                case 'admin.pages.edit':
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.pages.title'), 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.pages.list'), 'url' => route('admin.pages.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.pages.edit'), 'url' => route('admin.pages.edit', request()->id)];
                    break;

                    // Blocks
                case 'admin.blocks.index':
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.blocks.title'), 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.blocks.list'), 'url' => route('admin.blocks.index')];
                    break;
                case 'admin.blocks.create':
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.blocks.title'), 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.blocks.list'), 'url' => route('admin.blocks.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.blocks.add'), 'url' => route('admin.blocks.create')];
                    break;
                case 'admin.blocks.edit':
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.blocks.title'), 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.blocks.list'), 'url' => route('admin.blocks.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.blocks.edit'), 'url' => route('admin.blocks.edit', request()->id)];

                    break;

                    // Block Types
                case 'admin.blockTypes.index':
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.blockTypes.title'), 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.blockTypes.list'), 'url' => route('admin.blockTypes.index')];
                    break;
                case 'admin.blockTypes.create':
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.blockTypes.title'), 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.blockTypes.list'), 'url' => route('admin.blockTypes.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.blockTypes.create'), 'url' => route('admin.blockTypes.create')];
                    break;
                case 'admin.blockTypes.edit':
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.blockTypes.title'), 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.blockTypes.list'), 'url' => route('admin.blockTypes.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.interfaces.blockTypes.edit'), 'url' => route('admin.blockTypes.edit', request()->id)];
                    break;

                    // contacts
                case 'admin.roles.index':
                    $breadcrumbs[] = ['title' => __('language.admin.members.title'), 'url' => '#'];
                    $breadcrumbs[] = ['title' => __('language.admin.members.roles.title'), 'url' => route('admin.roles.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.members.roles.list'), 'url' => route('admin.roles.index')];
                    break;
                case 'admin.roles.create':
                    $breadcrumbs[] = ['title' => __('language.admin.members.title'), 'url' => '#'];
                    $breadcrumbs[] = ['title' => __('language.admin.members.roles.title'), 'url' => route('admin.roles.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.members.roles.list'), 'url' => route('admin.roles.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.members.roles.create'), 'url' => route('admin.roles.create')];
                    break;

                    // contacts
                case 'admin.contacts.index':
                    $breadcrumbs[] = ['title' => __('language.admin.contacts.title'), 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => __('language.admin.contacts.list'), 'url' => route('admin.contacts.index')];
                    break;

                    // Languages
                case 'admin.languages.index':
                    $breadcrumbs[] = ['title' => __('language.admin.settings.languages.title'), 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => __('language.admin.settings.languages.list'), 'url' => route('admin.languages.index')];
                    break;
                case 'admin.languages.create':
                    $breadcrumbs[] = ['title' => __('language.admin.settings.languages.title'), 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => __('language.admin.settings.languages.list'), 'url' => route('admin.languages.index')];
                    $breadcrumbs[] = ['title' => __('language.admin.settings.languages.create'), 'url' => route('admin.languages.create')];
                    break;
                case 'admin.languages.edit':
                    $breadcrumbs[] = ['title' => __('language.admin.settings.languages.title'), 'url' => route('admin.dashboard')];
                    $breadcrumbs[] = ['title' => __('language.admin.settings.languages.list'), 'url' => route('admin.languages.edit', request()->id)];
                    $breadcrumbs[] = ['title' => __('language.admin.settings.languages.edit'), 'url' => route('admin.languages.edit', request()->id)];
                    break;
                    //Cities
                case 'admin.cities.index':
                    $breadcrumbs[] = ['title' => 'Thành phố', 'url' => ''];
                    $breadcrumbs[] = ['title' => 'Danh sách thành phố', 'url' => route('admin.cities.index')];
                    break;
                case 'admin.cities.create':
                    $breadcrumbs[] = ['title' => 'Thành phố', 'url' => route('admin.cities.index')];
                    $breadcrumbs[] = ['title' => 'Thêm mới thành phố', 'url' => route('admin.cities.create')];
                    break;
                case 'admin.cities.edit':
                    $breadcrumbs[] = ['title' => 'Thành phố', 'url' => route('admin.cities.index')];
                    $breadcrumbs[] = ['title' => 'Chỉnh sửa thành phố', 'url' => route('admin.cities.edit', request()->id)];
                    break;
                    //Areas
                case 'admin.areas.index':
                    $breadcrumbs[] = ['title' => 'Khu vực', 'url' => ''];
                    $breadcrumbs[] = ['title' => 'Danh sách khu vực', 'url' => route('admin.areas.index')];
                    break;
                case 'admin.areas.create':
                    $breadcrumbs[] = ['title' => 'Khu vực', 'url' => route('admin.areas.index')];
                    $breadcrumbs[] = ['title' => 'Thêm mới khu vực', 'url' => route('admin.areas.create')];
                    break;
                case 'admin.areas.edit':
                    $breadcrumbs[] = ['title' => 'Khu vực', 'url' => route('admin.areas.index')];
                    $breadcrumbs[] = ['title' => 'Chỉnh sửa khu vực', 'url' => route('admin.areas.edit', request()->id)];
                    break;
                    // Foods

                case 'admin.foods.index':
                    $breadcrumbs[] = ['title' => 'Đồ ăn', 'url' => ''];
                    $breadcrumbs[] = ['title' => 'Danh sách đồ ăn', 'url' => route('admin.foods.index')];
                    break;
                case 'admin.foods.create':
                    $breadcrumbs[] = ['title' => 'Đồ ăn', 'url' => route('admin.foods.index')];
                    $breadcrumbs[] = ['title' => 'Thêm mới đồ ăn', 'url' => route('admin.foods.create')];
                    break;

                case 'admin.foods.edit':
                    $breadcrumbs[] = ['title' => 'Đồ ăn', 'url' => route('admin.foods.index')];
                    $breadcrumbs[] = ['title' => 'Chỉnh sửa đồ ăn', 'url' => route('admin.foods.edit', request()->id)];
                    break;
                    // Food-types
                case 'admin.food-types.index':
                    $breadcrumbs[] = ['title' => 'Loại đồ ăn', 'url' => ''];
                    $breadcrumbs[] = ['title' => 'Danh sách loại đồ ăn', 'url' => route('admin.food-types.index')];
                    break;
                case 'admin.food-types.create':
                    $breadcrumbs[] = ['title' => 'Loại đồ ăn', 'url' => route('admin.food-types.index')];
                    $breadcrumbs[] = ['title' => 'Thêm mới loại đồ ăn', 'url' => route('admin.food-types.create')];
                    break;
                case 'admin.food-types.edit':
                    $breadcrumbs[] = ['title' => 'Loại đồ ăn', 'url' => route('admin.food-types.index')];
                    $breadcrumbs[] = ['title' => 'Chỉnh sửa loại đồ ăn', 'url' => route('admin.food-types.edit', request()->id)];
                    break;
                    // Foods
                case 'admin.food-combos.index':
                    $breadcrumbs[] = ['title' => 'Combo', 'url' => ''];
                    $breadcrumbs[] = ['title' => 'Danh sách combo ', 'url' => route('admin.food-combos.index')];
                    break;
                case 'admin.food-combos.create':
                    $breadcrumbs[] = ['title' => 'Combo', 'url' => route('admin.food-combos.index')];
                    $breadcrumbs[] = ['title' => 'Thêm mới combo', 'url' => route('admin.food-combos.create')];
                    break;
                case 'admin.food-combos.edit':
                    $breadcrumbs[] = ['title' => 'Combo', 'url' => route('admin.food-combos.index')];
                    $breadcrumbs[] = ['title' => 'Chỉnh sửa combo', 'url' => route('admin.food-combos.edit', request()->id)];
                    break;

                // reward
                case 'admin.redeemRewards.index':
                    $breadcrumbs[] = ['title' => 'Đổi thưởng', 'url' => ''];
                    $breadcrumbs[] = ['title' => 'Danh sách đổi thưởng ', 'url' => route('admin.redeemRewards.index')];
                    break;

                    // reward
                case 'admin.rewards.index':
                    $breadcrumbs[] = ['title' => 'Quà tặng', 'url' => ''];
                    $breadcrumbs[] = ['title' => 'Danh sách quà tặng ', 'url' => route('admin.rewards.index')];
                    break;
                case 'admin.rewards.create':
                    $breadcrumbs[] = ['title' => 'Quà tặng', 'url' => route('admin.rewards.index')];
                    $breadcrumbs[] = ['title' => 'Thêm mới quà tặng', 'url' => route('admin.rewards.create')];
                    break;
                case 'admin.rewards.edit':
                    $breadcrumbs[] = ['title' => 'Quà tặng', 'url' => route('admin.rewards.index')];
                    $breadcrumbs[] = ['title' => 'Chỉnh sửa quà tặng', 'url' => route('admin.rewards.edit', request()->id)];
                    break;

                    // voucher
                    case 'admin.vouchers.index':
                        $breadcrumbs[] = ['title' => 'Voucher', 'url' => ''];
                        $breadcrumbs[] = ['title' => 'Danh sách Voucher ', 'url' => route('admin.vouchers.index')];
                        break;
                    case 'admin.vouchers.create':
                        $breadcrumbs[] = ['title' => 'Voucher', 'url' => route('admin.vouchers.index')];
                        $breadcrumbs[] = ['title' => 'Thêm mới Voucher', 'url' => route('admin.vouchers.create')];
                        break;
                    case 'admin.vouchers.edit':
                        $breadcrumbs[] = ['title' => 'Voucher', 'url' => route('admin.vouchers.index')];
                        $breadcrumbs[] = ['title' => 'Chỉnh sửa Voucher', 'url' => route('admin.vouchers.edit', request()->id)];
                        break;

            }

            $view->with('breadcrumbs', $breadcrumbs);
        });
    }
}
