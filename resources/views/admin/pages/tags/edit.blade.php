@extends('admin.layouts.main')

@section('title', 'Cập nhật thẻ')

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
                                    'breadcrumbs' => $breadcrumbs
                                ])
                            </nav>
                        </div>
                    </div>
                </div>
                <form method="post" action="{{ route('admin.tags.update', $tag->id) }}" class="product-vali">
                    @csrf
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label class="form-label mb-2">{{ __('language.admin.tags.filterName') }}</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                placeholder="Nhập tên thẻ tag" value="{{ old('name', $tag->name) }}">
                                            @error('name')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label mb-2">{{ __('language.admin.tags.slug') }}</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                placeholder="{{ __('language.admin.tags.inputSlug') }}" value="{{ old('slug', $tag->slug) }}">
                                            @error('slug')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Other fields here -->

                                    <div class="mb-4">
                                        <label class="form-label mb-2">{{ __('language.admin.tags.description') }}</label>
                                        <textarea placeholder="{{ __('language.admin.tags.inputDescription') }}" class="form-control" cols="20" rows="5" name="description">{{ old('description', $tag->description) }}</textarea>
                                        @error('description')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="right-sidebar-sticky">
                                <!-- Custom Options Section -->
                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">
                                            {{ __('language.admin.tags.custom') }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="p-3">
                                                <label class="form-label">{{ __('language.admin.tags.active') }}</label><br>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input class="form-check-input" type="radio" id="active"
                                                               @checked($tag->active == 1)
                                                               name="active" value="1" checked>
                                                        <label class="form-check-label" for="active">
                                                            {{ __('language.admin.tags.show') }}
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input class="form-check-input" value="0" type="radio"
                                                               @checked($tag->active == 0)
                                                               id="active" name="active">
                                                        <label class="form-check-label" for="active">
                                                            {{ __('language.admin.tags.hidden') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="p-3">
                                                <label class="form-label"> {{ __('language.admin.tags.order') }}</label><br>
                                                <input class="form-control" value="{{ old('order', $tag->order) }}"
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
                                    <button type="submit" class="btn btn-success"> {{ __('language.admin.tags.editSave') }}</button>
                                    <a href="{{ route('admin.tags.index') }}" class="btn btn-warning"> {{ __('language.admin.tags.back') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
