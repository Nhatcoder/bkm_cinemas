@extends('admin.layouts.main')

@section('title', 'Thêm mới danh mục bài viết')

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
                <form method="post" action="{{ route('admin.categoryPosts.store') }}" class="product-vali"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label
                                                class="form-label mb-2">{{ __('language.admin.categoryPosts.filterName') }}</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                placeholder="{{ __('language.admin.categoryPosts.inputFilterName') }}"
                                                value="{{ old('name') ?? '' }}">
                                            @error('name')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label
                                                class="form-label mb-2">{{ __('language.admin.categoryPosts.slug') }}</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                placeholder="{{ __('language.admin.categoryPosts.inputSlug') }}"
                                                value="{{ old('slug') ?? '' }}">
                                            @error('slug')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Other fields here -->

                                    <div class="mb-4">
                                        <label
                                            class="form-label mb-2">{{ __('language.admin.categoryPosts.description') }}</label>
                                        <textarea class="form-control" cols="20" rows="5" name="description">{{ old('description') ?? '' }}</textarea>
                                        @error('description')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label
                                            class="form-label mb-2">{{ __('language.admin.categoryPosts.content') }}</label>
                                        <textarea name="content" class="ckeditor">{!! old('content') ?? '' !!}</textarea>
                                        @error('content')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="right-sidebar-sticky">
                                <!-- Category Section -->
                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">
                                            {{ __('language.admin.categoryPosts.category') }}
                                        </div>
                                        <div class="tools">

                                        </div>
                                    </div>
                                    <div class="cm-content-body publish-content form excerpt">
                                        <div class="card-body">
                                            <select class="form-control" aria-label="Default select example"
                                                name="parent_id" tabindex="null">

                                                <option value="" selected>--
                                                    {{ __('language.admin.categoryPosts.select') }} --</option>

                                                @foreach ($listCategoryPost as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                    @if (count($category->childrenRecursive) > 0)
                                                        @include('admin.components.child-category', [
                                                            'children' => $category->childrenRecursive,
                                                            'depth' => 1,
                                                        ])
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                @error('parent_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror


                                <!-- Image Upload Section -->
                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">
                                            {{ __('language.admin.categoryPosts.avatar') }}
                                        </div>
                                    </div>
                                    <div class="cm-content-body publish-content form excerpt">
                                        <div class="card-body">
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
                                                            id="imageUpload" name="avatar"
                                                            accept=".png, .jpg, .jpeg, .webp">
                                                        <label for="imageUpload"
                                                            class="btn btn-sm btn-primary light ms-0">Chọn ảnh</label>
                                                        @error('avatar')
                                                            <div class="text-danger mt-2">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            @error('avatar')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Custom Options Section -->
                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">
                                            {{ __('language.admin.categoryPosts.custom') }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="p-3">
                                                <label
                                                    class="form-label">{{ __('language.admin.categoryPosts.position') }}</label><br>
                                                <input class="form-control" value="{{ old('position') ?? 0 }}"
                                                       type="number" min="0" id="position" name="position">
                                                @error('position')
                                                <div class="mt-2">
                                                    <span class="text-red">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="p-3">
                                                <label
                                                    class="form-label">{{ __('language.admin.categoryPosts.order') }}</label><br>
                                                <input class="form-control" value="{{ old('order') ?? 0 }}"
                                                    type="number" min="0" id="order" name="order">
                                                @error('order')
                                                    <div class="mt-2">
                                                        <span class="text-red">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3 d-flex justify-content-start gap-2">
                                    <button type="submit"
                                        class="btn btn-success">{{ __('language.admin.categoryPosts.addNew') }}</button>
                                    <a href="{{ route('admin.categoryPosts.index') }}"
                                        class="btn btn-warning">{{ __('language.admin.categoryPosts.back') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
