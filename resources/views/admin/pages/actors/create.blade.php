@extends('admin.layouts.main')

@section('title', 'Thêm mới diễn viên')

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
                <form method="post" action="{{ route('admin.actors.store') }}" class="product-vali"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="actor-row row mt-2">
                                            <div class="col-4">
                                                <label
                                                    class="form-label mb-2">Tên diễn viên:</label>
                                                <input type="text" value="{{ old('actor.name') }}" name="actor[name]"
                                                    class="form-control"
                                                    placeholder="Nhập tên diễn viên">
                                                @error('actor.name')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label
                                                    class="form-label mb-2">Ngày sinh:</label>
                                                <input type="date" value="{{ old('actor.birth_date') }}" name="actor[birth_date]"
                                                    class="form-control">
                                                @error('actor.birth_date')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label
                                                    class="form-label mb-2">Quốc tịch:</label>
                                                <input type="text" value="{{ old('actor.nationality') }}" value=""
                                                    name="actor[nationality]" class="form-control"
                                                    placeholder="Nhập quốc tịch">
                                                @error('actor.nationality')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-8 p-3">
                                                <label class="form-label mb-2">Tiểu sử:</label>
                                                <textarea class="form-control ckeditor" cols="20" rows="5" name="actor[biography]">{{ old('actor.biography') }}</textarea>
                                                @error('actor.biography')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-4 p-3">
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
                                                                id="imageUpload" name="actor[image]"
                                                                accept=".png, .jpg, .jpeg, .webp">
                                                            <label for="imageUpload"
                                                                class="btn btn-sm btn-primary light ms-0">Chọn ảnh</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('actor.image')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">
                        Tạo mới
                    </button>
                    <a href="{{ route('admin.actors.index') }}" class="btn btn-warning">
                        Trở về trang danh sách
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection
