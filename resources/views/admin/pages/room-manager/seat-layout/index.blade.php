@extends('admin.layouts.main')

@section('title', $title['index'] ?? null)

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
@endsection

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
                        @can('create', App\Models\SeatLayout::class)
                            <div class="compose-btn">
                                <a href="{{ route('admin.seat-layouts.create') }}">
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
                                        <th>Tên</th>
                                        <th>Hình ảnh</th>
                                        <th>Số cột</th>
                                        <th>Số hàng</th>
                                        <th>Ghế</th>
                                        @if (auth()->user()->can('update', \App\Models\SeatLayout::class) || auth()->user()->can('delete', \App\Models\SeatLayout::class))
                                            <th>Hành động</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($seatLayouts as $key => $seatLayout)
                                        <tr>
                                            <td>
                                                <strong
                                                    class="text-black">{{ ($seatLayouts->currentPage() - 1) * $seatLayouts->perPage() + $key + 1 }}
                                                </strong>
                                            </td>
                                            <td>{{ $seatLayout->name }}</td>
                                            <td>
                                                @if ($seatLayout->image)
                                                    <img src="{{ asset('storage/' . $seatLayout->image) }}"
                                                        alt="{{ $seatLayout->name }}" width="100">
                                                @else
                                                    Không có hình ảnh
                                                @endif
                                            </td>
                                            <td>{{ $seatLayout->col_count }}</td>
                                            <td>{{ $seatLayout->row_count }}</td>
                                            <td>
                                                <i class="fa fa-chair"></i>
                                                {{ $seatLayout->col_count * $seatLayout->row_count }} ghế
                                            </td>
                                            @if (auth()->user()->can('update', \App\Models\SeatLayout::class) || auth()->user()->can('delete', \App\Models\SeatLayout::class))
                                                <td>
                                                    <div>
                                                        @can('update', App\Models\SeatLayout::class)
                                                            <a href="{{ route('admin.seat-layouts.edit', $seatLayout->id) }}"
                                                                class="btn btn-primary shadow btn-xs sharp me-1">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                        @endcan
                                                        @can('delete', App\Models\SeatLayout::class)
                                                            <x-destroy-button route="admin.seat-layouts.destroy"
                                                                id="{{ $seatLayout->id }}" />
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
                                    {{ $seatLayouts->links('vendor.pagination.bootstrap-5') }}
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
