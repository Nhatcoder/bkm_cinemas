@extends('admin.layouts.main')

@section('title', 'Danh sách bài viết')

@section('css')

@endsection

@section('content')
    {{-- @dd($typeOrder) --}}
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
                                    <i class="fa-sharp fa-solid fa-filter me-2"></i>{{ __('language.admin.posts.filter') }}
                                </div>
                            </div>
                            <div class="cm-content-body form excerpt" style="">
                                <form action="{{ route('admin.posts.index') }}" method="GET">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-3 col-sm-6">
                                                <label
                                                    class="form-label">{{ __('language.admin.posts.filterName') }}</label>
                                                <input id="name" value="{{ $name }}" name="name"
                                                    type="text" class="form-control mb-xl-0 mb-3"
                                                    placeholder="{{ __('language.admin.posts.inputFilterName') }}">
                                            </div>
                                            <div class="col-xl-2  col-sm-4 mb-3 mb-xl-0">
                                                <label
                                                    class="form-label">{{ __('language.admin.posts.arranges.title') }}</label>
                                                <div id="order" class="dropdown bootstrap-select form-control">
                                                    <select name="order_with" class="form-control">
                                                        <option selected value="">
                                                            --{{ __('language.admin.posts.select') }}--
                                                        </option>
                                                        <option @selected($typeOrder == 'dateASC') value="dateASC">
                                                            {{ __('language.admin.posts.arranges.dateASC') }}
                                                        </option>
                                                        <option @selected($typeOrder == 'dateDESC') value="dateDESC">
                                                            {{ __('language.admin.posts.arranges.dateDESC') }}
                                                        </option>
                                                        <option @selected($typeOrder == 'viewASC') value="viewASC">
                                                            {{ __('language.admin.posts.arranges.viewASC') }}
                                                        </option>
                                                        <option @selected($typeOrder == 'viewDESC') value="viewDESC">
                                                            {{ __('language.admin.posts.arranges.viewDESC') }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-sm-4 mb-3 mb-xl-0">
                                                <label class="form-label">{{ __('language.admin.posts.category') }}</label>
                                                <div class="dropdown bootstrap-select form-control">
                                                    <select multiple name="categories[]" class="form-control">
                                                        <option disabled value="">
                                                            --{{ __('language.admin.posts.select') }}--
                                                        </option>
                                                        @if ($listCategoryPost)
                                                            @foreach ($listCategoryPost as $category)
                                                                <option @selected(in_array($category->id, $selectedCategories))
                                                                    value="{{ $category->id }}">
                                                                    {{ $category->name }} </option>

                                                                @if (count($category->childrenRecursive) > 0)
                                                                    @include(
                                                                        'admin.components.child-category',
                                                                        [
                                                                            'children' =>
                                                                                $category->childrenRecursive,
                                                                            'depth' => 1,
                                                                            'cateData' => $selectedCategories,
                                                                        ]
                                                                    )
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2  col-sm-4 mb-3 mb-xl-0">
                                                <label
                                                    class="form-label">{{ __('language.admin.posts.filters.title') }}</label>
                                                <select name="fill_action" class="form-control">
                                                    <option selected value="">
                                                        --{{ __('language.admin.posts.select') }}--
                                                    </option>
                                                    <option @selected($hot === 1) value="hot">
                                                        {{ __('language.admin.posts.filters.postHot') }}
                                                    </option>
                                                    <option @selected($hot === 0) value="noHot">
                                                        {{ __('language.admin.posts.filters.postNoHot') }}
                                                    </option>
                                                    <option @selected($active === 1) value="active">
                                                        {{ __('language.admin.posts.filters.postShow') }}
                                                    </option>
                                                    <option @selected($active === 0) value="noActive">
                                                        {{ __('language.admin.posts.filters.postHidden') }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-2 d-flex align-items-center">
                                            <button class="btn btn-primary me-2" title="Click here to Search"
                                                type="submit"><i
                                                    class="fa-sharp fa-solid fa-filter me-2"></i>{{ __('language.admin.posts.search') }}
                                            </button>
                                            <button type="reset" class="btn btn-danger light"
                                                    title="Click here to remove filter">{{ __('language.admin.posts.removeValue') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('language.admin.posts.list') }}</h4>
                                <div class="compose-btn">
                                    @can('create', App\Models\Post::class)
                                        <a href="{{ route('admin.posts.create') }}">
                                            <button class="btn btn-secondary btn-sm light">
                                                + {{ __('language.admin.posts.add') }}
                                            </button>
                                        </a>
                                    @endcan
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($data->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md" id="data-table">
                                            <input type="hidden" id="value-item-id" value="">
                                            <thead>
                                                <tr>
                                                    @can('deleteMultiple', \App\Models\Post::class)
                                                        <th>
                                                            <div class="box-delete-item">
                                                                <input type="checkbox" id="item-all-checked">
                                                                <button id="btn-delete-all"
                                                                    data-url="{{ route('admin.posts.deleteItemMultipleChecked') }}"
                                                                    class="btn btn-sm btn-danger btn-delete-multiple_item">
                                                                    <svg width="15" height="15"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 448 512">
                                                                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                        <path fill="white"
                                                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </th>
                                                    @endcan
                                                    <th>#</th>
                                                    <th class="white-space-nowrap">
                                                        {{ __('language.admin.posts.filterName') }}</th>
                                                    <th>{{ __('language.admin.posts.image') }}</th>
                                                    <th>{{ __('language.admin.posts.active') }}</th>
                                                    <th>{{ __('language.admin.posts.hot') }}</th>
                                                    <th style="text-align: start">
                                                        {{ __('language.admin.posts.category') }}
                                                    </th>
                                                    <th>{{ __('language.admin.posts.order') }}</th>
                                                    @if (Auth()->user()->can('update', \App\Models\Post::class) ||
                                                            Auth()->user()->can('delete', \App\Models\Post::class)||
                                                            Auth()->user()->can('sendPromotion', \App\Models\Post::class))
                                                        <th>{{ __('language.admin.posts.action') }}</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $post)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" data-id="{{ $post->id }}"
                                                                class="item-checked">
                                                        </td>
                                                        <td>
                                                            <strong
                                                                class="text-black">{{ ($data->currentPage() - 1) * $data->perPage() + $key + 1 }}</strong>
                                                        </td>
                                                        <td style="max-width: 155px !important;">
                                                            <b class="text-style" style="width: 140px !important;">
                                                                {{ $post->name }}
                                                            </b>
                                                        </td>
                                                        <td>
                                                            @if (!empty($post->avatar) && file_exists(public_path($post->avatar)))
                                                                <img src="{{ asset($post->avatar) }}"
                                                                    style="width:80px; height:100px; object-fit:cover">
                                                            @else
                                                                <img src="#" alt="No image"
                                                                    style="width:80px; height:100px; object-fit:cover">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @can('changeActive', \App\Models\Post::class)
                                                                <button
                                                                    class="toggle-active-btn btn btn-xs {{ $post->active == 1 ? 'btn-success' : 'btn-danger' }} text-white"
                                                                    data-id="{{ $post->id }}"
                                                                    data-status="{{ $post->active }}"
                                                                    data-url="{{ route('admin.posts.changeActive') }}">
                                                                    {{ $post->active == 1 ? __('language.admin.posts.show') : __('language.admin.posts.hidden') }}
                                                                </button>
                                                            @else
                                                                <span class="badge light badge-{{ $post->active == 1 ? 'success' : 'danger' }}">
                                                                    {{ $post->active == 1 ? 'Hiện' : 'Ẩn' }}
                                                                </span>
                                                            @endcan
                                                        </td>
                                                        <td>
                                                            @can('changeHot', \App\Models\Post::class)
                                                                <button
                                                                    class="toggle-hot-btn btn btn-xs {{ $post->hot == 1 ? 'btn-success' : 'btn-danger' }} text-white"
                                                                    data-id="{{ $post->id }}"
                                                                    data-status="{{ $post->hot }}"
                                                                    data-url="{{ route('admin.posts.changeHot') }}">
                                                                    {{ $post->hot == 1 ? __('language.admin.posts.hot') : __('language.admin.posts.noHot') }}
                                                                </button>
                                                            @else
                                                                <span class="badge light badge-{{ $post->active == 1 ? 'success' : 'danger' }}">
                                                                    {{ $post->hot == 1 ? __('language.admin.posts.hot') : __('language.admin.posts.noHot') }}
                                                                </span>
                                                            @endcan
                                                        </td>
                                                        <td style="text-align: start">
                                                            <ul>
                                                                @if ($post->postCategories->isNotEmpty())
                                                                    @foreach ($post->postCategories as $postCategory)
                                                                        <li>
                                                                            {{ $postCategory->category->name ?? __('language.admin.posts.noData') }}
                                                                        </li>
                                                                    @endforeach
                                                                @else
                                                                    <b>{{ __('language.admin.posts.noData') }}</b>
                                                                @endif
                                                            </ul>
                                                        </td>

                                                        <td>
                                                            @can('changeOrder', \App\Models\Post::class)
                                                                <input type="number" min="0" name="order"
                                                                    value="{{ $post->order }}"
                                                                    data-id="{{ $post->id }}"
                                                                    data-url="{{ route('admin.posts.changeOrder') }}"
                                                                    class="form-control changeOrder" style="width: 67px;">
                                                            @else
                                                                <b>{{ $post->order }}</b>
                                                            @endcan
                                                        </td>
                                                        @if (Auth()->user()->can('update', \App\Models\Post::class) ||
                                                            Auth()->user()->can('delete', \App\Models\Post::class) ||
                                                            Auth()->user()->can('sendPromotion', \App\Models\Post::class))
                                                            <td>
                                                                <div
                                                                    style="padding-right: 20px; display: flex; justify-content: end">
                                                                    @can('update', \App\Models\Post::class)
                                                                        <a href="{{ route('admin.posts.edit', $post->id) }}"
                                                                            class="btn btn-primary shadow btn-xs sharp me-1">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('delete', \App\Models\Post::class)
                                                                        <form
                                                                            action="{{ route('admin.posts.delete', $post->id) }}"
                                                                            class="formDelete" method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button
                                                                                class="btn btn-danger shadow btn-xs sharp me-1 call-ajax btn-remove btnDelete"
                                                                                data-type="DELETE">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    @endcan
                                                                    @can('sendPromotion', \App\Models\Post::class)
                                                                        @if ($post->active == 1 && $post->promotion == 1)
                                                                            <button data-id="{{ $post->id }}"
                                                                                data-url="{{ route('admin.posts.sendPromotion') }}"
                                                                                class="btn btn-success shadow btn-xs sharp me-1 call-ajax send-promotion"
                                                                                data-type="DELETE">
                                                                                <i class="fa-solid fa-paper-plane"></i>
                                                                            </button>
                                                                        @endif
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
