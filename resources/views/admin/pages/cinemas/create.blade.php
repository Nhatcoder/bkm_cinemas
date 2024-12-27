@extends('admin.layouts.main')

@section('title', 'Thêm mới rạp')

@section('css')
    <style>
        .box-map-google iframe {
            width: 100% !important;
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
                <form method="post" action="{{ route('admin.cinemas.store') }}" class="product-vali"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label class="form-label mb-2">Tên rạp:</label>
                                            <input type="text" value="{{ old('cinema.name') }}" name="cinema[name]"
                                                class="form-control" placeholder="Nhập tên rạp">
                                            @error('cinema.name')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label mb-2">Địa chỉ:</label>
                                            <input type="text" value="{{ old('cinema.address') }}" name="cinema[address]"
                                                placeholder="Nhập địa chỉ" class="form-control">
                                            @error('cinema.address')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label class="form-label mb-2">Số điện thoại:</label>
                                            <input type="text" value="{{ old('cinema.phone') }}" name="cinema[phone]"
                                                placeholder="Nhập số điện thoại" class="form-control">
                                            @error('cinema.phone')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label mb-2">Email:</label>
                                            <input type="text" value="{{ old('cinema.email') }}" name="cinema[email]"
                                                placeholder="Nhập email" class="form-control">
                                            @error('cinema.email')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <label class="form-label mb-2">Map:</label>
                                            <textarea class="form-control" cols="20" rows="5" name="cinema[map]">{{ old('cinema.map') }}</textarea>
                                            @error('cinema.map')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <label class="form-label mb-2">Mô tả:</label>
                                            <textarea class="form-control ckeditor" cols="20" rows="5" name="cinema[description]">{{ old('cinema.description') }}</textarea>
                                            @error('cinema.description')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="filter cm-content-box box-primary">
                                <div class="content-title SlideToolHeader">
                                    <div class="cpa">
                                        Khu vực
                                    </div>
                                    <div class="tools">

                                    </div>
                                </div>
                                <div class="cm-content-body publish-content form excerpt">
                                    <div class="card-body">
                                        <select style="width:100%;" name="cinema[area_id]" id="single-select">
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}" @selected(old('cinema.area_id') == $area->id)>
                                                    {{ $area->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('cinema.area_id')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="right-sidebar-sticky">
                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">
                                            Ảnh
                                        </div>
                                        <div class="tools">

                                        </div>
                                    </div>
                                    <div class="cm-content-body publish-content form excerpt">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="avatar-upload d-flex align-items-center">
                                                        <div class=" position-relative" style="width: 120px;">
                                                            <div class="avatar-preview">
                                                                <div class="imagePreview"
                                                                    style="background-image: url({{ asset('images/no-img-avatar.png') }});">
                                                                </div>
                                                            </div>
                                                            <div class="change-btn d-flex align-items-center flex-wrap">
                                                                <input type="file"
                                                                    class="form-control d-none uploadImage" id="imageUpload"
                                                                    name="cinema[image]" accept=".png, .jpg, .jpeg, .webp">
                                                                <label for="imageUpload"
                                                                    class="btn btn-sm btn-primary light ms-0">
                                                                    Chọn ảnh
                                                                </label>
                                                                @error('avatar')
                                                                    <div class="text-danger mt-2">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('cinema.image')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Trạng thái</label><br>
                                                    <div class="row mt-2">
                                                        <div class="row">
                                                            <div class="col">
                                                                <input class="form-check-input" type="radio" id="active"
                                                                    name="cinema[active]" value="1" checked>
                                                                <label class="form-check-label" for="active">
                                                                    Hiển thị
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col">
                                                                <input class="form-check-input" value="0" type="radio"
                                                                    id="active" name="cinema[active]">
                                                                <label class="form-check-label" for="active">
                                                                    Ẩn
                                                                </label>
                                                            </div>
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

                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">
                                            Bản đồ địa điểm google map
                                        </div>
                                        <div class="tools">

                                        </div>
                                    </div>

                                    <div class="cm-content-body publish-content form excerpt">
                                        <div class="card-body">
                                            <div class="box-map-google">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3 d-flex justify-content-start gap-2">
                                    <button type="submit" class="btn btn-success">
                                        Thêm mới
                                    </button>
                                    <a href="{{ route('admin.cinemas.index') }}" class="btn btn-warning">
                                        Trở về trang danh sách
                                    </a>
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
    <script>
        $(document).ready(function() {
            $('textarea[name="cinema[map]"]').on('input', function() {
                // Lấy nội dung trong textarea
                const mapContent = $(this).val();

                // Kiểm tra xem nội dung có chứa iframe hay không
                if (mapContent.includes('<iframe')) {
                    // Tìm iframe từ nội dung
                    const iframe = $(mapContent).filter('iframe');

                    // Nếu tìm thấy iframe, đổ vào box-map-google
                    if (iframe.length) {
                        $('.box-map-google').html(iframe);
                    }
                }
            });
        });
    </script>
@endsection
