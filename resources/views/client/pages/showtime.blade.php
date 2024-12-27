@extends('client.layouts.main')

@section('title', 'Lịch chiếu')

@section('css')
    <link rel="stylesheet" href="{{ asset('client/css/showtime.css') }}">
@endsection

@section('content')
    <div class="page-showtime">
        <div class="container">
            <div class="col-md-12 col-sm-12">
                <h2>Xem lịch chiếu theo ngày</h2>
                <ul class="nav nav-tabs">
                    @foreach ($times as $time)
                        <li class="{{ $loop->first ? 'active' : '' }}">
                            <a data-toggle="tab" href="#date-{{ $time['time'] }}" aria-expanded="true">
                                <span class="day" @if (!$loop->first) style="text-transform: capitalize;" @endif>
                                    {{ $time['day'] }}
                                </span>
                                <span class="date">{{ $time['date'] }}</span>
                                <span class="month">Tháng {{ $time['month'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="container title-page">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h1>Lịch chiếu phim</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="tab-content">
                @foreach ($data as $key => $item)
                    <div id="date-{{ $key }}" class="tab-pane {{ $loop->first ? 'active' : '' }}">
                        @foreach ($item as $movie)
                            <div class="row showtime-movie">
                                <div class="col-lg-3 col-md-3 col-sm-4">
                                    <div class="poster">
                                        <a href="{{ route('movie.detail', $movie->slug) }}">
                                            <img src="{{ asset($movie->image) }}"
                                                alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <div class="info info-showtime">
                                        <a class="text-start" href="{{ route('movie.detail', $movie->slug) }}">
                                            <h3>{{ $movie->title }}</h3>
                                        </a>
                                        <h3 class="text-start"></h3>
                                        <div class="age">{{ $movie->age }}</div>
                                        <div class="release">
                                            <span class="date">{{ date('d', strtotime($movie->premiere_date)) }}</span>
                                            <span>{{ date('m', strtotime($movie->premiere_date)) }}</span>
                                        </div>
                                        <div class="star">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                        </div>
                                        <div class="detail text-start">
                                            <span>
                                                <strong>
                                                    <i class="fa-regular fa-clock"></i>
                                                    Thời lượng:
                                                </strong>
                                                {{ $movie->duration }} phút
                                            </span>
                                            <span>
                                                <strong>
                                                    <i class="fa-solid fa-align-left"></i>
                                                    Thể loại:
                                                </strong>
                                                @if ($movie->movieGenre->count() > 0)
                                                    @foreach ($movie->movieGenre as $genre)
                                                        {{ $loop->index > 0 ? ', ' : '' }}{{ $genre->genres->name }}
                                                    @endforeach
                                                @else
                                                    Chưa cập nhật
                                                @endif
                                            </span>
                                            <span>
                                                <strong><i class="fa-solid fa-user"></i>
                                                    Đạo diễn:</strong>{{ $movie->director }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="showtimes">
                                        <div>
                                            @foreach ($movie->showtimes as $showtime)
                                                @if ($showtime->getCanCancelAttribute())
                                                    <a class="active" href="">09:55</a>
                                                @else
                                                    <a class="disabled">09:55</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
