@extends('admin.layouts.main')

@section('title', 'Danh sách đồ ăn')

@section('css')

@endsection

@section('content')
    {{-- @dd($typeOrder) --}}
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
                            <div class="cm-content-body form excerpt" style="">
                                <form action="{{ route('admin.foods.index') }}" method="GET">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-3 col-sm-6">
                                                <label
                                                    class="form-label">Tên đồ ăn</label>
                                                <input id="name" value="{{ request()->name }}" name="name" type="text"
                                                    class="form-control mb-xl-0 mb-3"
                                                    placeholder="Nhập tên đồ ăn">
                                            </div>
                                            <div class="col-xl-2  col-sm-4 mb-3 mb-xl-0">
                                                <label
                                                    class="form-label">Sắp xếp</label>
                                                <div id="order" class="dropdown bootstrap-select form-control">
                                                    <select name="order_with" class="form-control">
                                                        <option value="">
                                                            --chọn--
                                                        </option>
                                                        <option @selected( request()->order_with == 'dateASC' ) value="dateASC">
                                                            Ngày tạo tăng dần
                                                        </option>
                                                        <option @selected( request()->order_with == 'dateDESC' ) value="dateDESC">
                                                            Ngày tạo giảm dần
                                                        </option>
                                                        <option @selected( request()->order_with == 'priceASC' ) value="priceASC">
                                                            Giá tăng dần
                                                        </option>
                                                        <option @selected( request()->order_with == 'priceDESC' ) value="priceDESC">
                                                            Giá giảm dần
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-sm-4 mb-3 mb-xl-0">
                                                <label class="form-label">Loại đồ ăn</label>
                                                <div class="dropdown bootstrap-select form-control">
                                                    <select name="foodTypeId" class="form-control">
                                                        <option value="">
                                                            --chọn--
                                                        </option>
                                                        @if ($listFoodTypes)
                                                            @foreach ($listFoodTypes as $foodType)
                                                                <option @selected( request()->foodTypeId == $foodType->id ) value="{{ $foodType->id }}">
                                                                    {{ $foodType->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2  col-sm-4 mb-3 mb-xl-0">
                                                <label class="form-label">Lọc theo</label>
                                                <select name="fill_action" class="form-control">
                                                    <option value="">
                                                        --chọn--
                                                    </option>
                                                    <option @selected(request()->fill_action == "active") value="active">
                                                        Hiện
                                                    </option>
                                                    <option @selected(request()->fill_action == "noActive") value="noActive">
                                                        Ẩn
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-xl-3 col-sm-6 align-self-end">
                                                <div>
                                                    <button class="btn btn-primary me-2" title="Click here to Search"
                                                        type="submit"><i class="fa-sharp fa-solid fa-filter me-2"></i>Tìm
                                                        kiếm nâng cao
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Danh Sách Đồ Ăn</h4>
                                <div class="compose-btn">
                                    @can('create', \App\Models\Food::class)
                                        <a href="{{ route('admin.foods.create') }}">
                                            <button class="btn btn-secondary btn-sm light">
                                                + Thêm mới
                                            </button>
                                        </a>
                                    @endcan
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($data->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md" id="data-table">
                                            <thead>
                                                <tr>
                                                    @can('deleteMultiple', \App\Models\Food::class)
                                                        <th>
                                                            <div class="box-delete-item">
                                                                <input type="checkbox" id="item-all-checked">
                                                                <button id="btn-delete-all"
                                                                    data-url="{{ route('admin.foods.deleteItemMultipleChecked') }}"
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
                                                    <th>#</th>
                                                    <th class="white-space-nowrap">
                                                        Tên
                                                    </th>
                                                    <th>Ảnh</th>
                                                    <th>Giá</th>
                                                    <th>Loại đồ ăn</th>
                                                    <th class="text-center">Trạng thái</th>
                                                    <th class="text-center">Số thứ tự</th>
                                                    @if (Auth()->user()->can('update', \App\Models\Food::class) || Auth()->user()->can('delete', \App\Models\Food::class))
                                                        <th>Hành động</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $food)
                                                    <tr>
                                                        @can('deleteMultiple', \App\Models\Food::class)
                                                            <td>
                                                                <input type="checkbox" data-id="{{ $food->id }}"
                                                                    class="item-checked">
                                                            </td>
                                                        @endcan
                                                        <td>
                                                            <strong class="text-black">
                                                                {{ ($data->currentPage() - 1) * $data->perPage() + $key + 1 }}
                                                            </strong>
                                                        </td>

                                                        <td style="max-width: 155px !important;">
                                                            <b class="text-style">
                                                                {{ $food->name }}
                                                            </b>
                                                        </td>
                                                        <td>
                                                            @if (!empty($food->image) && file_exists(public_path($food->image)))
                                                                <img src="{{ asset($food->image) }}"
                                                                    style="width:80px; height:100px; object-fit:cover">
                                                            @else
                                                                <img src="#" alt="No image"
                                                                    style="width:80px; height:100px; object-fit:cover">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <b>
                                                                {{ number_format($food->price, 0, '.', ',') }}đ
                                                            </b>
                                                        </td>
                                                        <td>
                                                           <b>
                                                               {{ $food->type->name ?? 'Chưa có' }}
                                                           </b>
                                                        </td>
                                                        <td class="text-center">
                                                            @can('changeActive', \App\Models\Food::class)
                                                                <button
                                                                    class="toggle-active-btn btn btn-xs {{ $food->active == 1 ? 'btn-success' : 'btn-danger' }} text-white"
                                                                    data-id="{{ $food->id }}"
                                                                    data-status="{{ $food->active }}"
                                                                    data-url="{{ route('admin.foods.changeActive') }}">
                                                                    {{ $food->active == 1 ? 'Hiện' : 'Ẩn' }}
                                                                </button>
                                                            @else
                                                                <span class="badge light badge-{{ $food->active == 1 ? 'success' : 'danger' }}">
                                                                    {{ $food->active == 1 ? 'Hiện' : 'Ẩn' }}
                                                                </span>
                                                            @endcan
                                                        </td>
                                                        <td class="text-center">
                                                            @can('changeOrder', \App\Models\Food::class)
                                                                <input type="number" min="0" name="order"
                                                                    value="{{ $food->order }}"
                                                                    data-id="{{ $food->id }}"
                                                                    data-url="{{ route('admin.foods.changeOrder') }}"
                                                                    class="form-control changeOrder" style="width: 67px;">
                                                            @else
                                                                <b>
                                                                    {{ $food->order }}
                                                                </b>
                                                            @endcan
                                                        </td>
                                                        @if (Auth()->user()->can('update', \App\Models\Food::class) || Auth()->user()->can('delete', \App\Models\Food::class))
                                                            <td>
                                                                <div
                                                                    style="padding-right: 20px; display: flex; justify-content: end">
                                                                    @can('update', \App\Models\Food::class)
                                                                        <a href="{{ route('admin.foods.edit', $food->id) }}"
                                                                            class="btn btn-primary shadow btn-xs sharp me-1">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('delete', \App\Models\Food::class)
                                                                        <form
                                                                            action="{{ route('admin.foods.delete', $food->id) }}"
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
@endsection
