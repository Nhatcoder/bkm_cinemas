@extends('admin.layouts.main')

@section('title', 'Cập nhật bài viết')

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
                <form method="post" action="{{ route('admin.posts.update', ['id' => $post->id]) }}" class="product-vali"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label
                                                class="form-label mb-2">{{ __('language.admin.posts.filterName') }}</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                placeholder="{{ __('language.admin.posts.inputFilterName') }}"
                                                value="{{ old('name', $post->name) ?? '' }}">
                                            @error('name')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label mb-2">{{ __('language.admin.posts.slug') }}</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                placeholder="{{ __('language.admin.posts.inputSlug') }}"
                                                value="{{ old('slug', $post->slug) ?? '' }}">
                                            @error('slug')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label mb-2">{{ __('language.admin.posts.description') }}</label>
                                        <textarea class="form-control" cols="20" rows="5" name="description">{{ old('description', $post->description) ?? '' }}</textarea>
                                        @error('description')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label mb-2">{{ __('language.admin.posts.content') }}</label>
                                        <textarea name="content" class="ckeditor">{!! old('content', $post->content) ?? '' !!}</textarea>
                                        @error('content')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="right-sidebar-sticky">
                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">
                                            {{ __('language.admin.posts.category') }}
                                        </div>
                                        <div class="tools">

                                        </div>
                                    </div>
                                    <div class="cm-content-body publish-content form excerpt">
                                        <div class="card-body">
                                            <select multiple class="form-control" name="parent_id[]">
                                                <option value=" " disabled>--{{ __('language.admin.posts.select') }}--
                                                </option>
                                                @foreach ($listCategoryPost as $category)
                                                    <option value="{{ $category->id }}" @selected(in_array($category->id, old('parent_id', $cateData)))>
                                                        {{ $category->name }}
                                                    </option>
                                                    @if (count($category->childrenRecursive) > 0)
                                                        @include('admin.components.child-category', [
                                                            'children' => $category->childrenRecursive,
                                                            'depth' => 1,
                                                            'cateData' => $cateData,
                                                        ])
                                                    @endif
                                                @endforeach
                                            </select>

                                            @error('parent_id')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">
                                            {{ __('language.admin.posts.tag') }}
                                        </div>
                                        <div class="tools">

                                        </div>
                                    </div>
                                    <div class="cm-content-body publish-content form excerpt">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-4">
                                                    <h4 class="card-title">{{ __('language.admin.posts.tagTitle') }}</h4>
                                                </div>

                                                <select name="tags[]" id="multi-value-select" style="width:100%;"
                                                    multiple="" data-select2-id="select2-data-multi-value-select"
                                                    tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                                                    @foreach ($tags as $tag)
                                                        <option @if (in_array($tag->id, $tagsSelected)) selected @endif
                                                            data-select2-id="select2-data-{{ $tag->id }}-jw2f">
                                                            {{ $tag->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('tags.*')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">
                                            {{ __('language.admin.posts.avatar') }}
                                        </div>
                                    </div>
                                    <div class="cm-content-body publish-content form excerpt">
                                        <div class="card-body">
                                            <div class="avatar-upload d-flex align-items-center">
                                                <div class=" position-relative" style="width: 120px;">
                                                    <div class="avatar-preview">
                                                        <div class="imagePreview"
                                                            style="background-image: url({{ asset($post->avatar ?? 'images/no-img-avatar.png') }});">
                                                        </div>
                                                        @if (!empty($post->avatar))
                                                            <button type="button" class="removeImage"
                                                                data-id="{{ $post->id }}"
                                                                data-url="{{ route('admin.posts.removeAvatarImage') }}"
                                                                data-image="{{ asset('images/no-img-avatar.png') }}">
                                                                <i class="fa-solid fa-xmark"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                    <div class="change-btn d-flex align-items-center flex-wrap">
                                                        <input type="file" class="form-control d-none uploadImage"
                                                            id="imageUpload" name="avatar"
                                                            accept=".png, .jpg, .jpeg, .webp">
                                                        <label for="imageUpload"
                                                            class="btn btn-sm btn-primary light ms-0">Chọn
                                                            ảnh</label>
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
                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">
                                            {{ __('language.admin.posts.relatePhotos') }}
                                        </div>
                                    </div>
                                    <div class="cm-content-body publish-content form excerpt">
                                        <div class="card-body">
                                            <div class="col-12 mt-3 mb-3">
                                                <label for="Ảnh"
                                                    class="form-label">{{ __('language.admin.posts.relatePhotos') }}</label>
                                                <div
                                                    style="border: 1px solid #e6e6e6; padding: 20px 0 0 18px; border-radius: 5px;">
                                                    <div id="variantContainer" class="d-flex flex-wrap">
                                                        @if (!empty($post->images) && count($post->images) > 0)
                                                            <!-- Hiển thị các ảnh liên quan nếu có -->
                                                            @foreach ($post->images as $image)
                                                                <div class="variantColor d-flex align-items-center">
                                                                    <div class="mb-3 w-25 file-input-wrapper"
                                                                        style="margin-right: 18px; width: 110px !important;">
                                                                        <div class="custom-button" style="display: none;">
                                                                            <i class="nav-icon fas fa-upload"></i>
                                                                        </div>
                                                                        <img src="{{ url($image->path) }}"
                                                                            alt="Preview Image" style="display: inline;">
                                                                        <button class="btnRemoveEditAjax" type="button"
                                                                            style="display: flex;"
                                                                            data-url="{{ route('admin.posts.destroyImage', $image->id) }}"
                                                                            data-method="DELETE"
                                                                            data-id="{{ $image->id }}">×
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
    
                                                        <div class="variantColor d-flex align-items-center">
                                                            <div class="mb-3 w-25 file-input-wrapper"
                                                                style="margin-right: 18px; width: 110px !important;">
                                                                <input type="file" multiple name="relatedPhotos[]"
                                                                    id="relatedPhotos" class="form-control relatedPhotos">
                                                                <div class="custom-button" style="border: 2px solid #565656;">
                                                                    <i class="nav-icon fas fa-upload"></i>
                                                                </div>
                                                                <img src="#" alt="Preview Image">
                                                                <button class="remove-button" type="button">&times;
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-success mt-3" type="button"
                                                    id="addAnhLienQuan">{{ __('language.admin.posts.addRelatePhotos') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">
                                            {{ __('language.admin.posts.custom') }}
                                        </div>
                                    </div>

                                    <div class="cm-content-body publish-content form excerpt">

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="p-3">
                                                    <label
                                                        class="form-label">{{ __('language.admin.posts.active') }}</label><br>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6">
                                                            <input class="form-check-input" type="radio" id="active"
                                                                {{ $post->active == 1 ? 'checked' : '' }} name="active"
                                                                value="1" checked>
                                                            <label class="form-check-label" for="active">
                                                                {{ __('language.admin.posts.show') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-check-input" value="0" type="radio"
                                                                {{ $post->active == 0 ? 'checked' : '' }} id="active"
                                                                name="active">
                                                            <label class="form-check-label" for="active">
                                                                {{ __('language.admin.posts.hidden') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-3">
                                                    <label
                                                        class="form-label">{{ __('language.admin.posts.order') }}</label><br>
                                                    <input class="form-control" value="{{ old('order', $post->order) }}"
                                                        type="number" min="0" id="order" name="order">
                                                    @error('order')
                                                        <div class="mt-2">
                                                            <span class="text-red">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="card-body">
                                                    <label
                                                        class="form-label">{{ __('language.admin.posts.hot') }}</label><br>
                                                    <input {{ $post->hot == 1 ? 'checked' : '' }} class="form-check-input"
                                                        type="checkbox" id="hot" name="hot" value="1">
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="card-body">
                                                    <label
                                                        class="form-label">Tin khuyến mãi</label><br>
                                                    <input {{ $post->promotion == 1 ? 'checked' : '' }} class="form-check-input" type="checkbox" id="promotion"
                                                        name="promotion" value="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 d-flex justify-content-start gap-2">
                                    <button type="submit"
                                        class="btn btn-success">{{ __('language.admin.posts.editSave') }}</button>
                                    <a href="{{ route('admin.posts.index') }}"
                                        class="btn btn-warning">{{ __('language.admin.posts.back') }}</a>
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
