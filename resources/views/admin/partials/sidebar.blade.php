<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            @can('viewAny', 'Dashboard')
                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-icons">dashboard</i>
                        <span class="nav-text">{{ __('language.admin.dashboards.name') }}</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('admin.dashboard') }}">{{ __('language.admin.dashboards.name') }}</a></li>
                    </ul>
                </li>
            @endcan

            @can('viewAny', App\Models\System::class)
                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-icons">settings</i>
                        <span class="nav-text">{{ __('language.admin.systems.title') }}</span>
                    </a>
                    <ul aria-expanded="false">
                        @can('viewAny', App\Models\System::class)
                            <li>
                                <a class="has-arrow" href="javascript:void(0);"
                                    aria-expanded="false">{{ __('language.admin.systems.name') }}</a>
                                <ul aria-expanded="false">
                                    @can('viewAny', App\Models\System::class)
                                        <li>
                                            <a
                                                href="{{ route('admin.systems.index') }}">{{ __('language.admin.systems.listSidebar') }}</a>
                                        </li>
                                        @can('create', App\Models\System::class)
                                            <li>
                                                <a
                                                    href="{{ route('admin.systems.create') }}">{{ __('language.admin.systems.createSidebar') }}</a>
                                            </li>
                                        @endcan
                                    @endcan
                                </ul>
                            </li>

                            @foreach ($systemsByType0 as $key => $system)
                                <li>
                                    <a class="has-arrow" href="javascript:void(0);"
                                        aria-expanded="false">{{ $system->name ?? null }}</a>
                                    <ul aria-expanded="false">
                                        @can('viewAny', App\Models\System::class)
                                            <li>
                                                <a
                                                    href="{{ route('admin.systems.index') . '?system_id=' . $system->id }}">{{ __('language.admin.systems.listSidebar') }}</a>
                                            </li>
                                            @can('create', App\Models\System::class)
                                                <li>
                                                    <a
                                                        href="{{ route('admin.systems.create') . '?system_id=' . $system->id }}">{{ __('language.admin.systems.createSidebar') }}</a>
                                                </li>
                                            @endcan
                                        @endcan
                                    </ul>
                                </li>
                            @endforeach
                        @endcan
                    </ul>
                </li>
            @endcan

            {{-- @if (auth()->user()->can('viewAny', App\Models\Menu::class) ||
                    auth()->user()->can('viewAny', App\Models\Page::class) ||
                    auth()->user()->can('viewAny', App\Models\Block::class))
                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-icons">extension</i>
                        <span class="nav-text">{{ __('language.admin.interfaces.title') }}</span>
                    </a>
                    <ul aria-expanded="false">
                        @can('viewAny', App\Models\Menu::class)
                            <li>
                                <a href="{{ route('admin.menus.index') }}"
                                    aria-expanded="false">{{ __('language.admin.interfaces.menus.title') }}</a>
                            </li>
                        @endcan
                        @can('viewAny', App\Models\Page::class)
                            <li>
                                <a href="{{ route('admin.pages.index') }}"
                                    aria-expanded="false">{{ __('language.admin.interfaces.pages.title') }}</a>
                            </li>
                        @endcan
                        @can('viewAny', App\Models\Block::class)
                            <li>
                                <a href="{{ route('admin.blocks.index') }}"
                                    aria-expanded="false">{{ __('language.admin.interfaces.blocks.title') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif --}}

            @if (auth()->user()->can('viewAny', App\Models\CategoryPost::class) ||
                    auth()->user()->can('viewAny', App\Models\Post::class) ||
                    auth()->user()->can('viewAny', App\Models\Tag::class))
                <li>
                    <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                        <i class="material-icons">article</i>
                        <span class="nav-text">{{ __('language.admin.posts.title') }}</span>
                    </a>
                    <ul aria-expanded="false">
                        @can('viewAny', App\Models\CategoryPost::class)
                            <li>
                                <a href="{{ route('admin.categoryPosts.index') }}"
                                    aria-expanded="false">{{ __('language.admin.categories.title') }}</a>
                            </li>
                        @endcan
                        @can('viewAny', App\Models\Post::class)
                            <li>
                                <a href="{{ route('admin.posts.index') }}"
                                    aria-expanded="false">{{ __('language.admin.posts.title') }}</a>
                            </li>
                        @endcan
                        @can('viewAny', App\Models\Tag::class)
                            <li>
                                <a href="{{ route('admin.tags.index') }}"
                                    aria-expanded="false">{{ __('language.admin.tags.title') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            @can('viewAny', App\Models\Cinema::class)
                <li>
                    <a class="" href="{{ route('admin.cinemas.index') }}" aria-expanded="false">
                        <i class="material-icons">theaters</i>
                        <span class="nav-text">Rạp chiếu phim</span>
                    </a>
                </li>
            @endcan

            @if (auth()->user()->can('viewAny', App\Models\Booking::class))
                <li class="{{ request()->segment(2) == 'orders' ? 'mm-active' : '' }}">
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-icons">local_play</i>
                        <span class="nav-text">Quản lý vé</span>
                    </a>
                    <ul aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.orders.index') }}">Đơn hàng</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if (auth()->user()->can('viewAny', App\Models\Movie::class) || auth()->user()->can('viewAny', App\Models\Genre::class))
                <li
                    class="{{ request()->segment(2) == 'movies' || request()->segment(2) == 'actors' || request()->segment(2) == 'genres-movie' ? 'mm-active' : '' }}">
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-icons">movie</i>
                        <span class="nav-text">Phim</span>
                    </a>
                    <ul aria-expanded="false">
                        @can('viewAny', App\Models\Genre::class)
                            <li class="{{ request()->segment(2) == 'genres-movie' ? 'mm-active' : '' }}">
                                <a href="{{ route('admin.genres.index') }}" aria-expanded="false">Thể loại phim</a>
                            </li>
                        @endcan
                        @can('viewAny', App\Models\Movie::class)
                            <li class="{{ request()->segment(2) == 'movies' ? 'mm-active' : '' }}">
                                <a href="{{ route('admin.movies.index') }}" aria-expanded="false">Phim</a>
                            </li>
                        @endcan
                        @can('viewAny', App\Models\Actor::class)
                            <li class="{{ request()->segment(2) == 'actors' ? 'mm-active' : '' }}">
                                <a href="{{ route('admin.actors.index') }}" aria-expanded="false">Diễn viên</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

            @if (auth()->user()->can('viewAny', App\Models\Room::class) ||
                    auth()->user()->can('viewAny', App\Models\SeatType::class) ||
                    auth()->user()->can('viewAny', App\Models\SeatLayout::class))
                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-icons">movie</i>
                        <span class="nav-text">Phòng chiếu</span>
                    </a>
                    <ul aria-expanded="false">
                        @if (auth()->user()->can('viewAny', App\Models\Room::class))
                            <li>
                                <a href="{{ route('admin.rooms.index') }}" aria-expanded="false">Phòng chiếu</a>
                            </li>
                        @endif
                        @if (auth()->user()->can('viewAny', App\Models\SeatType::class))
                            <li>
                                <a href="{{ route('admin.seat-layouts.index') }}" aria-expanded="false">Sơ đồ ghế</a>
                            </li>
                        @endif
                        @if (auth()->user()->can('viewAny', App\Models\SeatLayout::class))
                            <li>
                                <a href="{{ route('admin.seat-types.index') }}" aria-expanded="false">Loại ghế</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (auth()->user()->can('viewAny', App\Models\RedeemReward::class) ||
                    auth()->user()->can('viewAny', App\Models\Reward::class) ||
                    auth()->user()->can('viewAny', App\Models\Voucher::class))
                <li>
                    <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                        <i class="material-icons">card_giftcard</i>
                        <span class="nav-text">Sự kiện</span>
                    </a>
                    <ul aria-expanded="false">
                        @if (auth()->user()->can('viewAny', App\Models\UserReward::class))
                            <li>
                                <a href="{{ route('admin.redeemRewards.index') }}" aria-expanded="false">Đổi
                                    thưởng</a>
                            </li>
                        @endif

                        @if (auth()->user()->can('viewAny', App\Models\Reward::class))
                            <li>
                                <a href="{{ route('admin.rewards.index') }}" aria-expanded="false">Quà tặng</a>
                            </li>
                        @endif

                        @if (auth()->user()->can('viewAny', App\Models\Voucher::class))
                            <li>
                                <a href="{{ route('admin.vouchers.index') }}" aria-expanded="false">Voucher</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- @if (auth()->user()->can('viewAny', App\Models\Payment::class))
                <li>
                    <a href="{{ route('admin.payments.index') }}">
                        <i class="material-icons">payment</i>
                        <span class="nav-text">Phương thức thanh toán</span>
                    </a>
                </li>
            @endif --}}
            @if (auth()->user()->can('viewAny', App\Models\City::class) || auth()->user()->can('viewAny', App\Models\Area::class))
                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-icons">location_on</i>
                        <span class="nav-text">Vị trí</span>
                    </a>
                    <ul aria-expanded="false">
                        @if (auth()->user()->can('viewAny', App\Models\City::class))
                            <li>
                                <a href="{{ route('admin.cities.index') }}" aria-expanded="false">Thành Phố</a>
                            </li>
                        @endif
                        @if (auth()->user()->can('viewAny', App\Models\Area::class))
                            <li>
                                <a href="{{ route('admin.areas.index') }}" aria-expanded="false">Khu Vực</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            @if (auth()->user()->can('viewAny', App\Models\Food::class) ||
                    auth()->user()->can('viewAny', App\Models\FoodType::class) ||
                    auth()->user()->can('viewAny', App\Models\FoodCombo::class))
                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-icons">fastfood</i>
                        <span class="nav-text">Đồ ăn</span>
                    </a>
                    <ul aria-expanded="false">
                        @can('viewAny', App\Models\FoodType::class)
                            <li>
                                <a href="{{ route('admin.food-types.index') }}" aria-expanded="false">Loại đồ ăn</a>
                            </li>
                        @endcan
                        @can('viewAny', App\Models\Food::class)
                            <li>
                                <a href="{{ route('admin.foods.index') }}" aria-expanded="false">Đồ ăn</a>
                            </li>
                        @endcan

                        {{-- @if (auth()->user()->can('viewAny', App\Models\FoodCombo::class))
                            <li>
                                <a href="{{ route('admin.food-combos.index') }}" aria-expanded="false">Combo</a>
                            </li>
                        @endif --}}
                    </ul>
                </li>
            @endif
            @if (auth()->user()->can('viewAny', App\Models\Contact::class))
                <li>
                    <a class="" href="{{ route('admin.contacts.index') }}" aria-expanded="false">
                        <i class="material-icons">contacts</i>
                        <span class="nav-text">Liên hệ</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->can('viewAny', App\Models\User::class) ||
                    auth()->user()->can('viewAny', App\Models\Role::class) ||
                    auth()->user()->can('viewAny', App\Models\Module::class) ||
                    auth()->user()->can('viewAny', App\Models\Notification::class))
                <li
                    class="{{ request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') || request()->routeIs('admin.modules.*') ? 'mm-active' : '' }}">
                    <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <span class="nav-text">{{ __('language.admin.members.title') }}</span>
                    </a>
                    <ul aria-expanded="false">
                        @can('viewAny', App\Models\User::class)
                            <li>
                                <a href="{{ route('admin.users.index') }}"
                                    aria-expanded="false">{{ __('language.admin.members.users.title') }}</a>
                            </li>
                        @endcan
                        @can('viewAny', App\Models\Role::class)
                            <li>
                                <a href="{{ route('admin.roles.index') }}"
                                    aria-expanded="false">{{ __('language.admin.members.roles.title') }}</a>
                            </li>
                        @endcan
                        @can('viewAny', App\Models\Module::class)
                            <li>
                                <a href="{{ route('admin.modules.index') }}"
                                    aria-expanded="false">{{ __('language.admin.members.modules.title') }}</a>
                            </li>
                        @endcan


                        @if (auth()->user()->can('viewAny', App\Models\Notification::class))
                            <li>
                                <a href="{{ route('admin.notifications.index') }}" aria-expanded="false">Thông
                                    báo</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>
