@extends('client.layouts.main')

@section('title', 'BKM Cinemas - Rạp chiếu phim 3D công nghệ hàng đầu.')

@section('css')
    <link rel="stylesheet" href="{{ asset('client/css/home.css') }}">
@endsection

@section('content')
    @if (isset($sliders) && $sliders->count() > 0)
        <section>
            <div id="main-slider" class="owl-carousel">
                @foreach ($sliders as $item)
                    <div class="item">
                        <a href="{{ route('movie.detail', $item->slug) }}">
                            <img width="1600" src="{{ asset($item->banner_movie) }}" alt="{{ $item->title }}" />
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <section id="home-movie">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nowshowing active">
                    <a data-toggle="tab" href="#nowshowing">
                        <img src="{{ asset('client/images/icons/icon-ticket.png') }}" alt="Phim đang chiếu" />
                        <span>Phim đang chiếu</span>
                    </a>
                    <span class="border"></span>
                </li>
                <li class="comingsoon">
                    <a data-toggle="tab" href="#comingsoon">
                        <span>Phim sắp chiếu</span>
                        <img src="{{ asset('client/images/icons/icon-sap-chieu.png') }}" alt="Phim đang chiếu" />
                    </a>
                    <span class="border"></span>
                </li>
            </ul>

            <div class="tab-content">
                <div id="nowshowing" class="tab-pane fade in active">
                    @if (isset($movieIsShowing) && $movieIsShowing->count() > 0)
                        <div class="owl-carousel" id="nowshowing-slider">
                            @foreach ($movieIsShowing as $item)
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="{{ route('movie.detail', $item->slug) }}">
                                            <img class="img-responsive" src="{{ asset($item->image) }}"
                                                 alt="{{ $item->title }}">
                                        </a>
                                        <div class="info">
                                            <a href="{{ route('movie.detail', $item->slug) }}" class="button detail">
                                                Chi tiết
                                            </a>

                                            <a class="button ticket video-play-button" data-toggle="modal"
                                               href="#modal-trailer-{{ $item->id }}">
                                                Trailer <img src="https://cdn-icons-png.flaticon.com/512/777/777242.png"
                                                             alt="Trailer">
                                            </a>
                                            <p class="button duration">
                                                <b>Thời lượng: </b>
                                                {{ $item->duration }} phút
                                            </p>
                                            <p class=" category">
                                                <b>Thể loại:</b>
                                                @if ($item->movieGenre->count() > 0)
                                                    @foreach ($item->movieGenre as $genre)
                                                        {{ $loop->index > 0 ? ', ' : '' }}{{ $genre->genres->name }}
                                                    @endforeach
                                                @else
                                                    Chưa cập nhật
                                                @endif
                                            </p>
                                            <p class="button format">
                                                <b>Định dạng</b>
                                                {{ $item->format }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2>
                                            <a href="{{ route('movie.detail', $item->slug) }}">
                                                {{ $item->title }}
                                            </a>
                                        </h2>
                                        <p class="release">Khởi chiếu {{ $item->premiere_date }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div id="comingsoon" class="tab-pane fade">
                    @if (isset($upComingMovie) && $upComingMovie->count() > 0)
                        <div class="owl-carousel" id="comingsoon-slider">
                            @foreach ($upComingMovie as $item)
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="{{ route('movie.detail', $item->slug) }}">
                                            <img class="img-responsive" src="{{ asset($item->image) }}"
                                                 alt="{{ $item->title }}">
                                        </a>
                                        <div class="info">
                                            <a href="{{ route('movie.detail', $item->slug) }}" class="button detail">
                                                Chi tiết
                                            </a>

                                            <a class="button ticket video-play-button" data-toggle="modal"
                                               href="#modal-trailer-{{ $item->id }}">
                                                Trailer <img src="https://cdn-icons-png.flaticon.com/512/777/777242.png"
                                                             alt="Trailer">
                                            </a>
                                            <p class="button duration">
                                                <b>Thời lượng: </b>
                                                {{ $item->duration }} phút
                                            </p>
                                            <p class=" category">
                                                <b>Thể loại:</b>
                                                @if ($item->movieGenre->count() > 0)
                                                    @foreach ($item->movieGenre as $genre)
                                                        {{ $loop->index > 0 ? ', ' : '' }}{{ $genre->genres->name }}
                                                    @endforeach
                                                @else
                                                    Chưa cập nhật
                                                @endif
                                            </p>
                                            <p class="button format">
                                                <b>Định dạng</b>
                                                {{ $item->format }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2>
                                            <a href="{{ route('movie.detail', $item->slug) }}">
                                                {{ $item->title }}
                                            </a>
                                        </h2>
                                        <p class="release">Khởi chiếu {{ $item->premiere_date }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <section class="mt-3">
            <div class="row">
                <div class="col-12 home-banner-imager">
                    <img width="100%" src="{{ asset('client/images/mery-banner.jpg') }}" alt="">
                </div>
            </div>
        </section>
    </section>

    <section id="home-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    @if (isset($postPromotion) && !$postPromotion->isEmpty())
                        <div id="promotion">
                            <div class="title">
                                <h2>Ưu đãi - Sự kiện</h2>
                            </div>
                            <div class="owl-carousel owl-loaded owl-drag" id="promotion-slider">
                                @foreach ($postPromotion as $item)
                                    <div class="post-item">
                                        <div class="post-thumbnail">
                                            <a
                                                href="{{ route('post.detail', ['cate_slug' => 'khuyen-mai', 'slug' => $item->slug]) }}">
                                                <img class="img-responsive" src="{{ asset($item->avatar) }}"
                                                     alt="{{ $item->name }}">
                                            </a>
                                        </div>
                                        <h3>
                                            <a
                                                href="{{ route('post.detail', ['cate_slug' => 'khuyen-mai', 'slug' => $item->slug]) }}">
                                                {{ $item->name }}
                                            </a>
                                        </h3>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if (isset($postReviews) && !$postReviews->isEmpty())
                        <div id="carousel-post" class="carousel slide">
                            <div class="post-arrow"></div>
                            <div class="clearfix"></div>
                            <div class="title">
                                <h2>Đánh giá phim</h2>
                                <ol class="carousel-indicators">
                                    @foreach ($postReviews as $item)
                                        <li data-target="#carousel-post" data-slide-to="{{ $loop->index }}"
                                            class="{{ $loop->index == 0 ? 'active' : '' }}"></li>
                                    @endforeach
                                </ol>
                            </div>
                            <div class="list-post">
                                <div class="carousel-inner">
                                    @foreach ($postReviews as $item)
                                        <div class="item  {{ $loop->index == 0 ? 'active' : '' }} ">
                                            @foreach ($item as $childitem)
                                                <div class="post-item">
                                                    <div class="post-thumbnail">
                                                        <a
                                                            href="{{ route('post.detail', ['cate_slug' => 'danh-gia-phim', 'slug' => $childitem->slug]) }}">
                                                            <img class="img-responsive"
                                                                 src="{{ asset($childitem->avatar) }}"
                                                                 alt="Review phim Con lắc tà thuật – The Hypnosis">
                                                        </a>
                                                    </div>
                                                    <div class="post-detail">
                                                        <h3>
                                                            <a
                                                                href="{{ route('post.detail', ['cate_slug' => 'danh-gia-phim', 'slug' => $childitem->slug]) }}">
                                                                {{ $childitem->name }}
                                                            </a>
                                                        </h3>
                                                        <div class="description">
                                                            {{ Str::limit($childitem->description, 500, '...') }}</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 sidebar">
                    @if ($postRewards)
                        <div class="widget-ticket">
                            <h2>
                                <img class="w-65" src="{{ asset('client/images/qua-tang.png') }}" alt="Quà tặng">
                                <span>Quà tặng</span>
                                <div class="border"></div>
                            </h2>
                        </div>
                        <div class="list">
                            @foreach ($postRewards->posts as $item)
                                <a href="{{ route('post.detail', ['cate_slug' => 'qua-tang', 'slug' => $item->slug]) }}">
                                    <div class="poster">
                                        <img style="height: 200px;width: 100%;object-fit: cover;"
                                             src="{{ asset($item->avatar) }}" alt="">
                                        <h5 class="text">{{ $item->name }}</h5>
                                    </div>
                                </a>
                                <span style="font-size: 13px;" class="date"><i class="fa-regular fa-clock"></i> {{ $item->created_at->format('d/m/Y') }}</span>
                                @if ($loop->index == 3)
                                    @break
                                @endif
                            @endforeach
                        </div>
                        <div class="related-movie">
                            @if ($postRewards->count() > 4)
                                <div class="view-more">
                                    <a href="{{ route('movie') }}">
                                        <div class="text-pink">xem thêm</div>
                                        <div class="arrow-down"></div>
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>

    {{-- modal trailer --}}
    @if (isset($movieIsShowing) && $movieIsShowing->count() > 0)
        @foreach ($movieIsShowing as $isShowing)
            <div class="modal fade in" id="modal-trailer-{{ $isShowing->id }}" style="display: none;">
                <div class="modal-dialog modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" title="Đóng"
                                    aria-hidden="true">×
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="video-container video-trailer--home">
                                <iframe src="{{ $isShowing->trailer_url }}" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    @if (isset($upComingMovie) && $upComingMovie->count() > 0)
        @foreach ($upComingMovie as $coming)
            <div class="modal fade in" id="modal-trailer-{{ $coming->id }}" style="display: none;">
                <div class="modal-dialog modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" title="Đóng"
                                    aria-hidden="true">×
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="video-container video-trailer--home">
                                <iframe src="{{ $coming->trailer_url }}" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            const locationKey = "selectedCinemaLocation";
            function checkLocation() {
                const selectedLocation = sessionStorage.getItem(locationKey);
                if (!selectedLocation) {
                    $(".mfp-wrap").fadeIn();
                    $(".mfp-bg").fadeIn();
                }
            }
            checkLocation();
            $(".location-select-button").on("click", function (e) {
                e.preventDefault();
                const location = $(this).data("location");
                if (location) {
                    sessionStorage.setItem(locationKey, location);
                    $(".mfp-wrap").fadeOut();
                    $(".mfp-bg").fadeOut();
                }
            });
        });
    </script>
@endsection
