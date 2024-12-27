@extends('client.layouts.main')
@section('title', 'Kết quả Tìm kiếm: ' . request()->k ?? '')
@section('css')
@endsection

@section('content')
    <div class="container page-search">
        <h1>Kết quả Tìm kiếm: {{ request()->k ?? '' }}</h1>
        <section class="page-list-movie">
            <h2 class="title">Phim</h2>
            <div class="tab-content">
                <div class="row row-flex">
                    @if (isset($movies) && !$movies->isEmpty())
                        @foreach ($movies as $item)
                            <div class="col-md-3 col-sm-4 col-xs-6">
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
                            </div>
                        @endforeach
                    @else
                        <p class="text-center">Không tìm thấy phim nào phù hợp với từ khóa:
                            <strong>{{ request()->k ?? '' }}</strong>
                        </p>
                    @endif
                </div>
            </div>
            <div class="text-center">
                @if (isset($movies) && count($movies) > 0)
                    {{ $movies->links('vendor.pagination.bootstrap-4') }}
                @endif
            </div>
        </section>
    </div>
    @if (isset($movies) && !$movies->isEmpty())
        @foreach ($movies as $item)
            <div class="modal fade in" id="modal-trailer-{{ $item->id }}" style="display: none;">
                <div class="modal-dialog modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" onclick="closeModal({{ $item->id }})" data-dismiss="modal" title="Đóng" aria-hidden="true">×
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="video-container video-trailer--home">
                                <iframe id="iframe-trailer-{{ $item->id }}" src="{{ $item->trailer_url }}" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
