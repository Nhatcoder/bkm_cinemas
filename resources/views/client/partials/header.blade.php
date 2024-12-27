<div id="header">
    <div class="container">
        <div class="logo">
            <h1>
                <strong>BKM Cinemas - Rạp chiếu phim 3D công nghệ hàng đầu.</strong>
                <a href="{{ route('home') }}"><img style="max-width: 100%" src="{{ asset('client/images/logo.png') }}"
                        alt="touchcinema" /></a>
            </h1>
        </div>
        <div class="primary-menu">
            <div class="top-button">
                <div class="row">
                    <div class="col-md-8 col-sm-7">
                         <a class=""><img class=""
                                src="{{ asset('client/images/icons/dat-ve-ngay.png') }}" alt="Mua vé" /></a>
                         <a class="flags" href="#"><img class="img-responsive"
                                src="{{ asset('client/images/vn.png') }}" alt="Ngôn ngữ" /></a>
                        <a class="hidden-lg btn-search" href="javascript:;"><i class="fa fa-search"></i></a>
                        <form action="{{ route('search') }}" class="form-search visible-lg" method="get">
                            <div class="input-group">
                                <input class="form-control" name="k" required value="{{ request()->get('k') }}"
                                       type="search" placeholder="Tìm kiếm">
                                <button type="submit" class="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-4 col-sm-5 account">
                        @guest
                            <a href="{{ route('account') }}" class="login"
                                style="background-image: url({{ asset('client/images/login-bg.png') }});">
                                <img src="{{ asset('client/images/icons/so-da.png') }}" alt="Đăng nhập"
                                    class="img-responsive">
                                <span>Đăng nhập</span>
                            </a>
                            <a href="{{ route('account') }}" class="register"
                                style="background-image: url({{ asset('client/images/reg-bg.png') }});">
                                <img src="{{ asset('client/images/icons/bong-ngo.png') }}" alt="Đăng kí"
                                    class="img-responsive">
                                <span>Đăng kí <b class="hh">thành viên</b></span>
                            </a>
                        @else
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    @php
                                        $user = Auth::user();
                                        $avatarUrl = $user->image ?? '';
                                        $firstLetter = strtoupper(substr($user->last_name ?? $user->first_name, 0, 1));
                                        $colors = ['#FF5733', '#3374ff', '#3357FF', '#FF33A6', '#4ec1bc', '#7c8484'];
                                        $backgroundColor = $colors[$user->id % count($colors)];
                                    @endphp

                                    <a class="account-header" href="{{ route('account') }}">
                                        @if ($avatarUrl)
                                            <img class="avatar" src="{{ $avatarUrl }}"
                                                alt="{{ $user->first_name . ' ' . $user->last_name }}">
                                        @else
                                            <div class="avatar-placeholder-header"
                                                style="background-color: {{ $backgroundColor }};">
                                                {{ !empty($firstLetter) ? $firstLetter : strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                        @endif
                                        <span class="name">
                                            @auth
                                                @if (!empty($user->first_name) && !empty($user->last_name))
                                                    {{ $user->first_name . ' ' . $user->last_name }}
                                                @else
                                                    {{ $user->name }}
                                                @endif
                                            @endauth
                                            <small style="margin-top: 5px">
                                                @if ($user->isAdmin())
                                                    Quản trị viên
                                                @elseif($user->isManage())
                                                    Quản lý rạp
                                                @elseif($user->isStaff())
                                                    Nhân viên rạp
                                                @else
                                                    Thành viên
                                                @endif
                                            </small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" type="button" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('account') }}">Thông tin tài khoản</a>
                                            </li>
                                            @if (Auth::check() && Auth::user()->type !== 'member')
                                                <li>
                                                    <a href="{{ route('admin.dashboard') }}">Vào trang quản trị</a>
                                                </li>
                                            @endif
                                            <li role="presentation" class="divider"></li>
                                            <li>
                                                <form action="{{ route('logout') }}" method="post">
                                                    @csrf
                                                    <button type="submit">Đăng xuất</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>

                        @endguest
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-default" role="navigation" id="touchcinema-fixed-top">
                <div id="primary-menu">
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                <a href="{{ route('home') }}">
                                    Trang chủ
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('movie') ? 'active' : '' }}">
                                <a href="{{ route('movie') }}">
                                    Phim
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('ticket-price') ? 'active' : '' }}">
                                <a href="{{ route('ticket-price') }}">
                                    giá vé
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('post.list') && request()->route('slug') == 'thanh-vien' ? 'active' : '' }}">
                                <a href="{{ route('post.list', 'thanh-vien') }}">
                                    Thành viên
                                </a>
                            </li>
                            <li class="dropdown {{ request()->routeIs('post.list') && (request()->route('slug') == 'khuyen-mai' || request()->route('slug') == 'qua-tang') ? 'active' : '' }}">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="true" aria-expanded="false">
                                    Ưu đãi - Sự kiện
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            href="{{ route('post.list', 'khuyen-mai') }}">
                                            Khuyến mãi
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('post.list', 'qua-tang') }}">
                                            Quà tặng
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{ request()->routeIs('post.list') && request()->route('slug') == 'danh-gia-phim' ? 'active' : '' }}">
                                <a href="{{ route('post.list', 'danh-gia-phim') }}">
                                    Đánh giá phim
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                <a href="{{ route('about') }}">
                                    Giới thiệu
                                </a>
                            </li>
                            <li class="dropdown {{ request()->routeIs('post.detail') && (request()->route('slug') == 'quang-cao-su-kien' || request()->route('slug') == 'bkm-voucher') ? 'active' : '' }}">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    Dịch vụ
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            href="{{ route('post.detail', ['cate_slug' => 'dich-vu', 'slug' => 'quang-cao-su-kien']) }}">
                                            Dịch vụ quảng cáo - sự kiện
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('post.detail', ['cate_slug' => 'dich-vu', 'slug' => 'bkm-voucher']) }}">
                                            BKM Voucher
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <div class="notification-box">
                                    <div id="noti_Button"
                                        class="d-flex align-items-center justify-content-center notifications">
                                        <i class="fa fa-bell" aria-hidden="true"></i>
                                    </div>
                                    <!--THE NOTIFICAIONS DROPDOWN BOX.-->
                                    <div id="notifications">
                                        <h3>Thông báo</h3>
                                        <div class="list-notifications">
                                            <ul>
                                                @if (($notifications['users']->isNotEmpty()) || ($notifications['all']->isNotEmpty()))
                                                    @if ($notifications['users']->isNotEmpty())
                                                        @foreach ($notifications['users'] as $item)
                                                            <li style="display: flex;justify-content: space-between; align-items:center"
                                                                class="notification-item">
                                                                <a href="#">
                                                                    <b>
                                                                        {{ $item->title }}
                                                                    </b>
                                                                    <p>{{ $item->content }}</p>
                                                                </a>
                                                                <button data-token="{{ csrf_token() }}"
                                                                    data-url="{{ route('deleteNotification') }}"
                                                                    data-id="{{ $item->id }}"
                                                                    class="del-item-notification">
                                                                    X
                                                                </button>

                                                            </li>
                                                        @endforeach
                                                    @endif
                                                    @if ($notifications['all']->isNotEmpty())
                                                        @foreach ($notifications['all'] as $item)
                                                            <li>
                                                                <a href="#">
                                                                    <b>
                                                                        {{ $item->title }}
                                                                    </b>
                                                                    <p>{{ $item->content }}</p>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                @else
                                                    <h5 class="text-center">Chưa có thông báo nào!</h5>
                                                @endif

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        {{-- menu mobile --}}
        <div class="menu-mobile">
            <div class="menu-icon">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>

            {{-- <div class="menu-mobile-background "></div> --}}
            <div class="menu-mobile-content ">
                <div class="menu-mobile-search">
                    <form action="{{ route('search') }}" method="get">
                        <input type="text" name="k" value="{{ request()->get('k') }}" required
                            placeholder="Tìm kiếm..." class=" menu-search--mobile">
                    </form>
                </div>
                <button class="btn-close-menu">
                    <i class="fa fa-close " aria-hidden="true"></i>
                </button>

                <ul>
                    <li class="menu-item ">
                        <a href="{{ route('movie') }}">Phim</a>
                        {{-- <ul class="submenu">
                            <li>
                                <a href="phim/nha-ba-nu.html">Nhà Bà Nú</a>
                            </li>
                            <li>
                                <a href="phim/avatar-dong-chay-cua-nuoc.html">Avatar 2</a>
                            </li>
                            <li>
                                <a href="phim/black-adam.html">Black Adam</a>
                            </li>
                        </ul> --}}
                    </li>
                    <li>
                        <a href="{{ route('ticket-price') }}">Giá vé</a>
                    </li>
                    <li>
                        <a href="{{ route('post.list', 'thanh-vien') }}">Thành viên</a>
                    </li>
                    <li class="menu-item">
                        <a href="#">Ưu đãi - sự kiện <i class="fa-solid fa-angle-down menu-icon-right"></i></a>

                        <ul class="submenu">
                            <li>
                                <a href="{{ route('post.list', 'khuyen-mai') }}">Khuyến mãi</a>
                            </li>
                            <li>
                                <a href="{{ route('post.list', 'qua-tang') }}">Quà tặng</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('post.list', 'danh-gia-phim') }}">Đánh giá phim</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">Giới thiệu</a>
                    </li>
                    <li class="menu-item">
                        <a href="#">Dịch vụ <i class="fa-solid fa-angle-down menu-icon-right"></i></a>

                        <ul class="submenu">
                            <li>
                                <a href="{{ route('post.detail', ['cate_slug' => 'dich-vu', 'slug' => 'quang-cao-su-kien']) }}">Dịch vụ quảng cáo - sự kiện</a>
                            </li>
                            <li>
                                <a href="{{ route('post.detail', ['cate_slug' => 'dich-vu', 'slug' => 'bkm-voucher']) }}">BKM Voucher</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
