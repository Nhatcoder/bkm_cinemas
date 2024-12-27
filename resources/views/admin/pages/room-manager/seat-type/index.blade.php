@extends('admin.layouts.main')

@section('title', $title['index'] ?? null)

@section('css')
@endsection

@vite(['resources/js/app.js', 'resources/css/app.css'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <x-page-titles />
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh Sách {{ $title['index'] ?? null }}</h4>
                        @can('create', App\Models\SeatType::class)
                            <div class="compose-btn">
                                <a href="{{ route('admin.seat-types.create') }}">
                                    <button class="btn btn-secondary btn-sm light" fdprocessedid="5mkvtw">
                                        + Thêm mới
                                    </button>
                                </a>
                            </div>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md" id="data-table">
                                <thead>
                                    <tr>
                                        <th style="width:80px;">#</th>
                                        <th>Mã</th>
                                        <th>Giá tiền thêm</th>
                                        <th>Nút hành động</th>
                                        @if (auth()->user()->can('update', \App\Models\SeatType::class) || auth()->user()->can('delete', \App\Models\SeatType::class))
                                            <th>Hành động</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="fs-4" x-data="{
                                    editSeatType($event) {
                                        $event && $event.preventDefault();
                                        toastr.warning('Loại ghế của hệ thống không thể chỉnh sửa')
                                    }
                                }">
                                    @foreach ($seatTypes as $key => $seatType)
                                        <tr>
                                            <td>
                                                <div class="tw-flex tw-items-center tw-gap-2">
                                                    <strong
                                                        class="text-black">{{ ($seatTypes->currentPage() - 1) * $seatTypes->perPage() + $key + 1 }}
                                                    </strong>
                                                    @if ($seatType->is_system)
                                                        <svg @click="editSeatType()" xmlns="http://www.w3.org/2000/svg"
                                                            class="tw-h-5 tw-w-5 tw-ml-2" viewBox="0 0 20 20"
                                                            fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M10 2a4 4 0 00-4 4v2H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-1V6a4 4 0 00-4-4zm-2 6V6a2 2 0 114 0v2H8z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="tw-text-{{ $seatType->code }}">{{ $seatType->code }}</td>
                                            <td>{{ number_format($seatType->bonus_price, 0, ',', '.') }} VNĐ</td>
                                            <td>
                                                <div
                                                    class="tw-max-w-[250px] tw-text-white tw-bg-[#2d3748] hover:tw-bg-[#4a5568] tw-p-4 tw-cursor-pointer tw-flex tw-items-center tw-gap-2 tw-transition-all tw-duration-300 tw-line-height-[1.7] tw-text-[0.9rem] tw-border tw-border-[var(--border)] tw-h-[3rem] tw-rounded-[0.5rem]">
                                                    <div style="color: {{ $seatType->color }}">{!! $seatType->icon !!}</div>
                                                    <div class="tw-text-white">{{ $seatType->text }}</div>
                                                </div>
                                            </td>
                                            @if (auth()->user()->can('update', \App\Models\SeatType::class) || auth()->user()->can('delete', \App\Models\SeatType::class))
                                                <td>
                                                    <div @click="'{{ $seatType->is_system }}' ? editSeatType($event) : ''">
                                                        @can('update', App\Models\SeatType::class)
                                                            <a href="{{ route('admin.seat-types.edit', $seatType->id) }}"
                                                                class="btn btn-primary shadow btn-xs sharp me-1">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                        @endcan
                                                        @can('delete', App\Models\SeatType::class)
                                                            <x-destroy-button route="admin.seat-types.destroy"
                                                                id="{{ $seatType->id }}" />
                                                        @endcan
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                <div class="text-center">
                                    {{ $seatTypes->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
