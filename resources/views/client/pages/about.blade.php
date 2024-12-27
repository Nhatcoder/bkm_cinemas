@extends('client.layouts.main')

@section('title', 'Giới thiệu')

@section('css')

@endsection

@section('content')
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-3 col-sm-3">
                    <ul class="nav nav-tabs">
                        @foreach ($abouts as $item)
                            <li class="{{ $loop->index == 0 ? 'active' : ''}}">
                                <a data-toggle="tab" href="#{{ $item->slug }}">
                                    {{ $item->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-9 col-sm-9">
                    <div id="carousel-id" class="owl-carousel">
                        @foreach ($abouts as $item)
                            <div class="item ">
                                <img src="{{ asset($item->image) }}"
                                    alt="{{ $item->name }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row section">
                <div class="col-md-12">
                    <div class="tab-content">
                        @foreach ($abouts as $item)
                            <div id="{{ $item->slug }}" class="tab-pane fade in {{ $loop->index == 0 ? 'active' : '' }}">
                                <div class="des">
                                    {!! $item->content !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @if (!$movieIsShowing->isEmpty())
            <section class="nowshowing">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <h2 class="title">
                                <img src="{{ asset('client/images/icons/icon-ticket.png') }}" alt="Đặt vé" />
                                <span>Phim đang chiếu</span>
                                <div class="border"></div>
                            </h2>
                            <div class="center">
                                <img src="{{ asset('client/images/icons/cinema-movie.png') }}" alt="Phim đang chiếu" />
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <div id="nowshowing">
                                <div class="owl-carousel owl-loaded owl-drag" id="nowshowing-slider2">
                                    @foreach ($movieIsShowing->take(6) as $item)
                                        <div class="movie" style="padding-top: 30px;">
                                            <div class="poster">
                                                <a href="{{ route('movie.detail', $item->slug) }}">
                                                    <img class="img-responsive"
                                                        src="{{ asset($item->image) }}"
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
    </div>
@endsection

@section('js')
@endsection
