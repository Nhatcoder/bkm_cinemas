<!DOCTYPE html>
<html lang="vi">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="user_id" content="{{ auth()->user()->id ?? '' }}">
    <meta name="transaction_succeed" content="{{ session('transaction_succeed') }}">
    <meta name="transaction_failed" content="{{ session('transaction_failed') }}">
    <meta name="status_failed" content="{{ session('status_failed') }}">
    <meta name="amount" content="{{ number_format(session()->get("amount"), 0, '.', ',') }}">
    <meta name="exp" content="{{ session()->get("exp") }}">
    <meta name="points" content="{{ session()->get("points") }}">
    <meta name="image-success" content="{{ asset("client/images/success.png") }}">
    <meta name="image-error" content="{{ asset("client/images/error.png") }}">
    <title>@yield('title')</title>
    <meta name="description"
        content="Rạp chiếu phim Touch Cinema với chất lượng âm thanh & hình ảnh đạt chuẩn quốc tế đầu tiên tại Pleiku, Gia Lai. Đặt vé ngay hôm nay để nhận được nhiều ưu đãi!">
    <meta property="og:title" content="Touch Cinema - Rạp chiếu phim công nghệ hiện đại đầu tiên tại Gia Lai" />
    <meta property="og:description"
        content="Rạp chiếu phim Touch Cinema với chất lượng âm thanh & hình ảnh đạt chuẩn quốc tế đầu tiên tại Pleiku, Gia Lai. Đặt vé ngay hôm nay để nhận được nhiều ưu đãi!" />
    <meta property="og:image" content="https://touchcinema.com//images/touchcinema.jpg" />
    <meta name="twitter:title" content="Touch Cinema - Rạp chiếu phim công nghệ hiện đại đầu tiên tại Gia Lai" />
    <meta name="twitter:description"
        content="Rạp chiếu phim Touch Cinema với chất lượng âm thanh & hình ảnh đạt chuẩn quốc tế đầu tiên tại Pleiku, Gia Lai. Đặt vé ngay hôm nay để nhận được nhiều ưu đãi!" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset('client/images/favicon.ico') }}">
    <meta name="robots" content="all">
    <meta name="DC.title" content="Rạp Chiếu Phim Touch Cinema" />
    <meta name="geo.region" content="VN" />
    <meta name="geo.placename" content="Pleiku" />
    <meta name="geo.position" content="13.975171;108.014852" />
    <meta name="ICBM" content="13.975171, 108.014852" />
    <meta name="theme-color" content="#ea3b92" />

    <link rel="stylesheet" href="{{ asset('libs/fontawesome-free-6.6.0-web/css/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=vietnamese" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&amp;subset=latin,latin-ext"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('libs/fontawesome-free-6.6.0-web/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('client/js/statics/plugins/owl-carousel/assets/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('client/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/style_movie.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/style_auth.css') }}">
    <!-- CSRF Token -->


    @yield('css')
</head>

<body>
    <div id="fb-root"></div>
    <div id="app">
        @include('client.partials.header')
        <div id="wrap">
            @yield('content')
        </div>
        @include('client.partials.footer')
        <div class="modal fade" id="modal-login">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Đăng nhập</h4>
                    </div>
                    <div class="modal-body">
                        <div id="login">
                            <div class="row">
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="login-method">Đăng nhập bằng tài khoản</div>
                                    <form name="sloginform" class="sgp-login-form"
                                        action="https://touchcinema.com/login" method="post">
                                        <input type="hidden" name="_token"
                                            value="BXV7TW2mEar4PBN8BArnTk122Kc6ghxfnEGHC0fk">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" value=""
                                                placeholder="Địa chỉ Email" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Mật khẩu" required />
                                        </div>
                                        <div class="form-group">
                                            <input name="remember" class="rememberme" type="checkbox" checked="checked"
                                                value="forever" /> Nhớ mật khẩu
                                            <span>
                                                <a href="password/reset.html">Quên mật khẩu</a>
                                            </span>
                                        </div>
                                        <input type="submit" name="swp-submit" class="btn btn-success"
                                            value="Đăng nhập" />
                                    </form>
                                </div>
                                <div class="col-md-2 col-sm-2 hidden-xs">
                                    <div>Hoặc</div>
                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="login-method">Đăng nhập bằng tài khoản mạng xã hội</div>
                                    <a class="login-social"
                                        href="https://www.facebook.com/v3.0/dialog/oauth?client_id=1700069773628064&amp;redirect_uri=https%3A%2F%2Ftouchcinema.com%2Fauth%2Ffacebook%2Fcallback&amp;scope=email&amp;response_type=code"
                                        title="Login with facebook">
                                        <img class="img-responsive" src="{{ asset('client/images/fb.png') }}"
                                            alt="Facebook" /></a>
                                    <a class="login-social"
                                        href="https://accounts.google.com/o/oauth2/auth?client_id=466904351297-msl2laa82gh9ugqhp3n0j6gor1c6kr9k.apps.googleusercontent.com&amp;redirect_uri=https%3A%2F%2Ftouchcinema.com%2Fauth%2Fgoogle%2Fcallback&amp;scope=openid+profile+email&amp;response_type=code"
                                        title="Login with google"><img class="img-responsive"
                                            src="{{ asset('client/images/gp.png') }}" alt="Google" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="main-popup">
        <div class="main-popup-content">
            <img src="https://touchcinema.com/storage/slide-web/1920wx1080h-13-1729583438.jpg" />
        </div>
    </div> --}}

    <div id="notification">
        <div class="setting-content">
            <a href="javascript:;" class="setting-noti register" data-toggle="popover"
                data-content="Đăng ký để nhận thông báo mới nhất về lịch chiếu và các chương trình khuyến mãi"
                data-placement="left" data-trigger="hover">
                <i class="fa fa-bell" aria-hidden="true"></i>
                <div class="animated infinite zoomIn circle"></div>
                <div class="animated infinite pulse fill"></div>
            </a>
        </div>
        <div class="bell-popup" id="setting-setup">
            <div class="bell-title">Cài đặt thông báo</div>
            <div class="divider"></div>
            <div class="bell-content">
                <div class="bell-group">
                    <input id="bell-web_post" type="checkbox" name="topic[]" value="posts">
                    <label for="bell-web_post">Đăng ký nhận tin tức, khuyến mãi</label>
                </div>
                <div class="bell-group">
                    <input id="bell-web_movie" type="checkbox" name="topic[]" value="movies">
                    <label for="bell-web_movie">Đăng ký nhận thông tin phim mới</label>
                </div>
                <div class="divider"></div>
                <div class="bell-group bell-gr-btn">
                    <button type="button" id="update-notification">Cập nhật</button>
                    <button type="button" id="cancel-notification">Hủy đăng ký</button>
                </div>
            </div>
        </div>
        <div class="bell-popup" id="setallow">
            <div class="bell-title">Mở khóa thông báo</div>
            <div class="divider"></div>
            <div class="bell-content">
                <p>Hãy làm theo hướng dẫn sau để cho phép thông báo</p>
                <a href="" target="_blank">
                    <img src="" />
                </a>
            </div>
        </div>
        <div class="bell-popup" id="boxregister">
            <div class="bell-title">Quản lý thông báo</div>
            <div class="divider"></div>
            <div class="bell-content">
                <a href="" target="_blank">
                    <img src="" />
                </a>
                <div class="bell-group bell-gr-btn">
                    <button type="button" id="register">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>

        <div id="venom-popup" style="display: none;">
            <div class="venom-content">
                <button type="button" id="fragmentClose">close</button>
                <img src="{{ asset("client/images/V3_Popcorn-min.gif") }}" />
            </div>
        </div>

    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>
</body>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v21.0"></script>

<!-- Scripts -->
<script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('client/js/statics/js/jquery.js') }}"></script>
<script src="{{ asset('client/js/jquery/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('libs/bootstrap/3.3.6/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('vendor/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendor/datepicker/js/bootstrap-datepicker.vi.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/js/statics/js/scripts.js') }}"></script>
<script src="{{ asset('client/js/statics/js/showtime-widget.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/js/statics/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
<script type="module" src="{{ asset('client/js/commons/common.js') }}"></script>
<script src="{{ asset('client/js/footer.js')}}"></script>
<script src="{{ asset('client/js/header.js')}}"></script>

 @vite(['resources/js/app.js'])
@yield('js')

</html>
