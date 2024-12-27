<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>@yield('title')</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="cinema_id" content="{{ auth()->user()->cinema_id ?? '' }}">
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
    <link rel="shortcut icon" href="{{ asset('client/images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('icons/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/wow-master/css/libs/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select-country/css/bootstrap-select-country.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/swiper/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/swiper.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/nestable2/css/jquery.nestable.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/movies.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_monaco.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_image.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_auth.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/monaco-editor-0.51.0/package/min/vs/editor/editor.main.css') }}">
    <script src="{{ asset('js/admin/chart/chart.js') }}"></script>

    @yield('css')
    @routes
</head>

<body>

    <div id="main-wrapper" class="wallet-open show">

        @include('admin.partials.nav-header')
        <!--**********************************
        Nav header end
    ***********************************-->

        <!--**********************************
        Chat box start
    ***********************************-->

        @include('admin.partials.chatbox')

        <!--**********************************
        Chat box End
    ***********************************-->

        <!--**********************************
        Header start
    ***********************************-->

        @include('admin.partials.header')

        <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

        <!--**********************************
        Sidebar start
    ***********************************-->

        @include('admin.partials.sidebar')
        <!--**********************************
        Sidebar end
    ***********************************-->

        <!--**********************************
    Content body start
***********************************-->

        <div class="content-body default-height">

            @yield('content')

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel-1"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel-1">Contact</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <label class="form-label d-block mb-2">Enter Name</label>
                            <input type="text" class="form-control w-100 mb-3" placeholder="Name">

                            <label class="form-label d-block mb-2">Enter Position</label>
                            <input type="text" class="form-control w-100" placeholder="Position">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light"
                                data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Modal-->

            <div class="modal fade" id="chat_model" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <label class="form-label d-block">Enter Name</label>
                            <input type="text" class="form-control w-100" placeholder="Username">

                            <label class="form-label d-block mt-3">Enter Position</label>
                            <input type="text" class="form-control w-100" placeholder="Username">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
    Content body end
***********************************-->

        <!--**********************************
    Footer start
***********************************-->

        @include('admin.partials.footer')

        <!--**********************************
        Footer end
    ***********************************-->
    </div>

    <script>
        var csrfToken =
            '6UsI/VzpvvWmiciweCDL2/ZKJKxd8AX+Yx7AXUd6essC8C7/uqMqGa6XEkOUUntCsmLeWlxZi0dZK1A4LaSYpU4/NLiI/l6RlH8TyGSRZ50Bf6U/f09N/DbDT5nZlh4sl/IhJqNrTHWAVeZsPWC+JA==';
    </script>
    <script>
        var asset_base_url = '{{ asset('icons/line-awesome/fonts/la-solid-900.woff2') }}';
    </script>
    <script>
        const BASE_URL = '{{ asset('icons/line-awesome/fonts/la-solid-900.woff2') }}';
    </script>

    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <!-- Page level css : Dashboard 2 -->

    <script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/select2-init.js') }}"></script>
    <script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('vendor/nestable2/js/jquery.nestable.min.js') }}"></script>

    <script src="{{ asset('vendor/chart-js/chart.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('vendor/swiper/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('vendor/wow-master/dist/wow.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
    <script src="{{ asset('vendor/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select-country/js/bootstrap-select-country.min.js') }}"></script>
    <script src="{{ asset('vendor/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/cms.js') }}"></script>
    <script src="{{ asset('js/plugins-init/nestable-init.js') }}"></script>


    <script type="module">
        @if (session()->has('status_succeed'))
            toastr.success('{{ session()->pull('status_succeed') }}', {
                timeOut: 1000
            });
        @endif

        @if (session()->has('status_failed'))
            toastr.error('{{ session()->pull('status_failed') }}', {
                timeOut: 1000
            });
        @endif
    </script>

    <!-- Monaco Editor  -->
    <script src="{{ asset('libs/monaco-editor-0.51.0/package/min/vs/loader.js') }}"></script>
    <script src="{{ asset('js/admin/monacos/monaco.js') }}"></script>
    <!-- End Monaco Editor  -->

    <!-- Page level Js : Dashboard 2  -->
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/admin/commons/customCkeditor.js') }}"></script>
    <script src="{{ asset('js/dlabnav-init.js') }}"></script>

    <script src="{{ asset('js/admin/change-images/image.js') }}"></script>
    <script src="{{ asset('js/admin/ajaxs/change.js') }}"></script>
    <script src="{{ asset('js/admin/ajaxs/deteleMultipleChecked.js') }}"></script>
    <script src="{{ asset('js/admin/ajaxs/removeImage.js') }}"></script>
    <script src="{{ asset('js/admin/ajaxs/removeImageRelate.js') }}"></script>
    <script src="{{ asset('js/admin/commons/common.js') }}"></script>
    <script src="{{ asset('js/admin/commons/movies/createNewActorMovie.js') }}"></script>
    <script src="{{ asset('js/admin/commons/changeCheckbox.js') }}"></script>
    <script src="{{ asset('js/admin/commons/format-price.js') }}"></script>
    <script src="{{ asset('js/plugins-init/swiper.min.js') }}"></script>
    <script type="module" src="{{ asset('js/main.js') }}"></script>
    @yield('js')

</body>

</html>
