@extends('client.layouts.main')

@section('title', 'BKM Cinemas - Rạp chiếu phim 3D công nghệ hàng đầu.')

@section('css')
    <style>

    </style>
@endsection
@vite(['resources/js/app.js', 'resources/css/app.css'])

@section('content')
    <div x-data="MoviePageComponent('{{ $slug }}')" class="container" id="page-movie">
        <div class="row">
            <div class="movie-slider"
                :style="{
                    'background-image': `url(${movie.banner_movie})`
                }">
                <div class="overlay"></div>
                <div class="trailer">
                    <a @click="controlVideo(true)" class="video-play-button" data-toggle="modal" href="#modal-trailer"><span></span></a>
                </div>
            </div>
            <div class="movie-detail">
                <div class="poster">
                    <img :src="movie?.image" alt="Cám" class="img-responsive">
                </div>
                <div class="movie-info">
                    <div class="movie-name">
                        <a href="#">
                            <h1 x-text="movie?.title"></h1>
                        </a>
                        <h2></h2>
                    </div>
                    <p>
                        <strong>Thời lượng:</strong>
                        <span x-text="movie?.duration"></span> phút
                    </p>
                    <p>
                        <strong>Khởi chiếu từ:</strong>
                        Ngày <span x-text="moment(movie?.premiere_date).format('DD/MM/YYYY')"></span>
                    </p>
                    <p>
                        <strong>Thể loại:</strong>
                        Kinh Dị
                    </p>
                    <p>
                        <strong>Định dạng:</strong>
                        2D
                    </p>
                    <p class="cap">
                        <strong>Đạo diễn:</strong>
                        <span x-text="movie?.director"></span>
                    </p>
                    <p class="cap">
                        <strong>Diễn viên:</strong>
                        <span x-text="actors.map(actor=>actor.name).join(', ')"></span>
                    </p>
                    <p>
                        <strong>Độ tuổi:</strong>
                        <span class="age_restricted_wrap">
                            <span class="age age-"></span>
                            <span class="age_restricted_label" x-text="'T'+movie?.age"></span>
                        </span>
                    </p>
                    <div class="age_restricted"><span x-text="'T'+movie?.age"></span></div>
                    <div class="group-buton">
                        <a href="#showtime" id="dat-ve"><img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                alt="Đặt vé"> Đặt vé</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div class="movie-content">
                    <div class="showdow"></div>
                    <div class="content">
                        <div class="text" x-html="movie?.content">
                        </div>
                    </div>
                    <button class="read-more">Xem thêm</button>
                </div>

                <div class="showtime-section" id="showtime">
                    <div class="tw-carousel tw-gap-4 tw-w-full">
                        <template x-for="day in days">
                            <div class="tw-carousel-item tw-rounded-lg tw-overflow-hidden tw-gap-3" @click="choseDay(day)">
                                <div
                                    :class="{
                                        'calendar-item': true,
                                        'active': day.format('YYYY/MM/DD') == formFilter.date,
                                    }">
                                    <div class="calendar-header" x-text="day.date()"></div>
                                    <div class="calendar-footer"
                                        x-text="day.isSame(moment().startOf('day')) ? 'Hôm nay' : day.format('dddd')"></div>
                                </div>
                            </div>
                        </template>
                    </div>


                    <div class="tw-flex tw-items-center tw-justify-between">
                        <h2>Lịch chiếu</h2>
                        <div class="tw-mt-4 ">
                            <div @click="showModelCity = true"
                                class="tw-inline-flex tw-cursor-pointer tw-justify-center tw-items-center tw-py-2 tw-px-3 tw-text-pink-600 tw-rounded-lg tw-bg-white tw-border tw-border-solid tw-border-pink-600">
                                <i class="fa-solid fa-location-dot"></i>
                                <div class="tw-pl-5 tw-pr-8" x-text="selectedCity?.name ?? '--Chọn thành phố--'"></div>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Không có lịch chiếu thì lên --}}
                    <div class="showtimes-message" x-show="!showtimesDetail.length" x-cloak>
                        Hiện chưa có lịch chiếu cho phim này
                    </div>
                    <template x-for="(showtimeDetail, index) in showtimesDetail" :key="index">
                        <div>
                            <div class="showtime-date" x-text="showtimeDetail.area.name"></div>
                            <div class="showtimes">
                                <div class="tw-flex tw-flex-wrap tw-gap-y-3">
                                    <template
                                        x-for="showtime in showtimeDetail.showtimes.sort((a, b) => moment(a.start_time).isBefore(moment(b.start_time)) ? -1 : 1)">
                                        <a align="center"
                                            :class="{
                                                'active': moment().isBefore(moment(showtime.start_time).subtract(0,
                                                    'hours')),
                                                'tw-cursor-not-allowed': moment().isAfter(moment(showtime.start_time)
                                                    .subtract(0, 'hours'))
                                            }"
                                            :href="moment().isBefore(moment(showtime.start_time).subtract(0, 'hours')) ?
                                                `{{ url('dat-ve') }}/${showtime.id}` : '#'"
                                            x-text="moment(showtime.start_time).format('HH:mm')"
                                            :disabled="moment().isAfter(moment(showtime.start_time).subtract(0, 'hours'))">
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <div class=" page-post-detail" style="margin-top: 60px;">
                    <div class="clearfix"></div>
                    <div class="related-post">
                        <h2>Bài viết mới</h2>
                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="col-md-4 col-sm-4">
                                    <div class="poster">
                                        <a href="{{ "/khuyen-mai/$post->slug" }}">
                                            <img class="img-responsive" src="{{ $post->avatar }}" alt="{{ $post->name }}">
                                        </a>
                                    </div>
                                    <h3>
                                        <a href="{{ "/khuyen-mai/$post->slug" }}">{{ $post->name }}</a>
                                    </h3>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @include('client.components.movie-showing-sidebar')
        </div>
        <div @click="controlVideo(false)" class="modal fade in" id="modal-trailer" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content" style="width: 100%;">
                    <div class="modal-header">
                        <button @click="controlVideo(false)" type="button" class="close" data-dismiss="modal" title="Đóng"
                            aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="video-container video-trailer--home">
                            <iframe id="youtubeIframe" x-bind:src="movie?.trailer_url" x-bind:data-src="movie?.trailer_url" frameborder="0"></iframe>
                        </div>
                    </div x-text=movie?.trailer_url>
                </div>
            </div>
        </div>

        <div x-show="showModelCity"
            class="tw-fixed tw-inset-0 tw-z-50 tw-flex tw-items-center tw-justify-center tw-bg-black tw-bg-opacity-50 tw-w-full tw-h-full"
            x-cloak>
            <div @click.outside="showModelCity = false"
                class="tw-bg-white tw-rounded-lg tw-shadow-lg tw-w-full tw-max-w-7xl tw-p-6 tw-relative">
                <div class="modal-header tw-flex tw-justify-end tw-items-center">
                    <i @click="showModelCity = false" class="fa-solid fa-xmark tw-cursor-pointer"></i>
                </div>
                <div class="modal-body">
                    <div class="tw-flex tw-justify-between tw-items-center">
                        <h4 class="tw-m-0 tw-font-bold">Chọn địa điểm</h4>
                        <div style="flex: 0 0 50%">
                            <label for="default-search"
                                class="tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-900 tw-sr-only dark:tw-text-white">Search</label>
                            <div class="tw-relative">
                                <div
                                    class="tw-absolute tw-inset-y-0 tw-start-0 tw-flex tw-items-center tw-ps-3 tw-pointer-events-none">
                                    <svg class="tw-w-4 tw-h-4 tw-text-gray-500 dark:tw-text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input x-model="searchCity" type="search"
                                    class="tw-block tw-w-full tw-p-4 tw-ps-10 tw-text-sm tw-text-gray-900 tw-border tw-border-gray-300 tw-rounded-lg tw-bg-gray-50 focus:tw-ring-pink-500 focus:tw-border-pink-500 dark:tw-bg-gray-700 dark:tw-border-gray-600 dark:tw-placeholder-gray-400 dark:tw-text-white dark:focus:tw-ring-pink-500 dark:focus:tw-border-pink-500"
                                    placeholder="Tìm địa điểm..." required />
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Movie Grid -->
                <div class="tw-h-[350px] ">
                    <div style="margin-top: 12px; overflow-y: auto; max-height: 369px;"
                        class="modal-body tw-pb-14 tw-overflow-y-auto tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 md:tw-grid-cols-3 lg:tw-grid-cols-4 tw-gap-4 tw-p-8">
                        <template
                            x-for="city in cities.filter(city => city.name.toLowerCase().includes(searchCity.toLowerCase()) || searchCity == '')"
                            :key="city.id">
                            <div @click="choseCity(city)"
                                :class="{
                                    'button-location': true,
                                    'active': formFilter.city_id == city.id
                                }"
                                x-text="city.name"></div>
                        </template>
                    </div>
                </div>

                <!-- Close Button -->
                <div class="modal-footer">
                    <button @click="showModelCity = false" class="btn btn-danger">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>




@endsection

@section('js')
    <script src="{{ asset('client/js/movie-detail.js') }}"></script>
@endsection
