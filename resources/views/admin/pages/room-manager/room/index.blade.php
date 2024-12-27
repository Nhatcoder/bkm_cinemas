@extends('admin.layouts.main')

@section('title', $title['index'] ?? 'Danh sách phòng chiếu')

@section('css')
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
                        @can('create', App\Models\Room::class)
                            <div class="compose-btn">
                                <a href="{{ route('admin.rooms.create') }}">
                                    <button class="btn btn-secondary btn-sm light" fdprocessedid="5mkvtw">
                                        + Thêm mới
                                    </button>
                                </a>
                            </div>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if ($rooms->isNotEmpty())
                                <table class="table table-responsive-md" id="data-table">
                                    <thead>
                                        <tr>
                                            <th style="width:80px;">#</th>
                                            <th>Tên phòng</th>
                                            <th>Hình ảnh</th>
                                            <th>Giá cơ bản</th>
                                            <th class="text-center">Số cột</th>
                                            <th class="text-center">Số hàng</th>
                                            @if (auth()->user()->can('update', \App\Models\Room::class) ||
                                                    auth()->user()->can('delete', \App\Models\Room::class))
                                                <th>Hành động</th>
                                            @endif
                                        </tr>
                                    </thead>

                                    <tbody class="fs-4">
                                        @foreach ($rooms as $index => $room)
                                            <tr>
                                                <td>
                                                    <strong
                                                        class="text-black">{{ ($rooms->currentPage() - 1) * $rooms->perPage() + $index + 1 }}
                                                    </strong>
                                                </td>
                                                <td>
                                                    <a class="fw-bolder "
                                                        href="{{ route('admin.rooms.edit', $room->id) }}">
                                                        {{ $room->room_name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    @if ($room->image)
                                                        <img width="100" src="{{ Storage::url($room->image) }}"
                                                            alt="{{ $room->room_name }}">
                                                    @else
                                                        Không có hình ảnh
                                                    @endif
                                                </td>
                                                <td>{{ number_format($room->base_price, 0, ',', '.') }} VNĐ</td>
                                                <td class="text-center">{{ $room->col_count }}</td>
                                                <td class="text-center">{{ $room->row_count }}</td>
                                                <td>
                                                    <div>
                                                        @can('update', App\Models\Room::class)
                                                            @if (Auth::user()->type == 'manage')
                                                                <a href="{{ route('admin.rooms.edit', $room->id) }}"
                                                                    class="btn btn-primary shadow btn-xs sharp me-1">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('admin.rooms.edit', $room->id) }}"
                                                                    class="btn btn-primary shadow btn-xs sharp me-1">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            @endif
                                                        @endcan
                                                        @can('delete', App\Models\Room::class)
                                                            <x-destroy-button route="admin.rooms.destroy"
                                                                id="{{ $room->id }}" />
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    <div class="text-center">
                                        {{ $rooms->links('vendor.pagination.bootstrap-5') }}
                                    </div>
                                </div>
                            @else
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="p-5">
                                        <h4>Chưa có phòng chiếu nào.</h4>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
