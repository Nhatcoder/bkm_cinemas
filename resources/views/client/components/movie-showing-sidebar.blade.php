<div class="col-lg-4 col-md-4 col-sm-4 sidebar">
    @if ($movieIsShowing->isNotEmpty())
        <div class="related-movie">
            <h2>Phim đang chiếu</h2>
            <div class="list">
                @foreach ($movieIsShowing as $item)
                    <a href="{{ route('movie.detail', $item->slug) }}">
                        <div class="poster" style="background-image: url({{ asset($item->banner_movie) }})">
                        </div>
                    </a>
                    @if ($loop->index == 3)
                        @break
                    @endif
                @endforeach
            </div>
            @if ($movieIsShowing->count() > 4)
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
