@extends('client.layouts.main')

@section('title', Auth::check() ? 'Thông tin tài khoản' : 'Đăng ký - Đăng nhập | BKM Cinemas')

@section('css')
<style>
    .text-white {
        color: #fff !important;
    }

    .mb-10 {
        margin-bottom: 10px !important;
    }

    .gr-ticket {
        display: grid !important;
        grid-template-columns: 1fr 1fr;
        width: 200px;
    }
</style>
@endsection

@vite(['resources/js/app.js', 'resources/css/app.css'])

@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px">
            <div class="">
                <img width="100%" src="https://bhdstar.vn/wp-content/uploads/2024/10/banner-top.jpg" alt="">
            </div>
        </div>
        <div class="row  ticket-login">
            <div class="col-md-3 col-sm-3">
                @include('client.components.sidebar-auth')
            </div>
            <div class="col-md-9 col-sm-9 login-wrap">
                <div class="tab-content">
                    @guest
                        <div id="dang-nhap" class="mbox tab-pane fade active in">
                            <div class="title">
                                <h2>Đăng nhập</h2>
                            </div>
                            <div style="padding: 20px 20px;">
                                <div class="row flex">
                                    <div class="col-md-7 col-sm-6">
                                        <form data-image="{{ asset('client/images/success.png') }}" class="form-login"
                                            action="{{ route('login') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="emailOrPhone">Email hoặc Số điện thoại:</label>
                                                <input id="emailOrPhone" type="text" name="emailOrPhone"
                                                    class="form-control emailOrPhone">
                                                <div class="emailOrPhone_error"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Mật khẩu:</label>
                                                <div class="input-group">
                                                    <input id="passwordLogin" type="password" name="password"
                                                        class="form-control password passwordLogin">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text toggle-password" style="cursor: pointer;">
                                                            <i class="fas fa-eye toggle-password-login-icon"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="password_error"></div>
                                            </div>
                                            <div class="form-group">
                                                <input name="remember" id="remember" type="checkbox" value="true">
                                                <label for="remember" class="italic">Ghi nhớ đăng
                                                    nhập</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-login">
                                                Đăng nhập
                                            </button>
                                            <div class="attr-link">
                                                <a data-toggle="tab" aria-expanded="true" href="#quen-mat-khau">Quên mật
                                                    khẩu / <a data-toggle="tab" aria-expanded="true" href="#dang-ky">Đăng
                                                        ký</a>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-1 col-sm-1">
                                        <span class="center">Hoặc</span>
                                    </div>
                                    <div class="col-md-4 col-sm-5">
                                        <a class="login-social" href="{{ route('facebook.redirectToFacebook') }}"
                                            title="Đăng nhập bằng facebook">
                                            <img class="img-responsive" src="{{ asset('client/images/fb.png') }}"
                                                alt="Facebook">
                                        </a>

                                        <a class="login-social" href="{{ route('google.redirectToGoogle') }}"
                                            title="Đăng nhập bằng google">
                                            <img class="img-responsive" src="{{ asset('client/images/gp.png') }}"
                                                alt="Google">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="dang-ky" class="mbox tab-pane fade">
                            <div class="title">
                                <h2>Đăng ký</h2>
                            </div>
                            <div class="box-body" style="padding: 20px 20px;">
                                <div class="row flex">
                                    <div class="col-md-8 col-sm-6">
                                        <div>
                                            <form data-image="{{ asset('client/images/register_success.png') }}" role="form"
                                                method="POST" class="form-register" action="{{ route('register') }}">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="email">Tên đăng nhập <span
                                                            style="color: red;">*</span></label>
                                                    <input id="name" type="name" class="form-control name"
                                                        name="name" value="">
                                                    <div class="name_error"></div>
                                                </div>

                                                <div class="row flex form-group">
                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="name">Họ <span style="color: red;">*</span></label>
                                                        <input id="first_name" type="text" class="form-control first_name"
                                                            name="first_name" value="">
                                                        <div class="first_name_error"></div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="name">Tên đệm và tên <span
                                                                style="color: red;">*</span></label>
                                                        <input id="last_name" type="text" class="form-control last_name"
                                                            name="last_name" value="">
                                                        <div class="last_name_error"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Địa chỉ email <span
                                                            style="color: red;">*</span></label>
                                                    <input id="text" type="email" class="form-control email"
                                                        name="email" value="">
                                                    <div class="email_error"></div>
                                                </div>


                                                <div class="row flex form-group">
                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="gender">Giới tính <span
                                                                style="color: red;">*</span></label>
                                                        <div class="radio-group">
                                                            <label class="radio-label">
                                                                <input type="radio" name="gender" value="male"> Nam
                                                            </label>
                                                            <label class="radio-label">
                                                                <input type="radio" name="gender" value="female"> Nữ
                                                            </label>
                                                        </div>
                                                        <div class="gender_error"></div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="name">Số điện thoại <span
                                                                style="color: red;">*</span></label>
                                                        <input id="phone" type="text" class="form-control phone"
                                                            name="phone" value="">
                                                        <div class="phone_error"></div>
                                                    </div>
                                                </div>

                                                <div class="row flex form-group">
                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="password">Mật khẩu <span
                                                                style="color: red;">*</span></label>
                                                        <div class="input-group">
                                                            <input id="passwordRegister" type="password"
                                                                class="form-control passwordRegister" name="password">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text toggle-password"
                                                                    style="cursor: pointer;">
                                                                    <i class="fas fa-eye"
                                                                        id="toggle-password-icon-register"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="password_error"></div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="password-confirm">Nhập lại mật khẩu <span
                                                                style="color: red;">*</span></label>
                                                        <div class="input-group">
                                                            <input id="password-confirm" type="password" class="form-control"
                                                                name="password_confirmation">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text toggle-password"
                                                                    style="cursor: pointer;">
                                                                    <i class="fas fa-eye"
                                                                        id="toggle-confirm-password-icon"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="password_confirmation_error"></div>
                                                    </div>
                                                </div>

                                                <div class="row flex form-group">
                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="birthday">Ngày sinh <span
                                                                style="color: red;">*</span></label>
                                                        <input id="date_birth" placeholder="-- Ngày Sinh --" type="text"
                                                            class="form-control datepickerRegister" name="date_birth">
                                                        <div class="date_birth_error"></div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="birthday">Tỉnh/Thành phố <span
                                                                style="color: red;">*</span></label>
                                                        <select name="city_id" id="city" class="select2 w-100">
                                                            <option value="">Chọn thành phố</option>
                                                            @if (!empty($data['cities']))
                                                                @foreach ($data['cities'] as $city)
                                                                    <option value="{{ $city->id }}">{{ $city->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <div class="city_id_error"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group flex">
                                                    <input name="is_terms_accepted" id="is_terms_accepted" type="checkbox"
                                                        value="1"> <label for="is_terms_accepted" class="italic">Tôi
                                                        đã
                                                        đọc, hiểu và đồng ý với các <a target="_blank"
                                                            href="/quy-dinh-thanh-vien">điều
                                                            khoản</a></label>
                                                    <div style="margin-left: 10px">
                                                        <div style="position: absolute; width: 100%;transform: translateY(-50%);"
                                                            class="is_terms_accepted_error"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group flex position-relative">
                                                    <input name="is_subscribed_promotions" id="is_subscribed_promotions"
                                                        type="checkbox" value="1"> <label for="is_subscribed_promotions"
                                                        class="italic">Nhận thông tin chương trình khuyến mãi</label>
                                                    <div style="margin-left: 10px;">
                                                        <div class="is_subscribed_promotions_error"></div>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary btn-login">
                                                    Đăng kí
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div>
                                            <img src="https://cdn.moveek.com/bundles/ornweb/img/mascot.png" width="100%"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="quen-mat-khau" class="mbox tab-pane fade">
                            <div class="title">
                                <h2>Quên mật khẩu</h2>
                            </div>
                            <div style="padding: 20px 20px;">
                                <div class="row flex">
                                    <div class="col-md-6 col-sm-6">
                                        <form id="forgotPass" action="{{ route('sendResetLinkEmail') }}" method="post">
                                            @csrf
                                            <p>Quên mật khẩu? <br> Vui lòng nhập địa chỉ email.</p>
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input id="email" type="text" name="email"
                                                    class="form-control email">
                                                <div class="email_error"></div>
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-login">
                                                Gửi
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div style="padding: 55px;">
                                            <img src="https://cdn.moveek.com/bundles/ornweb/img/mascot.png" width="100%"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div id="thanhvien" class="mbox tab-pane fade {{ request('tab') === 'thanhvien' || !request('tab') ? 'in active' : '' }}">
                            <div class="mbox mbox-2">
                                <div class="title">
                                    <h2>Thông tin tài khoản</h2>
                                </div>
                                <div class="box-body">
                                    <div class="account-group">
                                        @php
                                            $user = Auth::user();
                                            $avatarUrl = $user->image ?? '';
                                            $firstLetter = strtoupper(
                                                substr($user->last_name ?? $user->first_name, 0, 1),
                                            );
                                            $colors = [
                                                '#FF5733',
                                                '#3374ff',
                                                '#3357FF',
                                                '#FF33A6',
                                                '#4ec1bc',
                                                '#7c8484',
                                            ];
                                            $backgroundColor = $colors[$user->id % count($colors)];
                                        @endphp

                                        <div>
                                            <div class="avatar" id="current-avatar">
                                                @if (!empty($avatarUrl))
                                                    <!-- Hiển thị ảnh nếu có -->
                                                    <img src="{{ $avatarUrl }}" alt="{{ $user->name ?? 'avatar' }}"
                                                        class="img-responsive img-circle img-member">
                                                @else
                                                    <!-- Hiển thị chữ cái đầu với màu nền ngẫu nhiên nếu không có ảnh -->
                                                    <div class="avatar-placeholder"
                                                        style="background-color: {{ $backgroundColor }};">
                                                        {{ $firstLetter }}
                                                    </div>
                                                    <img src="{{ $avatarUrl }}" alt="{{ $user->name ?? 'avatar' }}"
                                                        class="img-responsive img-circle img-member img-block">
                                                @endif
                                                <a href="javascript:;" data-modal="#modalAvatarImage" class="open-modal">Đổi
                                                    ảnh đại diện</a>
                                            </div>
                                        </div>

                                        <div class="account-info">
                                            @if (Auth::user()->status == 0)
                                                <p style="color: #dc0000;font-weight: normal;">Tài khoản của bạn đang bị khóa
                                                    vui
                                                    lòng liên hệ tới bộ phận </p>
                                            @endif
                                            <p>Họ tên:
                                                {{ Auth::check() ? Auth::user()->first_name . ' ' . Auth::user()->last_name : '' }}
                                                <small class="level">
                                                    @if (Auth::user()->isAdmin())
                                                        Quản trị viên
                                                    @elseif(Auth::user()->isManage())
                                                        Quản lý rạp
                                                    @elseif(Auth::user()->isStaff())
                                                        Nhân viên rạp
                                                    @else
                                                        Thành viên
                                                    @endif
                                                </small>
                                            </p>
                                            <p>Email: {{ Auth::check() ? Auth::user()->email : '' }}</p>
                                            <p>SĐT:
                                                @if (!empty(Auth::user()->phone))
                                                    {{ Auth::check() ? Auth::user()->phone : '' }}
                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                @else
                                                    Chưa có thông tin
                                                    <a href="javascript:;" title="Tài khoản chưa được xác thực"
                                                        class="no-verify" id="verify">
                                                        Xác thực SMS
                                                    </a>
                                                @endif

                                            </p>
                                            <p>Dịch vụ:
                                                <a href="javascript:;" data-modal="#topUpModal"
                                                    title="Nạp tiền vào tài khoản" class="no-verify open-modal">
                                                    Nạp tiền
                                                </a>
                                            </p>
                                            <p>Ví thành viên: <span
                                                    class="point">{{ !empty(Auth::user()->balance) ? number_format(Auth::user()->balance, 0, ',', '.') : 0 }}</span>
                                                đ</p>
                                            <p>Cấp bậc thành viên:
                                                <span class="point">
                                                    @switch(Auth::user()->membership_level)
                                                        @case('member')
                                                            <span class="sparkle-normal">🥈 BKM Member</span>
                                                        @break

                                                        @case('vip')
                                                            <span class="sparkle-vip">🌟 BKM VIP</span>
                                                        @break

                                                        @case('vvip')
                                                            <span class="sparkle-svip">👑 BKM VVIP</span>
                                                        @break

                                                        @default
                                                            Không xác định
                                                    @endswitch
                                                </span>
                                            </p>
                                            <p>Điểm tích lũy: <span
                                                    class="point reward-tab-thanhvien">{{ !empty(Auth::user()->points) ? number_format(Auth::user()->points, 0, ',', '.') : 0 }}
                                                    điểm</span>
                                                <a href="javascript:;" data-modal="#modalPoints" title="Xem quy tắc đổi điểm"
                                                    class="no-verify open-modal">
                                                    Quy tắc & Đổi thưởng
                                                </a>
                                            </p>

                                            <!-- EXP và Progress Bar -->
                                            <div class="exp-container mb-15 mt-25">
                                                <p class="mb-4">EXP: <span class="point expData"
                                                        data-exp="{{ Auth::user()->exp ?? 0 }}">{{ !empty(Auth::user()->exp) ? number_format(Auth::user()->exp, 0, ',', '.') : 0 }}</span>
                                                    exp</p>
                                                <div class="rank-container">
                                                    <div class="progress-bar">
                                                        <div class="progress">
                                                            <span class="progress-text">0/4,000,000</span>
                                                        </div>
                                                    </div>
                                                    <div class="milestones">
                                                        <div class="upgrade-card">
                                                            <span class="milestone" style="left: -15px;">
                                                                <img class="rank_member"
                                                                    src="{{ asset('client/images/rank_member.png') }}"
                                                                    alt="">
                                                            </span>
                                                            <div class="rank-number-member">
                                                                <b>0</b>
                                                            </div>
                                                        </div>
                                                        <div class="upgrade-card">
                                                            <span class="milestone" style="left: 50%;">
                                                                <img class="rank_vip"
                                                                    src="{{ asset('client/images/rank_vip.png') }}"
                                                                    alt="">
                                                            </span>
                                                            <div class="line-center-grade"></div>
                                                            <div class="rank-number-vip">
                                                                <b>4.000.000</b>
                                                            </div>
                                                        </div>
                                                        <div class="upgrade-card">
                                                            <span class="milestone" style="right: -61px;">
                                                                <img class="rank_vvip"
                                                                    src="{{ asset('client/images/rank_vvip.png') }}"
                                                                    alt="">
                                                            </span>
                                                            <div class="rank-number-vvip">
                                                                <b>8.000.000</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="box-body body-account">
                                    <h3 class="h3-body-account">Thông tin chi tiết</h3>
                                    <div class="card-container">
                                        <div class="card">
                                            <div class="card-header">
                                                <div>
                                                    <div style="display: flex; align-items: center;">
                                                        <div class="stats">
                                                            <p>
                                                                Tổng chi tiêu theo năm: <strong id="year"></strong>:
                                                                <span class="point" id="totalPendingMoney">
                                                                    {{-- {{ !empty($data['totalPendingMoney']) ? number_format($data['totalPendingMoney'], 0, ',', '.') : 0 }} --}}
                                                                </span> Vnđ
                                                            </p>
                                                        </div>
                                                        <div class="date-box-content" style="margin-left: 30px">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                                fill="currentColor" aria-hidden="true"
                                                                class="dp__icon dp__input_icon dp__input_icons">
                                                                <path
                                                                    d="M29.333 8c0-2.208-1.792-4-4-4h-18.667c-2.208 0-4 1.792-4 4v18.667c0 2.208 1.792 4 4 4h18.667c2.208 0 4-1.792 4-4v-18.667zM26.667 8v18.667c0 0.736-0.597 1.333-1.333 1.333 0 0-18.667 0-18.667 0-0.736 0-1.333-0.597-1.333-1.333 0 0 0-18.667 0-18.667 0-0.736 0.597-1.333 1.333-1.333 0 0 18.667 0 18.667 0 0.736 0 1.333 0.597 1.333 1.333z">
                                                                </path>
                                                                <path
                                                                    d="M20 2.667v5.333c0 0.736 0.597 1.333 1.333 1.333s1.333-0.597 1.333-1.333v-5.333c0-0.736-0.597-1.333-1.333-1.333s-1.333 0.597-1.333 1.333z">
                                                                </path>
                                                                <path
                                                                    d="M9.333 2.667v5.333c0 0.736 0.597 1.333 1.333 1.333s1.333-0.597 1.333-1.333v-5.333c0-0.736-0.597-1.333-1.333-1.333s-1.333 0.597-1.333 1.333z">
                                                                </path>
                                                                <path
                                                                    d="M4 14.667h24c0.736 0 1.333-0.597 1.333-1.333s-0.597-1.333-1.333-1.333h-24c-0.736 0-1.333 0.597-1.333 1.333s0.597 1.333 1.333 1.333z">
                                                                </path>
                                                            </svg>
    
                                                            <input data-token="{{ csrf_token() }}" type="text"
                                                                value="{{ \Carbon\Carbon::now()->format('Y') }}"
                                                                class="form-control date-input date-filter-year"
                                                                data-url="{{ route('getTotalMoneyByYear') }}" id="moneySpending">
    
                                                        </div>
                                                    </div>
                                                   
    
                                                    <div style="display: flex; align-items: center; margin-top: 15px;">
                                                        <div class="stats">
                                                            <p>
                                                                Tổng chi tiêu theo tháng: <strong id="month"></strong>:
                                                                <span class="point" id="totalPendingMoneyByMonth">
                                                                    {{-- {{ !empty($data['totalPendingMoney']) ? number_format($data['totalPendingMoney'], 0, ',', '.') : 0 }} --}}
                                                                </span> Vnđ
                                                            </p>
                                                        </div>
                                                        <div class="date-box-content" style="margin-left: 30px">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                                fill="currentColor" aria-hidden="true"
                                                                class="dp__icon dp__input_icon dp__input_icons">
                                                                <path
                                                                    d="M29.333 8c0-2.208-1.792-4-4-4h-18.667c-2.208 0-4 1.792-4 4v18.667c0 2.208 1.792 4 4 4h18.667c2.208 0 4-1.792 4-4v-18.667zM26.667 8v18.667c0 0.736-0.597 1.333-1.333 1.333 0 0-18.667 0-18.667 0-0.736 0-1.333-0.597-1.333-1.333 0 0 0-18.667 0-18.667 0-0.736 0.597-1.333 1.333-1.333 0 0 18.667 0 18.667 0 0.736 0 1.333 0.597 1.333 1.333z">
                                                                </path>
                                                                <path
                                                                    d="M20 2.667v5.333c0 0.736 0.597 1.333 1.333 1.333s1.333-0.597 1.333-1.333v-5.333c0-0.736-0.597-1.333-1.333-1.333s-1.333 0.597-1.333 1.333z">
                                                                </path>
                                                                <path
                                                                    d="M9.333 2.667v5.333c0 0.736 0.597 1.333 1.333 1.333s1.333-0.597 1.333-1.333v-5.333c0-0.736-0.597-1.333-1.333-1.333s-1.333 0.597-1.333 1.333z">
                                                                </path>
                                                                <path
                                                                    d="M4 14.667h24c0.736 0 1.333-0.597 1.333-1.333s-0.597-1.333-1.333-1.333h-24c-0.736 0-1.333 0.597-1.333 1.333s0.597 1.333 1.333 1.333z">
                                                                </path>
                                                            </svg>
    
                                                            <input data-token="{{ csrf_token() }}" type="text" data-url="{{ route('getTotalMoneyByMonth') }}"
                                                                value="{{ \Carbon\Carbon::now()->format('m/Y') }}"
                                                                class="form-control date-input date-filter-month"
                                                                 id="moneySpendingByMonth">
                                                                {{-- {{ route('getTotalMoneyByMonth') }} --}}
                                                        </div>
                                                    </div>
                                                       
                                                </div>
                                         


                                                <div
                                                    class="level-card @if (Auth::user()->membership_level == 'member') rank-member @elseif(Auth::user()->membership_level == 'vip') rank-vip @else rank-vvip @endif">
                                                    @if (Auth::user()->membership_level == 'member')
                                                        <img class="rank_member"
                                                            src="{{ asset('client/images/level-member.png') }}"
                                                            alt="">
                                                        <span>BKM Member</span>
                                                    @elseif(Auth::user()->membership_level == 'vip')
                                                        <img class="rank_vip"
                                                            src="{{ asset('client/images/level-vip.png') }}" alt="">
                                                        <span>BKM VIP</span>
                                                    @else
                                                        <img class="img_rank_vvip"
                                                            src="{{ asset('client/images/level-vvip.png') }}" alt="">
                                                        <span>BKM VVIP</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="info">
                                                    <div class="info-content">
                                                        <p>Voucher</p>
                                                        <p>{{ !empty($data['voucherUsers']) ? $data['voucherUsers']->count() : 0 }}
                                                        </p>
                                                        <div class="info-bkm-card">
                                                            <a href="javascript:;" class="no-verify open-modal btn-login"
                                                                data-modal="#modalVouchers" title="Vouchers">Xem</a>
                                                        </div>
                                                    </div>
                                                    <div class="info-content">
                                                        <p>Quà tặng</p>
                                                        <p class="rewardsUser-count">
                                                            {{ !empty($data['rewardsUser']) ? $data['rewardsUser']->count() : 0 }}
                                                        </p>
                                                        <div class="info-bkm-card">
                                                            <a href="javascript:;" data-modal="#modalRewards"
                                                                title="Quà tặng"
                                                                class="no-verify open-modal btn-login">Xem</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="doithongtin" class="mbox tab-pane fade">
                            <div class="title">
                                <h2>Thông tin thành viên</h2>
                            </div>
                            <div style="padding: 20px 20px;">
                                <div class="row flex">
                                    <div class="col-md-7 col-sm-7">
                                        <form id="form-updateProfile" data-image="{{ asset('client/images/success.png') }}"
                                            action="{{ route('updateProfile') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Tên đăng nhập</label>
                                                <input id="name" type="name" class="form-control name"
                                                    name="name" value="{{ old('name', Auth::user()->name) }}">
                                                <div class="name_error"></div>
                                            </div>

                                            <div class="row flex form-group">
                                                <div class="col-md-6 col-sm-6">
                                                    <label for="first_name">Họ</label>
                                                    <input id="first_name" type="text" class="form-control first_name"
                                                        name="first_name"
                                                        value="{{ old('first_name', Auth::user()->first_name) }}">
                                                    <div class="first_name_error"></div>
                                                </div>

                                                <div class="col-md-6 col-sm-6">
                                                    <label for="last_name">Tên đệm và tên</label>
                                                    <input id="last_name" type="text" class="form-control last_name"
                                                        name="last_name"
                                                        value="{{ old('last_name', Auth::user()->last_name) }}">
                                                    <div class="last_name_error"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Địa chỉ email</label>
                                                <input id="email" type="email" disabled class="form-control email"
                                                    name="email" value="{{ old('email', Auth::user()->email) }}">
                                                <div class="email_error"></div>
                                            </div>

                                            <div class="row flex form-group">
                                                <div class="col-md-6 col-sm-6">
                                                    <label for="gender">Giới tính</label>
                                                    <div class="radio-group">
                                                        <label class="radio-label">
                                                            <input type="radio" name="gender" value="male"
                                                                {{ old('gender', Auth::user()->gender) == 'male' ? 'checked' : '' }}>
                                                            Nam
                                                        </label>
                                                        <label class="radio-label">
                                                            <input type="radio" name="gender" value="female"
                                                                {{ old('gender', Auth::user()->gender) == 'female' ? 'checked' : '' }}>
                                                            Nữ
                                                        </label>
                                                    </div>
                                                    <div class="gender_error"></div>
                                                </div>

                                                <div class="col-md-6 col-sm-6">
                                                    <label for="name">Số điện thoại</label>
                                                    <input id="phone" type="text" disabled class="form-control phone"
                                                        name="phone" value="{{ old('phone', Auth::user()->phone) }}">
                                                    <div class="phone_error"></div>
                                                </div>
                                            </div>

                                            <div class="row flex form-group">
                                                <div class="col-md-6 col-sm-6">
                                                    <label for="birthday">Ngày sinh</label>
                                                    <input id="date_birth"
                                                        value="{{ old('date_birth', date('d-m-Y', strtotime(Auth::user()->date_birth))) }}"
                                                        placeholder="-- Ngày Sinh --" type="text"
                                                        class="form-control datepickerProfile" name="date_birth">
                                                    <div class="date_birth_error"></div>
                                                </div>

                                                <div class="col-md-6 col-sm-6">
                                                    <label for="birthday">Tỉnh/Thành phố</label>
                                                    <select name="city_id" id="city" class="select2 w-100">
                                                        <option value="">Chọn thành phố</option>
                                                        @if (!empty($data['cities']))
                                                            @foreach ($data['cities'] as $city)
                                                                <option @selected(old('city_id', Auth::user()->city_id) == $city->id)
                                                                    value="{{ $city->id }}">{{ $city->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <div class="city_id_error"></div>
                                                </div>
                                            </div>

                                            <div class="center">
                                                <input type="submit" name="submit" value="Lưu"
                                                    class="btn btn-success btn-login">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-5 col-sm-5">
                                        <div style="padding: 55px;">
                                            <img src="https://cdn.moveek.com/bundles/ornweb/img/mascot.png" width="100%"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="doimatkhau" class="mbox tab-pane fade">
                            <div class="title">
                                <h2>Đổi mật khẩu</h2>
                            </div>
                            <div style="padding: 20px 20px;">
                                <div class="row flex">
                                    <div class="col-md-6 col-sm-6">
                                        <form id="form-changepassword" data-url-logout="{{ route('logout') }}"
                                            data-url-redirect="{{ route('account') }}"
                                            data-image="{{ asset('client/images/success.png') }}"
                                            action="{{ route('changePassword') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="old-password">Mật khẩu hiện tại</label>
                                                <div class="input-group">
                                                    <input type="password" name="old_password" value=""
                                                        autocomplete="false" class="form-control old_password"
                                                        id="old_password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text toggle-password"
                                                            style="cursor: pointer;">
                                                            <i class="fas fa-eye toggle-old-password-icon"
                                                                id="toggle-old-password-icon"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="old_password_error"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Mật khẩu mới</label>
                                                <div class="input-group">
                                                    <input type="password" name="password" value=""
                                                        autocomplete="false" class="form-control password" id="password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text toggle-password"
                                                            style="cursor: pointer;">
                                                            <i class="fas fa-eye toggle-password-change-icon"
                                                                id="toggle-password-change-icon"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="password_error"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="re-password">Nhập lại mật khẩu mới</label>
                                                <div class="input-group">
                                                    <input type="password" name="confirm_password" value=""
                                                        autocomplete="false" class="form-control confirm_password"
                                                        id="confirm_password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text toggle-password"
                                                            style="cursor: pointer;">
                                                            <i class="fas fa-eye toggle-confirm-password-icon"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="confirm_password_error"></div>
                                            </div>

                                            <div class="center">
                                                <input type="submit" name="submit" value="Lưu"
                                                    class="btn btn-success btn-login">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div style="padding: 55px;">
                                            <img src="https://cdn.moveek.com/bundles/ornweb/img/mascot.png" width="100%"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="tichluydiem" class="mbox tab-pane fade">
                            <div class="title">
                                <h2>Tích lũy & đổi thưởng</h2>
                            </div>
                            <div style="padding: 20px 20px;">
                                <div class="row flex">
                                    <!-- Phần thông tin và đổi thưởng -->
                                    <div class="col-md-7 col-sm-7">
                                        <div class="user-points">
                                            <h3>Chào mừng bạn, {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                                            </h3>
                                            <p>Bạn hiện đang có:
                                                <span
                                                    class="highlight-points reward-tab-tichluydiem">{{ number_format(Auth::user()->points, 0, ',', '.') }}
                                                    điểm</span>
                                            </p>
                                            <p>Cấp bậc hiện tại:
                                                <span class="point">
                                                    @switch(Auth::user()->membership_level)
                                                        @case('member')
                                                            <span class="sparkle-normal">🥈 BKM Member</span>
                                                        @break

                                                        @case('vip')
                                                            <span class="sparkle-vip">🌟 BKM VIP</span>
                                                        @break

                                                        @case('vvip')
                                                            <span class="sparkle-svip">👑 BKM VVIP</span>
                                                        @break

                                                        @default
                                                            Không xác định
                                                    @endswitch
                                                </span>
                                            </p>
                                            <p>Quy tắc & Đổi thưởng:
                                                <a href="javascript:;" data-modal="#modalPoints" title="Xem quy tắc đổi điểm"
                                                    class="no-verify open-modal">
                                                    Xem
                                                </a>
                                            </p>
                                            <hr>
                                            <h4>Quy đổi điểm:</h4>
                                            <ul class="list-points">
                                                <li>🎁 <strong>Đổi điểm nhận nước uống tùy chọn</strong></li>
                                                <li>🎁 <strong>Đổi điểm nhận bắp ngọt</strong></li>
                                                <li>🎁 <strong>Đổi điểm nhận vé xem phim 2D/3D</strong></li>
                                                <li>🎁 <strong>Các phần quà hấp dẫn khác 👇</strong></li>
                                            </ul>
                                            <button class="btn btn-primary btn-login open-modal"
                                                data-modal="#modalExchangeExp">Đổi thưởng</button>
                                        </div>
                                    </div>

                                    <!-- Phần hình ảnh minh họa -->
                                    <div class="col-md-5 col-sm-5">
                                        <div style="padding: 55px;">
                                            <img src="https://cdn.moveek.com/bundles/ornweb/img/mascot.png" width="100%"
                                                alt="Mascot">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="vedadat" class="mbox tab-pane fade {{ request('tab') === 'vedadat' ? 'in active' : '' }}">
                            <div class="title">
                                <h2>Lịch sử mua vé</h2>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="date-content">
                                            <div class="date-box">
                                                <div class="date-box-content">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                        fill="currentColor" aria-hidden="true"
                                                        class="dp__icon dp__input_icon dp__input_icons">
                                                        <path
                                                            d="M29.333 8c0-2.208-1.792-4-4-4h-18.667c-2.208 0-4 1.792-4 4v18.667c0 2.208 1.792 4 4 4h18.667c2.208 0 4-1.792 4-4v-18.667zM26.667 8v18.667c0 0.736-0.597 1.333-1.333 1.333 0 0-18.667 0-18.667 0-0.736 0-1.333-0.597-1.333-1.333 0 0 0-18.667 0-18.667 0-0.736 0.597-1.333 1.333-1.333 0 0 18.667 0 18.667 0 0.736 0 1.333 0.597 1.333 1.333z">
                                                        </path>
                                                        <path
                                                            d="M20 2.667v5.333c0 0.736 0.597 1.333 1.333 1.333s1.333-0.597 1.333-1.333v-5.333c0-0.736-0.597-1.333-1.333-1.333s-1.333 0.597-1.333 1.333z">
                                                        </path>
                                                        <path
                                                            d="M9.333 2.667v5.333c0 0.736 0.597 1.333 1.333 1.333s1.333-0.597 1.333-1.333v-5.333c0-0.736-0.597-1.333-1.333-1.333s-1.333 0.597-1.333 1.333z">
                                                        </path>
                                                        <path
                                                            d="M4 14.667h24c0.736 0 1.333-0.597 1.333-1.333s-0.597-1.333-1.333-1.333h-24c-0.736 0-1.333 0.597-1.333 1.333s0.597 1.333 1.333 1.333z">
                                                        </path>
                                                    </svg>
                                                    <input type="text" value="{{ \Carbon\Carbon::now()->format('m/Y') }}"
                                                        class="form-control date-filter date-input"
                                                        data-url="{{ route('account') }}" placeholder="Chọn tháng">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row flex">
                                    <div class="col" id="ticket-main">
                                        @include('client.ajax.tickets.ticket', [
                                            'tickets' => $data['tickets'],
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="lichsugiaodich" class="mbox tab-pane fade">
                            <div class="title">
                                <h2>Lịch sử giao dịch</h2>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col"></div>
                                </div>
                                <div class="row flex">
                                    <div class="col-md-12 col-sm-12">
                                        @if ($data['transactions']->isNotEmpty())
                                            <div class="transaction-deposit">
                                                <div class="transaction-main">
                                                    @php
                                                        $lastDate = null;
                                                    @endphp
                                                    @foreach ($data['transactions'] as $key => $transaction)
                                                        @php
                                                            $transactionDate = date(
                                                                'd/m/Y',
                                                                strtotime($transaction->created_at),
                                                            );
                                                        @endphp
                                                        <div class="border-box">
                                                            @if ($transactionDate != $lastDate)
                                                                <div class="transaction-date">
                                                                    {{ $transactionDate }}
                                                                </div>
                                                                @php
                                                                    $lastDate = $transactionDate;
                                                                @endphp
                                                            @endif
                                                            <div class="transaction-list"
                                                                style="border-bottom: {{ $loop->last ? '1px solid #91b5d7' : 'none' }}">
                                                                <div class="transaction-content">
                                                                    <h4>Thông báo giao dịch</h4>
                                                                    <ul>
                                                                        <li>{{ !empty($transaction->description) ? $transaction->description : '' }}
                                                                        </li>
                                                                        <li>
                                                                            Giao dịch:
                                                                            @if ($transaction->status == 'completed' && $transaction->type == 'deposit')+
                                                                            @endif{{ number_format($transaction->amount, 0, '.', ',') }}
                                                                            đ |
                                                                            {{ date('d/m/Y H:i:s', strtotime($transaction->created_at)) }}
                                                                            |
                                                                            Số
                                                                            dư:
                                                                            {{ number_format($transaction->balance_after, 0, '.', ',') }}
                                                                            đ
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <div class="d-flex justify-content-center align-items-center p-5 no-ticket">
                                                Bạn chưa có giao dịch nào.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <div id="topUpModal" style="height: 100%;" class="custom-modal">
        <div class="custom-modal-content">
            <span class="custom-close">&times;</span>
            <div class="d-flex flex-column justify-content-center">
                <h3 class="title-payment">Nạp tiền vào ví thành viên</h3>
                <div class="content-p">
                    <p>Quý khách vui lòng chọn phương thức thanh toán và nhập số tiền cần nạp.</p>
                    <p>
                        Thành viên mới nạp tiền vào ví thành viên từ 50.000đ được tặng ngay 150 EXP.
                    </p>
                </div>
            </div>
            <form data-error="{{ asset('client/images/error.png') }}" action="{{ route('processDeposit') }}"
                id="depositForm" method="post">
                @csrf
                <div class="main-modal">
                    <div class="body_modal">
                        <div class="list-method-item list-mb8">
                            <div class="list-method-button" data-tab="1">
                                <div class="row row-16 main-payment">
                                    <div class="col" style="padding-top: 20px;">
                                        <input type="radio" name="payment_method" style="display: none;"
                                            class="payment_method" value="vnpay">
                                        <div class="title h3 color-default">
                                            Ví điện tử
                                            <span class="vnpay-logo b">
                                                <span class="vnpay-red">VN</span><span class="vnpay-blue">PAY</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-auto" style="padding-top: 20px;">
                                        <div class="icon">
                                            <img width="100%"
                                                src="https://sandbox.vnpayment.vn/paymentv2/images/icons/mics/64x64-vi-vnpay.svg"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-method-item-content" data-content="1" style="display: none;">
                                <div>
                                    <div class="list-bank list-bank-grid-4">
                                        <div class="list-mb24 list-last-mb">
                                            <div class="list-bank-search">
                                                <div class="form-group">
                                                    <div
                                                        class="input-group-wrap input-default input-size-default input-group-vertical">
                                                        <label class="input-inner-wrap">
                                                            <input type="number"
                                                                class="input input-label-change input-has-clear"
                                                                placeholder="Nhập số tiền cần nạp..."
                                                                name="amount[vnpay]">
                                                            <div class="input-frame"></div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="list-method-item list-mb8">
                            <div class="list-method-button" data-tab="2">
                                <div class="row row-16 main-payment">
                                    <div class="col" style="padding-top: 20px;">
                                        <input type="radio" name="payment_method" style="display: none;"
                                            class="payment_method" value="momo">
                                        <div class="title h3 color-default">
                                            Ví điện tử
                                            <span class="vnpay-logo b">
                                                <span class="momo-ping">Momo</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-auto" style="padding-top: 20px;">
                                        <div class="icon">
                                            <img width="100%"
                                                src="https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-method-item-content" data-content="2" style="display: none;">
                                <div>
                                    <div class="list-bank list-bank-grid-4">
                                        <div class="list-mb24 list-last-mb">
                                            <div class="list-bank-search">
                                                <div class="form-group">
                                                    <div
                                                        class="input-group-wrap input-default input-size-default input-group-vertical">
                                                        <label class="input-inner-wrap">
                                                            <input type="number"
                                                                class="input input-label-change input-has-clear"
                                                                placeholder="Nhập số tiền cần nạp..." name="amount[momo]">
                                                            <div class="input-frame"></div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="list-method-item list-mb8">
                            <div class="list-method-button" data-tab="3">
                                <div class="row row-16 main-payment">
                                    <div class="col" style="padding-top: 20px;">
                                        <input type="radio" name="payment_method" style="display: none;"
                                            class="payment_method" value="zalopay">
                                        <div class="title h3 color-default">
                                            Ví điện tử
                                            <span class="vnpay-logo b">
                                                <span class="zalopay-blue">ZALO</span><span
                                                    class="zalopay-green">PAY</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-auto" style="padding-top: 20px;">
                                        <div class="icon">
                                            <img width="100%"
                                                src="https://qcgateway.zalopay.vn/pay/v2/images/icon-zpapp-2.svg"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-method-item-content" data-content="3" style="display: none;">
                                <div>
                                    <div class="list-bank list-bank-grid-4">
                                        <div class="list-mb24 list-last-mb">
                                            <div class="list-bank-search">
                                                <div class="form-group">
                                                    <div
                                                        class="input-group-wrap input-default input-size-default input-group-vertical">
                                                        <label class="input-inner-wrap">
                                                            <input type="number"
                                                                class="input input-label-change input-has-clear"
                                                                placeholder="Nhập số tiền cần nạp..."
                                                                name="amount[zalopay]">
                                                            <div class="input-frame"></div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="close-modal" type="button">Đóng</button>
                        <button class="submit-modal">Nạp tiền</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="modalPoints" class="custom-modal" style="height: 100%;">
        <div class="custom-modal-content">
            <span class="custom-close">&times;</span>
            <div class="d-flex flex-column justify-content-center">
                <h3 class="title-payment">Quy tắc & đổi thưởng bằng điểm</h3>
            </div>
            <div class="main-modal" style="margin-top: 20px;">
                <div class="body_modal_image">
                    <div>
                        <div>
                            <table class="reward-table">
                                <thead>
                                    <tr>
                                        <th>Điểm thưởng</th>
                                        <th>Member</th>
                                        <th>VIP</th>
                                        <th>VVIP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tại Quầy Vé</td>
                                        <td>5%</td>
                                        <td>7%</td>
                                        <td>10%</td>
                                    </tr>
                                    <tr>
                                        <td class="highlight">VD: 100.000 đ</td>
                                        <td>5 Điểm</td>
                                        <td>7 Điểm</td>
                                        <td>10 Điểm</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4>1. Điều kiện để đổi thưởng</h4>
                        <ul>
                            <li>Thành viên phải đăng ký tài khoản và tài khoản <strong>Đang hoạt động</strong> không bị
                                khóa.</li>
                            <li>Tài khoản cần có đủ số điểm thưởng tối thiểu để đổi thưởng.</li>
                            <li>Không vi phạm bất kỳ quy định hoặc điều khoản nào của hệ thống BKM.</li>
                        </ul>

                        <h4>2. Cách làm tròn điểm thưởng</h4>
                        <ul>
                            <li>Từ <strong>0.1</strong> đến <strong>0.4</strong>: làm tròn xuống (Ví dụ: <strong>3.2
                                    điểm</strong> sẽ được tích vào tài khoản <strong>3 điểm</strong>).
                                Lưu ý: giao dịch có điểm tích lũy từ <strong>0.1</strong> đến <strong>0.4</strong> sẽ không
                                được tích lũy điểm do làm tròn xuống <strong>0</strong>, và đồng nghĩa với không được tích
                                lũy chi tiêu.</li>
                            <li>Từ <strong>0.5</strong> đến <strong>0.9</strong>: làm tròn lên (Ví dụ: <strong>3.6
                                    điểm</strong> sẽ được tích vào tài khoản <strong>4 điểm</strong>)</li>
                        </ul>

                        <h4>3. Thời gian xử lý yêu cầu</h4>
                        <ul>
                            <li>Trường hợp bảo trì, hệ thống sẽ thông báo thời gian xử lý qua email hoặc tin nhắn.</li>
                        </ul>

                        <h4>4. Quy định bổ sung</h4>
                        <ul>
                            <li>Hệ thống có quyền thu hồi thưởng khi phát hiện gian lận.</li>
                            <li>BKM Việt Nam sẽ không hoàn và/hoặc giải quyết đối với điểm thưởng đã được sử dụng nếu Khách
                                Hàng không chứng minh được Khách Hàng không phải là người sử dụng điểm thưởng và quyết định
                                của BKM Việt Nam là quyết định cuối cùng.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="close-modal" type="button">Đóng</button>
            </div>
        </div>
    </div>

    <div id="modalExchangeExp" style="height: 100%;" class="custom-modal">
        <div class="custom-modal-content">
            <!-- Nút đóng -->
            <span class="custom-close">&times;</span>

            <!-- Tiêu đề -->
            <div class="modal-header d-flex justify-content-center">
                <h3 class="title-payment">🎁 Quy tắc & Đổi thưởng 🎉</h3>
            </div>

            <!-- Nội dung chính -->
            <div class="main-modal">
                <div class="modal-body">
                    <p><strong>Quy tắc đổi thưởng:</strong></p>
                    <ul class="list-points">
                        <li>🎁 1. Điểm tích lũy được dùng để đổi quà tặng hấp dẫn.</li>
                        <li>🎁 2. Số điểm của bạn sẽ được đổi tương ứng với phần quà.</li>
                        <li>🎁 3. Không hoàn lại điểm sau khi đổi.</li>
                    </ul>

                    <hr>

                    <div class="text-center">
                        <h3><b>CHỌN QUÀ</b></h3>
                    </div>
                    <div class="reward-options">
                        @if (!empty($data['rewards']))
                            @foreach ($data['rewards'] as $reward)
                                <div class="reward-item">
                                    <div class="reward-image">
                                        <img src="{{ !empty($reward->image) ? asset($reward->image) : '' }}"
                                            alt="{{ !empty($reward->name) ? $reward->name : '' }}">
                                        <div class="d-flex flex-column">
                                            <p>{{ !empty($reward->name) ? $reward->name : '' }}</p>
                                            <p>Điều kiện:
                                                {{ !empty($reward->points_required) ? $reward->points_required : '' }} điểm
                                                tích lũy</p>
                                        </div>
                                    </div>
                                    <div class="reward-button">
                                        <button data-url="{{ route('rewards.redeem') }}" data-id="{{ $reward->id }}"
                                            data-points="{{ $reward->points_required }}"
                                            data-image="{{ asset('client/images/success.png') }}"
                                            data-error="{{ asset('client/images/error.png') }}"
                                            class="btn btn-success btn-redeem btn-login">Đổi ngay</button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button class="close-modal" type="button">Đóng</button>
            </div>
        </div>
    </div>
    <div id="modalVouchers" style="height: 100%;" class="custom-modal">
        <div class="custom-modal-content">
            <!-- Nút đóng -->
            <span class="custom-close">&times;</span>

            <!-- Tiêu đề -->
            <div class="modal-header d-flex justify-content-center">
                <h3 class="title-payment">MÃ GIẢM GIÁ CỦA BẠN</h3>
            </div>

            <!-- Nội dung chính -->
            <div class="main-modal">
                <div class="modal-body">
                    <div class="reward-options reward-options-tab-quatang">
                        @if (isset($data['voucherUsers']) && $data['voucherUsers']->isNotEmpty())
                            @foreach ($data['voucherUsers'] as $voucher)
                                <div class="reward-item">
                                    <div class="reward-image">
                                        <img src="{{ !empty($voucher->voucher->image) ? asset($voucher->voucher->image) : '' }}"
                                            alt="{{ !empty($reward->reward->name) ? $reward->reward->name : '' }}">
                                        <div class="d-flex flex-column" style="font-size: 14px">
                                            <p>Mã voucher:
                                                {{ !empty($voucher->voucher->code) ? $voucher->voucher->code : '' }}</p>
                                            <p>{{ !empty($voucher->voucher->name) ? $voucher->voucher->name : '' }}</p>
                                            <p>Giảm: @if ($voucher->voucher->discount_type == 'money')
                                                    {{ number_format($voucher->voucher->discount_value, 0, ',', '.') }} Vnđ
                                                @elseif($voucher->voucher->discount_type == 'percent')
                                                    {{ $voucher->voucher->discount_value }}%
                                                @else
                                                @endif
                                            </p>
                                            <p><span style="color: red">Hạn sử dụng:</span>
                                                {{ $voucher->voucher->end_date ? date('H:i d/m/Y', strtotime($voucher->voucher->end_date)) : '' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="reward-item">
                                <div class="reward-image">
                                    <div class="d-flex flex-column">
                                        <p>Bạn chưa có mã giảm giá</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button class="close-modal" type="button">Đóng</button>
            </div>
        </div>
    </div>
    <div id="modalRewards" style="height: 100%;" class="custom-modal">
        <div class="custom-modal-content">
            <!-- Nút đóng -->
            <span class="custom-close">&times;</span>

            <!-- Tiêu đề -->
            <div class="modal-header d-flex justify-content-center">
                <h3 class="title-payment">QUÀ TẶNG CỦA BẠN</h3>
            </div>

            <!-- Nội dung chính -->
            <div class="main-modal">
                <div class="modal-body">
                    <div class="reward-options reward-options-tab-quatang">
                        @if (isset($data['rewardsUser']) && $data['rewardsUser']->isNotEmpty())
                            @foreach ($data['rewardsUser'] as $reward)
                                <div class="reward-item">
                                    <div class="reward-image">
                                        <img src="{{ !empty($reward->reward->image) ? asset($reward->reward->image) : '' }}"
                                            alt="{{ !empty($reward->reward->name) ? $reward->reward->name : '' }}">
                                        <div class="d-flex flex-column">
                                            <p>Mã quà tặng: {{ !empty($reward->code) ? $reward->code : '' }}</p>
                                            <p>{{ !empty($reward->reward->name) ? $reward->reward->name : '' }}</p>
                                            <p>Trạng thái: {{ $reward->status == 1 ? 'Đã sử dụng' : 'Chưa sử dụng' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="reward-item reward-no-item">
                                <div class="reward-image">
                                    <div class="d-flex flex-column">
                                        <p>Bạn chưa có quà tặng</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button class="close-modal" type="button">Đóng</button>
            </div>
        </div>
    </div>

    <div id="modalAvatarImage" style="height: 100%;" class="custom-modal">
        <div class="custom-modal-content">
            <span class="custom-close">&times;</span>
            <div class="d-flex flex-column justify-content-center">
                <h3 class="title-payment">Chọn ảnh đại diện</h3>
            </div>
            <form data-error="{{ asset('client/images/error.png') }}" data-image="{{ asset('client/images/1.jpg') }}"
                data-success="{{ asset('client/images/success.png') }}" action="{{ route('updateAvatar') }}"
                id="updateAvatarForm" method="post" enctype="multipart/form-data">
                @csrf
                <div class="main-modal" style="margin-top: 33px;">
                    <div class="body_modal_image">
                        <div class="">
                            <input type="hidden" name="image" id="avatar" value="">
                            <label class="input-inner-wrap-image">
                                <input type="file" class="" name="user[image]"
                                    accept=".jpg, .jpeg, .png, .webp" id="avatarInput">
                                <div class="input-extend input-extend-right">
                                    <div class="input-box-image input-ic-clear"></div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="submit-modal">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script type="module" src="{{ asset('client/js/auth/auth.js') }}"></script>
    <script type="module" src="{{ asset('client/js/auth/reward.js') }}"></script>
    <script type="module" src=" {{ asset('/js/client/order.js') }} "></script>

@endsection
