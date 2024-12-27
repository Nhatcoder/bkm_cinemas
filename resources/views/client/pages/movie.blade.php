@extends('client.layouts.main')

@section('title', 'BKM Cinemas - Rạp chiếu phim 3D công nghệ hàng đầu.')

@section('css')

@endsection

@section('content')
    <section id="home-movie" class="page-list-movie">
        <div class="container">
            <h1 style="display: block;margin-top: -46px;text-align: left;color: #FFF;">Danh sách phim</h1>
            <ul class="nav nav-tabs" style="margin-top: 0;">
                <li class="nowshowing active">
                    <a data-toggle="tab" href="#phimdangchieu" aria-expanded="true">
                        <img src="{{ asset('client/images/icons/icon-ticket.png') }}" alt="Phim đang chiếu">
                        <span>Phim đang chiếu</span>
                    </a>
                    <span class="border"></span>
                </li>
                <li class="comingsoon">
                    <a data-toggle="tab" href="#phimsapchieu" aria-expanded="false">
                        <span>Phim sắp chiếu</span>
                        <img src="{{ asset('client/images/icons/icon-sap-chieu.png') }}" alt="Phim sắp chiếu">
                    </a>
                    <span class="border"></span>
                </li>
            </ul>

            <div class="tab-content">
                <div id="phimdangchieu" class="tab-pane active fade in">
                    <div class="row row-eq-height">
                        @if (!empty($movieIsShowing))
                            @foreach ($movieIsShowing as $movie)
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="movie" style="padding-top: 30px;">
                                        <div class="poster">
                                            <a href="{{ route('movie.detail', $movie->slug) }}">
                                                <img class="img-responsive" src="{{ asset($movie->image) }}"
                                                    alt="{{ $movie->title }}">
                                            </a>
                                            <div class="info">
                                                <a href="{{ route('movie.detail', $movie->slug) }}" class="button detail">
                                                    Chi tiết
                                                </a>

                                                <a class="button ticket video-play-button" data-toggle="modal"
                                                    href="#modal-trailer-{{ $movie->id }}">
                                                    Trailer <img src="{{ asset('/images/trailer.png') }}"
                                                        alt="Trailer">
                                                </a>
                                                <p class="button duration"><b>Thời lượng: </b>{{ $movie->duration }} phút</p>
                                                <p class=" category">
                                                    <b>Thể loại:</b>
                                                    @if ($movie->movieGenre->count() > 0)
                                                        @foreach ($movie->movieGenre as $genre)
                                                            {{ $loop->index > 0 ? ', ' : '' }}{{ $genre->genres->name }}
                                                        @endforeach
                                                    @else
                                                        Chưa cập nhật
                                                    @endif
                                                </p>
                                                <p class="button format"><b>Định dạng</b> {{ $movie->format }} </p>
                                            </div>
                                        </div>
                                        <div class="detail">
                                            <h2>
                                                <a
                                                    href="{{ route('movie.detail', $movie->slug) }}">{{ $movie->title }}</a>
                                            </h2>
                                            <p class="release">Khởi chiếu {{ $movie->premiere_date }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div id="phimsapchieu" class="tab-pane fade">
                    <div class="row row-eq-height">
                        @if (!empty($upComingMovie))
                            @foreach ($upComingMovie as $movie)
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="movie" style="padding-top: 30px;">
                                        <div class="poster">
                                            <a href="{{ route('movie.detail', $movie->slug) }}">
                                                <img class="img-responsive" src="{{ asset($movie->image) }}"
                                                    alt="{{ $movie->title }}">
                                            </a>
                                            <div class="info">
                                                <a href="{{ route('movie.detail', $movie->slug) }}" class="button detail">
                                                    Chi tiết
                                                </a>

                                                <a class="button ticket video-play-button" data-toggle="modal"
                                                    href="#modal-trailer-{{ $movie->id }}">
                                                    Trailer <img src="https://cdn-icons-png.flaticon.com/512/777/777242.png"
                                                        alt="Trailer">
                                                </a>
                                                <p class="button duration">
                                                    <b>Thời lượng: </b>
                                                    {{ $movie->duration }} phút
                                                </p>
                                                <p class=" category">
                                                    <b>Thể loại:</b>
                                                    @if ($movie->movieGenre->count() > 0)
                                                        @foreach ($movie->movieGenre as $genre)
                                                            {{ $loop->index > 0 ? ', ' : '' }}{{ $genre->genres->name }}
                                                        @endforeach
                                                    @else
                                                        Chưa cập nhật
                                                    @endif
                                                </p>
                                                <p class="button format">
                                                    <b>Định dạng</b>
                                                    {{ $movie->format }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="detail">
                                            <h2>
                                                <a href="{{ route('movie.detail', $movie->slug) }}">
                                                    {{ $movie->title }}
                                                </a>
                                            </h2>
                                            <p class="release">Khởi chiếu {{ $movie->premiere_date }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (!empty($movieIsShowing))
        @foreach ($movieIsShowing as $isShowing)
            <div class="modal fade in" id="modal-trailer-{{ $isShowing->id }}" style="display: none;">
                <div class="modal-dialog modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" title="Đóng" aria-hidden="true">×
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

    @if (!empty($upComingMovie))
        @foreach ($upComingMovie as $coming)
            <div class="modal fade in" id="modal-trailer-{{ $coming->id }}" style="display: none;">
                <div class="modal-dialog modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" title="Đóng" aria-hidden="true">×
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
@endsection
