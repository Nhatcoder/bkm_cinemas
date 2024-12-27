@extends('admin.layouts.main')

@section('title', 'Danh sách khu vực')

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-titles">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        @include('admin.components.breadcrumbs', [
                            'breadcrumbs' => $breadcrumbs,
                        ])
                    </nav>
                </div>
                <div class="col-12">
                    <div class="filter cm-content-box box-primary">
                        <div class="content-title SlideToolHeader">
                            <div class="cpa">
                                <i class="fa-sharp fa-solid fa-filter me-2"></i>Bộ lọc
                            </div>
                        </div>
                        <div class="cm-content-body form excerpt" style="">
                            <form action="{{ route('admin.areas.index') }}" method="GET">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6">
                                            <label class="form-label">Tên khu vực</label>
                                            <input id="name" value="{{ request()->area_name }}" name="area_name"
                                                type="text" class="form-control mb-xl-0 mb-3"
                                                placeholder="Nhập tên khu vực">
                                        </div>
                                        <div class="col-xl-2 col-sm-4 mb-3 mb-xl-0">
                                            <label class="form-label">Thành Phố</label>
                                            <div class="dropdown bootstrap-select form-control">
                                                <select name="cityId" class="form-control">
                                                    <option value="">
                                                        --chọn--
                                                    </option>
                                                    @if ($cities)
                                                        @foreach ($cities as $city)
                                                            <option @selected(request()->cityId == $city->id)
                                                                value="{{ $city->id }}">
                                                                {{ $city->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-6 align-self-end">
                                            <div>
                                                <button class="btn btn-primary me-2" title="Click here to Search"
                                                    type="submit">
                                                    <i class="fa-sharp fa-solid fa-filter me-2"></i>Tìm kiếm nâng cao
                                                </button>
                                                <button type="reset" class="btn btn-danger light"
                                                    title="Click here to remove filter">
                                                    Xóa trống
                                                </button>
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
                            <h4 class="card-title">Danh sách khu vực</h4>
                            @can('create', App\Models\Area::class)
                                <div class="compose-btn">
                                    <a href="{{ route('admin.areas.create') }}">
                                        <button class="btn btn-secondary btn-sm light">
                                            + Thêm Mới
                                        </button>
                                    </a>
                                </div>
                            @endcan
                        </div>
                        <div class="card-body">
                            @if (!$areas->isEmpty())
                                <div class="table-responsive">
                                    <table class="table table-responsive-md" id="data-table">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;">STT</th>
                                                <th>Tên Khu Vực</th>
                                                <th>Tên Thành Phố</th>
                                                @if (Auth()->user()->can('update', \App\Models\Area::class) || Auth()->user()->can('delete', \App\Models\Area::class))
                                                    <th>Hành Động</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($areas as $key => $area)
                                                <tr>
                                                    <td>
                                                        <strong
                                                            class="text-black">{{ ($areas->currentPage() - 1) * $areas->perPage() + $key + 1 }}</strong>
                                                    </td>
                                                    <td>
                                                        <b>{{ $area->name }}</b>
                                                    </td>
                                                    <td>
                                                        <b>{{ $area->city->name ?? 'Không có thành phố' }}</b>
                                                    </td>
                                                    @if (Auth()->user()->can('update', \App\Models\Area::class) || Auth()->user()->can('delete', \App\Models\Area::class))
                                                        <td>
                                                            <div style="display: flex; justify-content: end">
                                                                @can('update', App\Models\Area::class)
                                                                    <a href="{{ route('admin.areas.edit', $area->id) }}"
                                                                        class="btn btn-primary shadow btn-xs sharp me-1">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('delete', App\Models\Area::class)
                                                                    <form action="{{ route('admin.areas.delete', $area->id) }}"
                                                                        class="formDelete" method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button
                                                                            class="btn btn-danger shadow btn-xs sharp me-1 btn-remove"
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
                                            {{ $areas->links('pagination::bootstrap-4') }}
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
@endsection

@section('js')
@endsection