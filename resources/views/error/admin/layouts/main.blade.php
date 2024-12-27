<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<head>
    <title>@yield('title')</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Dexignlabs">
    <meta name="robots" content="">

    <meta name="keywords"
          content="admin dashboard, admin template, analytics, bootstrap, bootstrap 5 admin template, finance admin, admin, modern, responsive admin dashboard, sales dashboard, sass, ui kit, web app, bootstrap5, admin panel, Crypto Trading, Cryptocurrency, Trading Platform, Financial Insights, Efficiency, Data Visualization, User-Friendly, User Interface, Investment, Financial Management, Trading Tools, Performance Metrics, Real-Time Data, Portfolio Optimization, bitcoin, share market">
    <meta name="description"
          content="Unlock the full potential of data through the FinLab Crypto Trading Admin Dashboard Template. Seamlessly optimize your cryptocurrency trading activities with this elegantly designed and user-friendly dashboard, meticulously crafted to elevate both your financial insights and operational efficiency.">
    <meta property="og:title" content="FinLab Crypto Trading Admin Dashboard Template | Dexignlabs">
    <meta property="og:description"
          content="Unlock the full potential of data through the FinLab Crypto Trading Admin Dashboard Template. Seamlessly optimize your cryptocurrency trading activities with this elegantly designed and user-friendly dashboard, meticulously crafted to elevate both your financial insights and operational efficiency.">
    <meta property="og:image" content="../../social-image.html">
    <meta name="format-detection" content="telephone=no">
    <meta name="twitter:title" content="FinLab CakePHP Crypto Trading Admin Dashboard Template | Dexignlabs">
    <meta name="twitter:description"
          content="Unlock the full potential of data through the FinLab Crypto Trading Admin Dashboard Template. Seamlessly optimize your cryptocurrency trading activities with this elegantly designed and user-friendly dashboard, meticulously crafted to elevate both your financial insights and operational efficiency.">
    <meta name="twitter:image" content="../../social-image.html">
    <meta name="twitter:card" content="summary_large_image">
    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('icons/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/wow-master/css/libs/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select-country/css/bootstrap-select-country.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/swiper/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/nestable2/css/jquery.nestable.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_monaco.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_image.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/monaco-editor-0.51.0/package/min/vs/editor/editor.main.css') }}">
    @yield('css')
</head>

<body>

<div class="fix-wrapper">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<!-- Page level css : Dashboard 2 -->

<script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('vendor/toastr/js/toastr.min.js') }}"></script>

<!-- Page level Js : Dashboard 2  -->
<script src="{{ asset('js/custom.min.js') }}"></script>

@yield('js')

</body>

</html>
