@extends('admin.layouts.main')

@section('title', 'Sửa phương thức thanh toán')

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
                <form method="post" action="{{ route('admin.payments.update', $payment->id) }}" class="product-vali"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label mb-2">Tên phương thức thanh toán</label>
                                            <input type="text" id="name" name="payment[name]" class="form-control"
                                                placeholder="Nhập tên phương thức thanh toán" value="{{ old('payment.name', $payment->name) }}">
                                            @error('payment.name')
                                                <div class="mt-2">
                                                    <span class="text-red">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-6 p-3">
                                            <label class="form-label mb-2">Mô tả</label>
                                            <textarea class="form-control ckeditor" cols="20" rows="5" name="payment[description]">{{ old('payment.description',$payment->description) }}</textarea>
                                            @error('payment.description')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-3 p-3">
                                            <label class="form-label mb-2">Ảnh</label>
                                            <div class="avatar-upload d-flex align-items-center">
                                                <div class=" position-relative" style="width: 120px;">
                                                    <div class="avatar-preview">
                                                        <div class="imagePreview"
                                                            style="background-image: url({{ asset($payment->image ??'images/no-img-avatar.png') }});">
                                                        </div>
                                                        @if (!empty($payment->image))
                                                        <button type="button"
                                                            class="removeImage"
                                                            data-id="{{ $payment->id }}"
                                                            data-url="{{ route('admin.payments.removeAvatarImage') }}"
                                                            data-image="{{ asset('images/no-img-avatar.png') }}">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </button>
                                                    @endif
                                                    </div>
                                                    <div
                                                        class="change-btn d-flex align-items-center flex-wrap">
                                                        <input type="file"
                                                            class="form-control d-none uploadImage"
                                                            id="imageUpload" name="payment[image]"
                                                            accept=".png, .jpg, .jpeg, .webp">
                                                        <label for="imageUpload"
                                                            class="btn btn-sm btn-primary light ms-0">Chọn ảnh</label>
                                                        @error('payment.image')
                                                            <div class="text-danger mt-2">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                            
                                        <div class="col-3 p-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="p-3">
                                                        <label class="form-label">Trạng thái</label><br>
                                                        <div class="row mt-2">
                                                            <div class="col-sm-6">
                                                                <input class="form-check-input" type="radio"
                                                                    id="active" name="payment[active]" value="1"
                                                                    @checked(old('payment.active', $payment->active) == 1)>
                                                                <label class="form-check-label" for="active">
                                                                    Hiển thị
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-check-input" value="0"
                                                                    type="radio" id="active" name="payment[active]"
                                                                    @checked(old('payment.active', $payment->active) == 0)>
                                                                <label class="form-check-label" for="active">
                                                                    Ẩn
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @error('payment.active')
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
                    </div>
                    <button type="submit" class="btn btn-success">
                        Sửa
                    </button>
                    <a href="{{ route('admin.payments.index') }}" class="btn btn-warning">
                        Trở về trang danh sách
                    </a>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('js')
@endsection
