@extends('admin.layouts.main')

@section('title', $title['create'] ?? 'Cập nhật phòng chiếu')

@section('css')
@endsection
@vite(['resources/js/app.js', 'resources/css/app.css'])

@section('content')
<div class="container-fluid" x-data="RoomComponent({{$room->id}})">
	<div class="row">
		<div class="col-xl-12">
			<div class="row">
				<x-page-titles />
			</div>
			<form @submit.prevent="onSubmit">
				<div class="row">
					<div class="col-xl-12">
						<div class="card h-auto">
							<div class="card-body">
								<div class="row mb-4">
									<div class="mb-3">
										<label class="me-sm-2 form-label mb-2">Tên phòng</label>
										<input type="text" {{ Auth::user()->type == 'staff' ? 'disabled' : '' }} x-model="formData.room_name" class="form-control"
											placeholder="Nhập tên phòng">
										<span class="text-danger" x-text="errors.room_name"></span>
									</div>
									<div class="col-6 mb-3">
										<label class="form-label mb-2">Số cột</label>
										<input type="number" {{ Auth::user()->type == 'staff' ? 'disabled' : '' }} x-model="formData.col_count" @input="renderSeatLayout; formData.seats = []"
											@change="formData.seats = []" class="form-control"
											placeholder="Nhập số cột">
										<span class="text-danger" x-text="errors.col_count"></span>
									</div>
									<div class="col-6 mb-3">
										<label class="form-label mb-2">Số hàng</label>
										<input type="number" {{ Auth::user()->type == 'staff' ? 'disabled' : '' }} x-model="formData.row_count" @input="renderSeatLayout; formData.seats = []"
											@change="formData.seats = []" class="form-control"
											placeholder="Nhập số hàng">
										<span class="text-danger" x-text="errors.row_count"></span>
									</div>
									<div class="mb-3">
										<label class="me-sm-2 form-label mb-2">Giá ghế cơ bản</label>
										<input type="text" {{ Auth::user()->type == 'staff' ? 'disabled' : '' }} x-model="formData.base_price" @input="renderSeatLayout;"
											class=" form-control"
											placeholder="Nhập giá ghế cơ bản">
										<span class="text-danger" x-text="errors.base_price"></span>
									</div>
									
									
									@if (Auth::user()->type == 'manage')
										<div id="seatingArea" class="tw-inline-flex tw-items-center tw-mb-3 tw-text-white"></div>
										<div class="mb-3">
											<button type="button" @click="toggleModal()" class="btn btn-sm btn-primary">Chọn
												từ sơ đồ ghế có sẵn</button>
										</div>
									@else
										<div class="tw-inline-flex tw-items-center tw-mb-3 tw-text-white">
											<img src="{{ asset('storage/' . $room->image) }}" alt="">
										</div>
									@endif
									<div class="mb-3">
										<div class="tw-text-sm tw-font-medium tw-mb-2">Ngày chiếu</div>
										<div class="tw-mb-3">
											<div id="selectDay"></div>
										</div>
										@if (Auth::user()->type == 'manage')
											<div class="row tw-items-end">
												<div class="col-6">
													<div class="row">
														<div class="col">
															<label for="start_time" class="form-label">Thời gian bắt đầu</label>
															<input id="start_time" data-inputmask="'alias': 'datetime', 'inputFormat': 'HH:MM'" placeholder="HH:MM" class="form-control" />
														</div>
														<div class="col">
															<label for="end_time" class="form-label">Thời gian kết thúc</label>
															<input id="end_time" data-inputmask="'alias': 'datetime', 'inputFormat': 'HH:MM'" placeholder="HH:MM" class="form-control" />
														</div>
														<div class="col tw-flex tw-justify-start tw-items-end">
															<div>
																<button type="button" @click="addShowtime()" class="btn btn-sm btn-primary">Thêm</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										@endif
										<div class="tw-grid tw-grid-cols-12 tw-gap-2 tw-mt-3">
											<div class="tw-col-span-7" id="selectedTime"></div>
											<div style="border: 1px solid #ccc; min-height: 276px; border-radius: 4px;" class="tw-col-span-5 tw-flex tw-relative">
												@if (Auth::user()->type == 'manage')
													<div x-show="showtimeSelected" class="tw-absolute tw-top-0 tw-right-0 tw-p-2"><i @click="deleteShowtime()" class="fa-solid fa-trash-can hover:tw-text-red-500 tw-cursor-pointer tw-text-xl"></i></div>
												@endif
												<div class="tw-flex tw-justify-center tw-items-center tw-flex-col tw-w-full" x-show="showtimeSelected && !showtimeSelected?.movie_id" x-cloak>
													<div>Xuất chiếu chưa có phim</div>
													@if (Auth::user()->type == 'manage')
														<button type="button" class="btn btn-sm btn-primary" @click="showModalMovie = true">Chọn phim</button>
													@endif
												</div>
												<div x-show="showtimeSelected?.movie_id" x-cloak>
													<div class="movie-info tw-grid tw-grid-cols-12 tw-gap-2">
														<div class="tw-col-span-5">
														<img class="tw-block tw-w-full tw-h-full tw-rounded tw-object-cover" :src="showtimeSelected?.movie?.image" alt="Movie Image" class="movie-image">
														</div>
														<div class="tw-col-span-7 p-3">
															<h3 x-text="showtimeSelected?.movie?.title"></h3>
															<p><strong>Đạo diễn:</strong> <span x-text="showtimeSelected?.movie?.director"></span></p>
															<p><strong>Thời lượng:</strong> <span x-text="showtimeSelected?.movie?.duration"></span> phút</p>
															<p><strong>Ngày phát hành:</strong> <span x-text="showtimeSelected?.movie?.release_date"></span></p>
															<p><strong>Ngôn ngữ:</strong> <span x-text="showtimeSelected?.movie?.language"></span></p>
															<p style="text-align: justify"><strong>Mô tả:</strong> <span x-text="showtimeSelected?.movie?.description"></span></p>
															@if (Auth::user()->type == 'manage')
																<button type="button" class="btn btn-sm btn-danger" @click="clearShowtimeMovie()">Gỡ phim</button>
															@endif
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									@if (Auth::user()->type == 'manage')
										<div class="tw-flex tw-justify-end">
											<button class="btn btn-md btn-success">Cập nhật</button>
										</div>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			<!-- modal -->
			<div x-show="showModal"
				class="tw-fixed tw-inset-0 tw-z-50 tw-flex tw-items-center tw-justify-center tw-bg-black tw-bg-opacity-50" x-cloak>
				<div @click.outside="toggleModal()"
					class="tw-bg-black tw-bg-opacity-60 tw-rounded-lg tw-shadow-lg tw-w-full tw-max-w-7xl tw-min-h-[500px] tw-p-6 tw-relative">
					<div class="tw-flex tw-justify-between tw-items-center tw-border-b tw-pb-3">
						<h5 class="tw-text-2xl tw-font-bold tw-text-black">Chọn sơ đồ ghế</h5>
						<button type="button" @click="toggleModal()"
							class="tw-text-white tw-text-2xl tw-bg-transparent">&times;</button>
					</div>
					<div
						class="tw-mt-4 tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 md:tw-grid-cols-3 lg:tw-grid-cols-4 xl:tw-grid-cols-5 tw-gap-4 tw-overflow-y-auto tw-max-h-[400px]">
						<template x-for="seatLayout in seatLayouts" :key="seatLayout.id">
							<label @click="selectLayout(seatLayout)"
								:class="{'tw-border-blue-500': formData.seat_layout_id === seatLayout.id, 'tw-border-2 tw-border-solid tw-p-2 tw-rounded-lg tw-shadow hover:tw-shadow-lg tw-transition-shadow tw-duration-300 tw-cursor-pointer tw-flex tw-flex-col': true}">
								<img :src="seatLayout.image" :alt="seatLayout.name"
									class="tw-w-full tw-h-auto tw-mb-1 tw-rounded">
								<div class="tw-mt-auto">
									<h3 class="tw-text-lg tw-font-semibold tw-text-black" x-text="seatLayout.name"></h3>
									<p class="tw-m-0">Columns: <span x-text="seatLayout.col_count"></span>
									</p>
									<p class="tw-m-0">Rows: <span x-text="seatLayout.row_count"></span>
									</p>
								</div>
							</label>
						</template>
					</div>
					<div class="tw-flex tw-justify-end tw-p-4 tw-border-t tw-border-gray-200">
						<button type="button" @click="toggleModal()"
							class="tw-btn tw-btn-sm tw-btn-secondary hover:tw-bg-red-600 tw-transition tw-duration-300">Close</button>
					</div>
				</div>
			</div>
			<div x-show="showModalMovie"
				class="tw-fixed tw-inset-0 tw-z-50 tw-flex tw-items-center tw-justify-center tw-bg-black tw-bg-opacity-50 tw-w-full tw-h-full" x-cloak>
				<div @click.outside="showModalMovie = false"
					class="tw-bg-white tw-rounded-lg tw-shadow-lg tw-w-full tw-max-w-7xl tw-p-6 tw-relative">
					<!-- Search Bar -->
					<div class="tw-mb-4">
						<div class="input-group">
							<span class="input-group-text">
								<a href="javascript:void(0)">
									<svg width="15" height="15" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M17.5605 15.4395L13.7527 11.6317C14.5395 10.446 15 9.02625 15 7.5C15 3.3645 11.6355 0 7.5 0C3.3645 0 0 3.3645 0 7.5C0 11.6355 3.3645 15 7.5 15C9.02625 15 10.446 14.5395 11.6317 13.7527L15.4395 17.5605C16.0245 18.1462 16.9755 18.1462 17.5605 17.5605C18.1462 16.9747 18.1462 16.0252 17.5605 15.4395V15.4395ZM2.25 7.5C2.25 4.605 4.605 2.25 7.5 2.25C10.395 2.25 12.75 4.605 12.75 7.5C12.75 10.395 10.395 12.75 7.5 12.75C4.605 12.75 2.25 10.395 2.25 7.5V7.5Z" fill="#ff00f7d4"></path>
									</svg>
								</a>
							</span>
							<input type="text" x-model="searchQuery" class="form-control" placeholder="Tìm kiếm...">
						</div>
					</div>

					<!-- Movie Grid -->
					<div class="tw-h-[400px] tw-pb-14 tw-overflow-y-auto tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 md:tw-grid-cols-3 lg:tw-grid-cols-4 tw-gap-4 tw-p-8">
						<template x-for="movie in filteredMovies()" :key="movie.id">
							<div @click="selectMovie(movie)" class="tw-border-2 tw-border-solid tw-p-2 tw-rounded-lg tw-shadow hover:tw-shadow-lg tw-transition-shadow tw-duration-300 tw-cursor-pointer">
								<figure class="tw-p-0 tw-m-0">
									<img class="tw-w-full tw-h-[225px] tw-object-cover" :src="movie.image" alt="Movie Image" />
								</figure>
								<div class="tw-p-2">
									<h2 class="tw-card-title" x-text="movie.title"></h2>
									<div>Thời lượng: <span x-text="movie.duration"></span>p</div>
								</div>
							</div>
						</template>
					</div>

					<!-- Close Button -->
					<div class="tw-flex tw-justify-end tw-mt-4 tw-absolute tw-right-0 tw-bottom-0 tw-left-0 tw-p-4 tw-bg-white tw-border-t-2 tw-border-gray-500">
						<button @click="showModalMovie = false" class="tw-btn tw-btn-sm tw-btn-secondary">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')

@endsection
