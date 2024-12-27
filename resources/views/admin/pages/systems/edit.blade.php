@extends('admin.layouts.main')

@section('title', $title['edit'] ?? 'Cập nhật cho hệ thống')

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
                                    'title' => $title['edit'] ?? '',
                                    'breadcrumbs' => $breadcrumbs
                                ])
                            </nav>
                        </div>
                    </div>
                </div>
                <form method="post"
                    action="{{ route('admin.systems.update', $system->id) }}{{ request()->system_id > 0 ? '?system_id=' . request()->system_id : '' }}"
                    class="product-vali" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="{{ request()->system_id ?? 0 }}">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label class="form-label mb-2">{{ __('language.admin.systems.nameSystem') }}</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                placeholder="{{ __('language.admin.systems.inputName') }}" value="{{ old('name') ?? $system->name }}">
                                            @error('name')
                                                <div class="mt-2">
                                                    <span class="text-red">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label mb-2">{{ __('language.admin.systems.slug') }}</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                placeholder="{{ __('language.admin.systems.inputSlug') }}" value="{{ old('slug') ?? $system->slug }}">
                                            @error('slug')
                                                <div class="mt-2">
                                                    <span class="text-red">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label mb-2">{{ __('language.admin.systems.description') }}</label>
                                        <textarea class="form-control" cols="20" rows="5" name="description">{{ old('description') ?? $system->description }}</textarea>
                                        @error('description')
                                            <div class="mt-2">
                                                <span class="text-red">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label mb-2">{{ __('language.admin.systems.content') }}</label>
                                        <textarea name="content" class="ckeditor">{!! old('content') ?? $system->content !!}</textarea>
                                        @error('content')
                                            <div class="mt-2">
                                                <span class="text-red">{{ $message }}</span>
                                            </div>
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
                                            {{ __('language.admin.systems.avatar') }}
                                        </div>
                                    </div>
                                    <div class="cm-content-body publish-content form excerpt">
                                        <div class="card-body">
                                            <div class="avatar-upload d-flex align-items-center">
                                                <div class=" position-relative" style="width: 120px;">
                                                    <div class="avatar-preview">
                                                        <div class="imagePreview"
                                                            style="background-image: url({{ asset($system->image ?? 'images/no-img-avatar.png') }});">
                                                        </div>
                                                        @if (!empty($system->image))
                                                            <button type="button" class="removeImage"
                                                                data-id="{{ $system->id }}"
                                                                data-url="{{ route('admin.systems.removeAvatarImage') }}"
                                                                data-image="{{ asset('images/no-img-avatar.png') }}">
                                                                <i class="fa-solid fa-xmark"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                    @error('image')
                                                        <div class="mt-2 mb-2">
                                                            <span class="text-red">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                    <div class="change-btn d-flex align-items-center flex-wrap">
                                                        <input type="file" class="form-control d-none uploadImage" name="image"
                                                            id="imageUpload" accept=".png, .jpg, .jpeg">
                                                        <label for="imageUpload"
                                                            class="btn btn-sm btn-primary light ms-0">{{ __('language.admin.systems.selectImage') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">
                                            {{ __('language.admin.systems.custom') }}
                                        </div>
                                    </div>

                                    <div class="cm-content-body publish-content form excerpt">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="p-3">
                                                    <label class="form-label">{{ __('language.admin.systems.active') }}</label><br>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <input class="form-check-input" type="radio" id="active"
                                                                   name="active" value="1"
                                                                {{ $system->active == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="active">
                                                                {{ __('language.admin.systems.show') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-check-input" value="0" type="radio"
                                                                   id="active" name="active"
                                                                {{ $system->active == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="active">
                                                                {{ __('language.admin.systems.hidden') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-3">
                                                    <label class="form-label">{{ __('language.admin.systems.order') }}</label><br>
                                                    <input class="form-control" value="{{ $system->order ?? 0 }}"
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
                                </div>
                                <div class="mt-3 d-flex justify-content-start gap-2">
                                    <button type="submit" class="btn btn-success">{{ __('language.admin.systems.saveEdit') }}</button>
                                    <a href="{{ route('admin.systems.index', request()->system_id > 0 ? 'system_id=' . request()->system_id : '') }}"
                                        class="btn btn-warning">{{ __('language.admin.systems.back') }}</a>
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
