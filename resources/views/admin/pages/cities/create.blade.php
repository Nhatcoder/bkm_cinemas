@extends('admin.layouts.main')

@section('title', 'Thêm mới thành phố')

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
                                    'title' => $title['create'] ?? '',
                                    'breadcrumbs' => $breadcrumbs,
                                ])
                            </nav>
                        </div>
                    </div>
                </div>
                <form method="post" action="{{ route('admin.cities.store') }}" class="product-vali"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div>
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div>
                                        <div>
                                            <label class="form-label mb-2">Tên Thành Phố</label>
                                            <input type="text" id="name" name="city[name]" class="form-control"
                                                placeholder="Nhập Tên Thành Phố" value="{{ old('city.name') }}">
                                            @error('city.name')
                                                <div class="mt-2">
                                                    <span class="text-red">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mt-3 d-flex justify-content-start gap-2">
                                        <button type="submit" class="btn btn-success">Tạo Mới</button>
                                        <a href="{{ route('admin.cities.index') }}" class="btn btn-warning">Quay Về Trang
                                            Danh Sách</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('js')
@endsection
