@extends('admin.layouts.main')

@section('title', 'Thêm mới khối trang')

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="page-titles">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    @include('admin.components.breadcrumbs', [
                        'breadcrumbs' => $breadcrumbs
                    ])
                </nav>
            </div>

            <form method="post" action="{{ route('admin.blocks.store') }}" class="product-vali"
                  enctype="multipart/form-data">
                @csrf
                <div class="page-titles d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <button type="button" style="margin-left: 30px;" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#modelEdit"><i class="fa-solid fa-table-cells-large"></i> Nhập thông tin khối
                        </button>
                        <button type="button" style="margin-left: 15px;" class="btn btn-light"
                                data-bs-toggle="modal"
                                data-bs-target="#modalLiveCode" id="runCodeButton"><i
                                class="fa-solid fa-circle-play"></i> Chạy Code
                        </button>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                        <a href="{{ route('admin.blocks.index') }}" style="margin-left: 15px;" class="btn btn-warning">Trở
                            về
                            trang
                            danh
                            sách
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card h-auto">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <label class="form-label mb-2">Tên khối</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                               placeholder="Nhập tên khối" value="{{ old('name') ?? '' }}">
                                        @error('name')
                                        <div class="mt-2">
                                            <span class="text-red">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label mb-2">Đường dẫn</label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                               placeholder="Nhập đường dẫn" value="{{ old('slug') ?? '' }}">
                                        @error('slug')
                                        <div class="mt-2">
                                            <span class="text-red">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <label class="form-label">Loại khối</label><br>
                                        <select class="form-control" name="block_type_id" id="block_type_id">
                                            <option selected disabled>-- Chọn --</option>
                                            @if(!empty($blockTypes))
                                                @foreach($blockTypes as $blockType)
                                                    <option
                                                        value="{{ $blockType->id }}">{{ $blockType->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('block_type_id')
                                        <div class="mt-2">
                                            <span class="text-red">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="right-sidebar-sticky">
                            <div class="filter cm-content-box box-primary">
                                <div class="content-title SlideToolHeader">
                                    <div class="cpa">
                                        Tùy chỉnh thêm
                                    </div>
                                </div>

                                <div class="cm-content-body publish-content form excerpt">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="p-3">
                                                <label class="form-label">Ngôn ngữ</label><br>
                                                <select class="form-control" multiple name="language_id[]" id="language">
                                                    @if(!empty($languages))
                                                        @foreach($languages as $language)
                                                            <option @selected(in_array($language->id, old('language_id', [])))
                                                                value="{{ $language->id }}">{{ $language->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('language_id')
                                                <div class="mt-2">
                                                    <span class="text-red">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="p-3">
                                                <label class="form-label">Số thứ tự</label><br>
                                                <input class="form-control" value="{{ old('order') ?? 0 }}"
                                                       type="number" min="0" id="order"
                                                       name="order">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="card-body">
                                                <label class="form-label">Trạng thái</label><br>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input class="form-check-input" type="radio" id="active"
                                                               name="active" value="1" checked>
                                                        <label class="form-check-label" for="active">
                                                            Hiện
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input class="form-check-input" value="0" type="radio"
                                                               id="active"
                                                               name="active">
                                                        <label class="form-check-label" for="active">
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
            </form>
        </div>
    </div>
@endsection

@section('js')
@endsection
