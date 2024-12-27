@extends('admin.layouts.main')

@section('title', 'Danh sách thành phố')

@section('css')
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
                <div class="col-12">
                    <div class="filter cm-content-box box-primary">
                        <div class="content-title SlideToolHeader">
                            <div class="cpa">
                                <i class="fa-sharp fa-solid fa-filter me-2"></i>Bộ lọc
                            </div>
                        </div>
                        <div class="cm-content-body form excerpt" style="">
                            <form action="{{ route('admin.cities.index') }}" method="GET">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6">
                                            <label
                                                class="form-label">Tên thành phố</label>
                                            <input id="name" value="{{ request()->city_name }}" name="city_name" type="text"
                                                class="form-control mb-xl-0 mb-3"
                                                placeholder="Nhập tên thành phố">
                                        </div>
                                        <div class="col-xl-6 col-sm-6 align-self-end">
                                            <div>
                                                <button class="btn btn-primary me-2" title="Click here to Search" type="submit">
                                                    <i class="fa-sharp fa-solid fa-filter me-2"></i>Tìm kiếm nâng cao
                                                </button>
                                                <button type="reset" class="btn btn-danger light" title="Click here to remove filter">
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
                                <h4 class="card-title">Danh Sách Thành Phố</h4>
                                @can('create', App\Models\City::class)
                                    <div class="compose-btn">
                                        <a href="{{ route('admin.cities.create') }}">
                                            <button class="btn btn-secondary btn-sm light">
                                                + Thêm Mới
                                            </button>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if(!$cities->isEmpty())
                                        <table class="table table-responsive-md" id="data-table">
                                            <thead>
                                                <tr>
                                                    <th style="width:80px;">STT</th>
                                                    <th>Tên Thành Phố</th>
                                                    @if (Auth()->user()->can('update', \App\Models\City::class) || Auth()->user()->can('delete', \App\Models\City::class))
                                                        <th>Hành Động</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cities as $key => $city)
                                                <tr>
                                                    <td>
                                                        <strong
                                                            class="text-black">{{ ($cities->currentPage() - 1) * $cities->perPage() + $key + 1 }}</strong>
                                                    </td>
                                                    <td>
                                                        <b>{{ $city->name }}</b>
                                                    </td>
                                                    @if (Auth()->user()->can('update', \App\Models\City::class) || Auth()->user()->can('delete', \App\Models\City::class))
                                                        <td>
                                                            <div style="display: flex; justify-content: end">
                                                                @can('update', \App\Models\City::class)
                                                                    <a href="{{ route('admin.cities.edit', $city->id) }}" class="btn btn-primary shadow btn-xs sharp me-1">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('delete', \App\Models\City::class)
                                                                    <form action="{{ route('admin.cities.delete', $city->id) }}" class="formDelete" method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-danger shadow btn-xs sharp me-1 btn-remove" data-type="DELETE" href="">
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
                                                {{ $cities->links('pagination::bootstrap-4') }}
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
    </div>
@endsection

@section('js')

@endsection
