@extends('admin.layouts.main')

@section('title', 'Thêm mới quà tặng')

@section('css')
@endsection

@section('content')
    {{-- @if ($errors->any())
        @foreach ($errors as $item)
            {{ $item }}
        @endforeach

    @endif --}}
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
                <form method="post" action="{{ route('admin.rewards.store') }}" class="product-vali"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="actor-row row mt-2">
                                            <div class="col-4">
                                                <label class="form-label mb-2">Tên quà tặng:</label>
                                                <input type="text" value="{{ old('reward.name') }}" name="reward[name]"
                                                    class="form-control" placeholder="Nhập tên quà tặng">
                                                @error('reward.name')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label mb-2">Số điểm:</label>
                                                <input type="number" min="1"
                                                    value="{{ old('actor.points_required', 1) }}"
                                                    name="reward[points_required]" class="form-control">
                                                @error('reward.points_required')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-7 p-3">
                                                <label class="form-label mb-2">Mô tả:</label>
                                                <textarea class="form-control ckeditor" cols="20" rows="5" name="reward[description]">{{ old('reward.description') }}</textarea>
                                                @error('reward.description')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-5 p-3">
                                                <label class="form-label mb-2">Ảnh</label>
                                                <div class="avatar-upload d-flex align-items-center">
                                                    <div class=" position-relative" style="width: 120px;">
                                                        <div class="avatar-preview">
                                                            <div class="imagePreview"
                                                                style="background-image: url({{ asset('images/no-img-avatar.png') }});">
                                                            </div>
                                                        </div>
                                                        <div class="change-btn d-flex align-items-center flex-wrap">
                                                            <input type="file" class="form-control d-none uploadImage"
                                                                id="imageUpload" name="reward[image]"
                                                                accept=".png, .jpg, .jpeg, .webp">
                                                            <label for="imageUpload"
                                                                class="btn btn-sm btn-primary light ms-0">Chọn ảnh</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('reward.image')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                <div class="col-6">
                                                    <div class="p-3">
                                                        <label class="form-label">Trạng thái</label><br>
                                                        <div class="row mt-2">
                                                            <div class="col-sm-7">
                                                                <input class="form-check-input" type="radio" id="active"
                                                                    name="reward[active]" value="1"
                                                                    @checked(old('reward.active', 1) == 1)>
                                                                <label class="form-check-label" for="active">
                                                                    Hiển thị
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <input class="form-check-input" value="0" type="radio"
                                                                    id="active1" name="reward[active]"
                                                                    @checked(old('reward.active', 1) == 0)>
                                                                <label class="form-check-label" for="active1">
                                                                    Ẩn
                                                                </label>
                                                            </div>
                                                        </div>
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
                        Tạo mới
                    </button>
                    <a href="{{ route('admin.rewards.index') }}" class="btn btn-warning">
                        Trở về trang danh sách
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection
