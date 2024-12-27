<!DOCTYPE html>
<html lang="vi">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <title>Đặt vé</title>

    <meta name="robots" content="noindex,nofollow">
    <meta property="og:title" content="Đặt vé" />
    <meta name="twitter:title" content="Đặt vé" />
    <link rel="canonical" href="">
    <meta charset="utf-8">
    <meta property="fb:pages" content="1853915061599035" />
    <meta name="google-site-verification" content="SxvPRCl-fvBTkk86cD376h47_B7wRg2KKYywKfqE9ic" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="all">
    <meta name="DC.title" content="Rạp Chiếu Phim Touch Cinema" />
    <meta name="geo.region" content="VN" />
    <meta name="geo.placename" content="Pleiku" />
    <meta name="geo.position" content="13.975171;108.014852" />
    <meta name="ICBM" content="13.975171, 108.014852" />
    <meta name="theme-color" content="#ea3b92" />

    <link rel="shortcut icon" type="image/png" src="{{ asset('images/favicon.ico') }}" />

    <!-- CSRF Token -->
    <meta name="csrf_token" content="BXV7TW2mEar4PBN8BArnTk122Kc6ghxfnEGHC0fk">
    <!-- Latest compiled and minified CSS & JS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('client/js/statics/plugins/owl-carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/ticket.css') }}">
    <!-- CSRF Token -->
    @yield('css')


</head>

<body>
    <div id="fb-root"></div>
    <div id="app">
        @yield('content')
        <div id="layer">
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=vietnamese" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <style type="text/css">
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: Quicksand, Roboto, sans-serif;
        }

        body {
            font-size: 16px;
            font-weight: 500;
            color: #000;
        }

        .page-post-detail .post-detail .post-content {
            font-size: 16px;
        }

        .list-post .post-item .post-detail .description {
            font-weight: 500;
        }

        .page-showtime .container .showtime-movie .star {
            width: max-content;
        }
    </style>
    <!-- Scripts -->
    <script src="https://touchcinema.com/statics/frontend/js/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script type="text/javascript"
        src="https://touchcinema.com/statics/frontend/plugins/scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $(window).on("load", function() {
            var Mwidth = 1100
            if ($("#map").width() < Mwidth) {
                var percent = $("#map").width() / Mwidth
                $(".maps").css({
                    'transform': 'scale(' + percent + ')',
                    'height': 895 * percent + 'px'
                })
            }
            $("#layer,#maps .seat,.show-combo, .show-login").on('click', function() {
                $("#tab-combo").toggleClass('slide');
            });
            $('#enterGuest').click(function() {
                $("#enterGuestError").hide();
                $('#guestname,#guestphone,#guestemail').removeClass('error');
                var username = $('#guestname').val();
                var userphone = $('#guestphone').val();
                var useremail = $('#guestemail').val();
                var error = false;
                if (username == '') {
                    $('#guestname').addClass('error');
                    error = true;
                }
                if (userphone == '') {
                    $('#guestphone').addClass('error');
                    error = true;
                }
                var phoneformat =
                    /(086|096|097|098|032|033|034|035|036|037|038|039|089|090|093|070|079|077|076|078|088|091|094|083|084|085|081|082|092|056|058|099|059)\d{7}$/;
                if (!userphone.match(phoneformat)) {
                    $('#phoneFormatError').show();
                    $('#guestphone').addClass('error');
                    error = true;
                } else {
                    $('#phoneFormatError').hide();
                }
                if (useremail == '') {
                    $('#guestemail').addClass('error');
                    error = true;
                }
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if (!useremail.match(mailformat)) {
                    $('#emailFormatError').show();
                    $('#guestemail').addClass('error');
                    error = true;
                } else {
                    $('#emailFormatError').hide();
                }

                if (error) {
                    $("#enterGuestError").show();
                    return false;
                }
                $.ajax({
                    url: 'https://touchcinema.com/dat-ve/nhap-thong-tin',
                    type: 'POST',
                    data: {
                        username: username,
                        userphone: userphone,
                        useremail: useremail
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.status == 'failed') {
                            bootbox.alert({
                                message: data.msg,
                                backdrop: true,
                            });
                        } else {
                            if (data.status == 1) {
                                bootbox.confirm({
                                    message: `Số điện thoại / Email này đã có tài khoản thành viên.
                                    Bạn cần phải <a href="https://touchcinema.com/login"><strong class="note-nologin">ĐĂNG NHẬP</strong></a> mua vé để hưởng ưu đãi và tích điểm.`,
                                    buttons: {
                                        confirm: {
                                            label: 'Đăng nhập',
                                            className: 'btn btn-sm btn-success'
                                        },
                                        cancel: {
                                            label: 'Bỏ qua',
                                            className: 'btn btn-sm btn-default'
                                        }
                                    },
                                    callback: function(result) {
                                        if (result === false) {
                                            location.reload();
                                        } else {
                                            window.location.href =
                                                `https://touchcinema.com/login`;
                                        }
                                    }
                                });
                            } else {
                                location.reload();
                            }

                        }
                    },
                    error: function() {
                        bootbox.alert({
                            message: "Lỗi kết nối tới server! Vui lòng thử lại",
                            backdrop: true,
                        });
                    }
                })
            })
        });
    </script>


    <!-- Scripts -->
    <script src="{{ asset('client/js/statics/js/jquery.js') }}"></script>
    <script src="{{ asset('client/js/jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/3.3.6/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client/js/statics/js/scripts.js') }}"></script>
    <script src="{{ asset('client/js/statics/js/showtime-widget.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client/js/statics/plugins/owl-carousel/owl.carousel.min.js') }}"></script>

    @yield('js')
</body>


</html>