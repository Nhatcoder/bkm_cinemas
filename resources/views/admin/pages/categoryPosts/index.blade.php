@extends('admin.layouts.main')

@section('title', 'Danh sách danh mục bài viết')

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
                <div class="row">
                    <div class="col-12">
                        <div class="filter cm-content-box box-primary">
                            <div class="content-title SlideToolHeader">
                                <div class="cpa">
                                    <i
                                        class="fa-sharp fa-solid fa-filter me-2"></i>{{ __('language.admin.categoryPosts.filter') }}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="filter cm-content-box box-primary">

                                    <div class="cm-content-body form excerpt" style="">
                                        <form action="{{ route('admin.categoryPosts.index') }}" method="GET">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-3 col-sm-6">
                                                        <label
                                                            class="form-label">{{ __('language.admin.categoryPosts.filterName') }}</label>
                                                        <input id="" value="{{ request()->name }}" name="name"
                                                            type="text" class="form-control mb-xl-0 mb-3"
                                                            placeholder="{{ __('language.admin.categoryPosts.inputFilterName') }}">
                                                    </div>
                                                    <div class="col-xl-6 col-sm-6 align-self-end">
                                                        <div class="">
                                                            <button class="btn btn-primary me-2"
                                                                title="Click here to Search" type="submit"><i
                                                                    class="fa-sharp fa-solid fa-filter me-2"></i>{{ __('language.admin.categoryPosts.search') }}
                                                            </button>
                                                            <button type="reset" class="btn btn-danger light"
                                                                title="Click here to remove filter">{{ __('language.admin.categoryPosts.removeValue') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('language.admin.categoryPosts.list') }}</h4>
                                @can('create', App\Models\CategoryPost::class)
                                    <div class="compose-btn">
                                        <a href="{{ route('admin.categoryPosts.create') }}">
                                            <button class="btn btn-secondary btn-sm light">
                                                + {{ __('language.admin.categoryPosts.add') }}
                                            </button>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                            <div class="card-body">
                                @if ($data->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md" id="data-table">
                                            <input type="hidden" id="value-item-id" value="">

                                            <thead>
                                                <tr>
                                                    @can('deleteMultiple', App\Models\CategoryPost::class)
                                                        <th>
                                                            <div class="box-delete-item">
                                                                <input type="checkbox" id="item-all-checked">
                                                                    <button
                                                                        data-url="{{ route('admin.categoryPosts.deleteItemMultipleChecked') }}"
                                                                        id="btn-delete-all"
                                                                        class="btn btn-sm btn-danger btn-delete-multiple_item">
                                                                        <svg width="15" height="15"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                            <path fill="white"
                                                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                                                        </svg>
                                                                    </button>
                                                            </div>
                                                        </th>
                                                    @endcan
                                                    <th style="width:80px;">#</th>
                                                    <th>{{ __('language.admin.categoryPosts.folder') }}</th>
                                                    <th>{{ __('language.admin.categoryPosts.filterName') }}</th>
                                                    <th>{{ __('language.admin.categoryPosts.position') }}</th>
                                                    <th>{{ __('language.admin.categoryPosts.order') }}</th>
                                                    @if (Auth()->user()->can('update', \App\Models\CategoryPost::class) || Auth()->user()->can('delete', \App\Models\CategoryPost::class))
                                                        <th>{{ __('language.admin.categoryPosts.action') }}</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $categoryPost)
                                                    <tr>
                                                        @can('deleteMultiple', App\Models\CategoryPost::class)
                                                            <td>
                                                                <input type="checkbox" data-id="{{ $categoryPost->id }}"
                                                                class="item-checked">
                                                            </td>
                                                        @endcan
                                                        <td>
                                                            <strong
                                                                class="text-black">{{ ($data->currentPage() - 1) * $data->perPage() + $key + 1 }}</strong>
                                                        </td>
                                                        <td>
                                                            @if ($categoryPost->childs->count() > 0)
                                                                <i class="nav-icon fas fa-folder"></i>
                                                            @else
                                                                <i class="nav-icon fas fa-file"></i>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <b>
                                                                <a
                                                                    href="{{ route('admin.categoryPosts.index') . '?parent_id=' . $categoryPost->id }}">
                                                                    {{ $categoryPost->name }}
                                                                </a>
                                                            </b>
                                                        </td>
                                                        <td>
                                                            @can('changePosition', App\Models\CategoryPost::class)
                                                                <input type="number" min="0" name="position"
                                                                    value="{{ $categoryPost->position }}"
                                                                    data-id="{{ $categoryPost->id }}"
                                                                    data-value="{{ $categoryPost->position }}"
                                                                    data-url="{{ route('admin.categoryPosts.changePosition') }}"
                                                                    class="form-control changePosition" style="width: 80px;">
                                                            @else
                                                                <b>
                                                                    {{ $categoryPost->position }}
                                                                </b>
                                                            @endcan
                                                        </td>
                                                        <td>
                                                            @can('changeOrder', App\Models\CategoryPost::class)
                                                                <input type="number" min="0" name="order"
                                                                    value="{{ $categoryPost->order }}"
                                                                    data-id="{{ $categoryPost->id }}"
                                                                    data-url="{{ route('admin.categoryPosts.changeOrder') }}"
                                                                    class="form-control changeOrder" style="width: 67px;">
                                                            @else
                                                                <b>
                                                                    {{ $categoryPost->order }}
                                                                </b>
                                                            @endcan
                                                        </td>
                                                        @if (Auth()->user()->can('update', \App\Models\CategoryPost::class) || Auth()->user()->can('delete', \App\Models\CategoryPost::class))
                                                            <td>
                                                                <div
                                                                    style="padding-right: 20px; display: flex; justify-content: end">
                                                                    @can('update', App\Models\CategoryPost::class)
                                                                        <a href="{{ route('admin.categoryPosts.edit', $categoryPost->id) }}"
                                                                            class="btn btn-primary shadow btn-xs sharp me-1">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('delete', App\Models\CategoryPost::class)
                                                                        <form
                                                                            action="{{ route('admin.categoryPosts.delete', $categoryPost->id) }}"
                                                                            class="formDelete" method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button
                                                                                class="btn btn-danger shadow btn-xs sharp me-1 call-ajax btn-remove btnDelete"
                                                                                data-type="DELETE" href="">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    @endcan
                                                                </div>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                {{ $data->links('pagination::bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center align-items-center p-5">
                                        <div>
                                            <h3 class="text-center">
                                                {{ request()->name ? 'Không có kết quả với từ khóa:' . request()->name : 'Không có dữ liệu' }}
                                            </h3>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
