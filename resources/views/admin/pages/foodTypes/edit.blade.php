@extends('admin.layouts.main')

@section('title', 'Sửa loại đồ ăn')

@section('css')
@endsection

@section('content')
    @if ($errors->any())
        @foreach ($errors as $item)
            {{ $item }}
        @endforeach

    @endif
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
                <form method="post" action="{{ route('admin.food-types.update', $data->id) }}" class="product-vali"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label class="form-label mb-2">Tên loại đồ ăn</label>
                                            <input type="text" id="name" name="foodType[name]" class="form-control"
                                                placeholder="Nhập tên loại đồ ăn" value="{{ old('foodType.name', $data->name) }}">
                                            @error('foodType.name')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="p-3">
                                                        <label class="form-label">Trạng thái</label><br>
                                                        <div class="row mt-2">
                                                            <div class="col-sm-6">
                                                                <input class="form-check-input" type="radio"
                                                                    id="active" name="foodType[active]" value="1"
                                                                    @checked(old('foodType.active', $data->active) == 1)>
                                                                <label class="form-check-label" for="active">
                                                                    Hiển thị
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-check-input" value="0"
                                                                    type="radio" id="active" name="foodType[active]"
                                                                    @checked(old('foodType.active', $data->active) == 0)>
                                                                <label class="form-check-label" for="active">
                                                                    Ẩn
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @error('foodType.active')
                                                            <div class="mt-2">
                                                                <span class="text-red">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Số thứ tự</label><br>
                                                    <input class="form-control" value="{{ old('foodType.order', $data->order) }}" type="number"
                                                        min="0" id="order" name="foodType[order]">
                                                    @error('foodType.order')
                                                        <div class="mt-2">
                                                            <span class="text-red">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">
                        Sửa
                    </button>
                    <a href="{{ route('admin.food-types.index') }}" class="btn btn-warning">
                        Trở về trang danh sách
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection
