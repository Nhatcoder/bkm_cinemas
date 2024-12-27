@extends('admin.layouts.main')

@section('title', 'Danh sách rạp')

@section('css')
    <style>
        .box-map iframe {
            width: 100px !important;
            height: 100px !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-titles">
                            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                @include('admin.components.breadcrumbs', [
                                    'breadcrumbs' => $breadcrumbs,
                                ])
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="filter cm-content-box box-primary">
                            <div class="content-title SlideToolHeader">
                                <div class="cpa">
                                    <i class="fa-sharp fa-solid fa-filter me-2"></i>Bộ lọc
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="filter cm-content-box box-primary">
                                    <div class="cm-content-body form excerpt" style="">
                                        <form action="{{ route('admin.cinemas.index') }}" method="GET">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-2 col-sm-4">
                                                        <label class="form-label">Tên rạp</label>
                                                        <input id="" value="{{ request()->name }}" name="name"
                                                            type="text" class="form-control mb-xl-0 mb-3"
                                                            placeholder="Nhập tên rạp">
                                                    </div>
                                                    <div class="col-xl-2  col-sm-4 mb-3 ">
                                                        <label class="form-label">Sắp xếp</label>
                                                        <div id="order" class="dropdown bootstrap-select form-control">
                                                            <select name="order_with" class="form-control">
                                                                <option value="">
                                                                    --chọn--
                                                                </option>
                                                                <option @selected(request()->order_with == 'dateASC') value="dateASC">
                                                                    Ngày tạo tăng dần
                                                                </option>
                                                                <option @selected(request()->order_with == 'dateDESC') value="dateDESC">
                                                                    Ngày tạo giảm dần
                                                                </option>
                                                                <option @selected(request()->order_with == 'birthDateASC') value="birthDateASC">
                                                                    Tuổi tăng dần
                                                                </option>
                                                                <option @selected(request()->order_with == 'birthDateDESC') value="birthDateDESC">
                                                                    Tuổi giảm dần
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2  col-sm-4 mb-3">
                                                        <label class="form-label">Thành phố</label>
                                                        <div id="order" class="dropdown bootstrap-select form-control">
                                                            <select name="city_id" class="form-control" id="select_city" data-url="{{ route('admin.cinemas.ajaxGetAreaByCityId') }}">
                                                                <option value="">
                                                                    --chọn--
                                                                </option>
                                                                @foreach ($cities as $city)
                                                                    <option @selected(request()->city_id == $city->id)
                                                                        value="{{ $city->id }}">
                                                                        {{ $city->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2  col-sm-4 mb-3">
                                                        <label class="form-label">Khu vực</label>
                                                        <div id="order" class="dropdown bootstrap-select form-control">
                                                            <select name="area_id" class="form-control" id="select_area">
                                                                <option value="">
                                                                    --chọn--
                                                                </option>
                                                                @foreach ($areas as $area)
                                                                    <option @selected(request()->area_id == $area->id)
                                                                        value="{{ $area->id }}">
                                                                        {{ $area->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-sm-4 mb-3 align-self-end">
                                                        <div class="">
                                                            <button class="btn btn-primary me-2"
                                                                title="Click here to Search" type="submit"><i
                                                                    class="fa-sharp fa-solid fa-filter me-2"></i>Tìm kiếm
                                                                nâng cao
                                                            </button>
                                                            <button type="reset" class="btn btn-danger light"
                                                                title="Click here to remove filter">Xóa trống</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Danh sách rạp</h4>
                                @can('create', \App\Models\Cinema::class)
                                    <div class="compose-btn">
                                        <a href="{{ route('admin.cinemas.create') }}">
                                            <button class="btn btn-secondary btn-sm light">
                                                + Thêm mới
                                            </button>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                            <div class="card-body">
                                @if ($data->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md" id="data-table">
                                            <thead>
                                                <tr>
                                                    @can('deleteMultiple', \App\Models\Cinema::class)
                                                        <th>
                                                            <div class="box-delete-item">
                                                                <input type="checkbox" id="item-all-checked">
                                                                <button id="btn-delete-all"
                                                                    data-url="{{ route('admin.cinemas.deleteItemMultipleChecked') }}"
                                                                    class="btn btn-sm btn-danger btn-delete-multiple_item">
                                                                    <svg width="15" height="15"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 448 512">
                                                                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                        <path fill="white"
                                                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </th>
                                                    @endcan
                                                    <th style="width:80px;">#</th>
                                                    <th>Tên</th>
                                                    <th>Khu vực</th>
                                                    <th>Hình ảnh</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Email</th>
                                                    <th>Map</th>
                                                    <th>Trạng thái</th>
                                                    @if (Auth()->user()->can('update', \App\Models\Cinema::class) || Auth()->user()->can('delete', \App\Models\Cinema::class))
                                                        <th>Hành động</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $cinema)
                                                    <tr>
                                                        @can('deleteMultiple', \App\Models\Cinema::class)
                                                            <td>
                                                                <input type="checkbox" data-id="{{ $cinema->id }}"
                                                                    class="item-checked">
                                                            </td>
                                                        @endcan
                                                        <td>
                                                            <strong class="text-black">{{ ($data->currentPage() - 1) * $data->perPage() + $key + 1 }}</strong>
                                                        </td>
                                                        <td>
                                                            <b>
                                                                <a href="{{ route('admin.cinemas.index') }}">
                                                                    {{ $cinema->name }}
                                                                </a>
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <b>
                                                                {{ $cinema->area->name ?? '' }}
                                                            </b>
                                                        </td>
                                                        <td>
                                                            @if (!empty($cinema->image) && file_exists(public_path($cinema->image)))
                                                                <img src="{{ asset($cinema->image) }}"
                                                                    style="width:80px; height:100px; object-fit:cover">
                                                            @else
                                                                <img src="#" alt="No image"
                                                                    style="width:80px; height:100px; object-fit:cover">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <b>
                                                                {{ $cinema->address }}
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <b>
                                                                {{ $cinema->phone }}
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <b>
                                                                {{ $cinema->email }}
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <div class="box-map" style="width: 100px">
                                                                {!! $cinema->map !!}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @can('changeActive', \App\Models\Cinema::class)
                                                                <button
                                                                    class="toggle-active-btn btn btn-xs {{ $cinema->active == 1 ? 'btn-success' : 'btn-danger' }} text-white"
                                                                    data-id="{{ $cinema->id }}"
                                                                    data-status="{{ $cinema->active }}"
                                                                    data-url="{{ route('admin.cinemas.changeActive') }}">
                                                                    {{ $cinema->active == 1 ? 'Hiện' : 'Ẩn' }}
                                                                </button>
                                                            @else
                                                                <span class="badge light badge-{{ $cinema->active == 1 ? 'success' : 'danger' }}">
                                                                    {{ $cinema->active == 1 ? 'Hiện' : 'Ẩn' }}
                                                                </span>
                                                            @endcan
                                                        </td>
                                                        @if (Auth()->user()->can('update', \App\Models\Cinema::class) || Auth()->user()->can('delete', \App\Models\Cinema::class))
                                                            <td>
                                                                <div
                                                                    style="padding-right: 20px; display: flex; justify-content: end">
                                                                    @can('update', \App\Models\Cinema::class)
                                                                        <a href="{{ route('admin.cinemas.edit', $cinema->id) }}"
                                                                            class="btn btn-primary shadow btn-xs sharp me-1">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('delete', \App\Models\Cinema::class)
                                                                        <form
                                                                            action="{{ route('admin.cinemas.delete', $cinema->id) }}"
                                                                            class="formDelete" method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button
                                                                                class="btn btn-danger shadow btn-xs sharp me-1 call-ajax btn-remove btnDelete"
                                                                                data-type="DELETE" href="">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    @endcan
                                                                </div>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                {{ $data->links('pagination::bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center align-items-center p-5">
                                        <div>
                                            <h3 class="text-center">
                                                {{ request()->name ? 'Không có kết quả với từ khóa:' . request()->name : 'Không có dữ liệu' }}
                                            </h3>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin/ajaxs/cinema.js') }}"></script>
@endsection
