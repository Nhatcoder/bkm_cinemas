@extends('admin.layouts.main')

@section('title', 'Thêm mới đồ ăn')

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
                <form method="post" action="{{ route('admin.foods.store') }}" class="product-vali"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label class="form-label mb-2">Tên</label>
                                            <input type="text" id="name" name="food[name]" class="form-control"
                                                placeholder="Nhập tên" value="{{ old('food.name') }}">
                                            @error('food.name')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label mb-2">Giá</label>
                                            <input type="text" class="form-control" id="price" name="food[price]"
                                                placeholder="Nhập giá" value="{{ old('food.price') }}">
                                            @error('food.price')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label class="form-label mb-2">Mô tả</label>
                                            <textarea class="form-control ckeditor" cols="20" rows="5" name="food[description]">{{ old('food.description') }}</textarea>
                                            @error('food.description')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-7">
                                                    <div class="cm-content-body publish-content form excerpt">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="">
                                                                    <label class="form-label mb-2">Loại đồ ăn</label>
                                                                    <select class="form-control" name="food[food_type_id]">
                                                                        <option value=" ">--chọn--
                                                                        </option>
                                                                        @if (isset($listFoodTypes) && is_iterable($listFoodTypes))
                                                                            @foreach ($listFoodTypes as $foodType)
                                                                                <option value="{{ $foodType->id }}"
                                                                                    @selected(old('food.food_type_id') == $foodType->id)>
                                                                                    {{ $foodType->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                    @error('food.food_type_id')
                                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="mt-3">
                                                                    <label class="form-label">Số thứ tự</label><br>
                                                                    <input class="form-control"
                                                                        value="{{ old('food.order', 0) }}" type="number"
                                                                        min="0" id="order"
                                                                        name="food[order]">
                                                                    @error('food.order')
                                                                        <div class="mt-2">
                                                                            <span class="text-red">{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                            </div>
                                                            <div class="col-6">
                                                                <label class="form-label mb-2">Ảnh</label>
                                                                <div class="avatar-upload d-flex align-items-center">
                                                                    <div class=" position-relative" style="width: 120px;">
                                                                        <div class="avatar-preview">
                                                                            <div class="imagePreview"
                                                                                style="background-image: url({{ asset('images/no-img-avatar.png') }});">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="change-btn d-flex align-items-center flex-wrap">
                                                                            <input type="file"
                                                                                class="form-control d-none uploadImage"
                                                                                id="imageUpload" name="food[image]"
                                                                                accept=".png, .jpg, .jpeg, .webp">
                                                                            <label for="imageUpload"
                                                                                class="btn btn-sm btn-primary light ms-0">Chọn ảnh</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('food.image')
                                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="p-3">
                                                        <label class="form-label">Trạng thái</label><br>
                                                        <div class="row mt-2">
                                                            <div class="col-sm-7">
                                                                <input class="form-check-input" type="radio"
                                                                    id="active" name="food[active]" value="1"
                                                                    @checked(old('food.active', 1) == 1)>
                                                                <label class="form-check-label" for="active">
                                                                    Hiển thị
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <input class="form-check-input" value="0"
                                                                    type="radio" id="active" name="food[active]"
                                                                    @checked(old('food.active', 1) == 0)>
                                                                <label class="form-check-label" for="active">
                                                                    Ẩn
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @error('food.active')
                                                            <div class="mt-2">
                                                                <span class="text-red">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success">
                                            Tạo mới
                                        </button>
                                        <a href="{{ route('admin.foods.index') }}" class="btn btn-warning">
                                            Trở về trang danh sách
                                        </a>
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
