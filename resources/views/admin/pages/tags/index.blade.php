@extends('admin.layouts.main')

@section('title', 'Danh sách thẻ tags')

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
                                    <i class="fa-sharp fa-solid fa-filter me-2"></i>
                                    {{ __('language.admin.tags.filter') }}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="filter cm-content-box box-primary">

                                    <div class="cm-content-body form excerpt" style="">
                                        <form action="{{ route('admin.tags.index') }}" method="GET">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-4 col-sm-6">
                                                        <label
                                                            class="form-label">{{ __('language.admin.tags.filterName') }}</label>
                                                        <input id="" value="{{ request()->name }}" name="name"
                                                            type="text" class="form-control mb-xl-0 mb-3"
                                                            placeholder="{{ __('language.admin.tags.inputFilterName') }}">
                                                    </div>
                                                    <div class="col-xl-4  col-sm-4 mb-3 mb-xl-0">
                                                        <label
                                                            class="form-label">{{ __('language.admin.categoryPosts.filterName') }}</label>
                                                        <select name="fill_action" class="form-control">
                                                            <option value="">
                                                                --{{ __('language.admin.tags.select') }}--</option>
                                                            <option @selected(request()->fill_action == 'active') value="active">
                                                                {{ __('language.admin.tags.filters.tagShow') }}</option>
                                                            <option @selected(request()->fill_action == 'noActive') value="noActive">
                                                                {{ __('language.admin.tags.filters.tagHidden') }}</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-xl-4 col-sm-6 align-self-end">
                                                        <div class="">
                                                            <button class="btn btn-primary me-2"
                                                                title="Click here to Search" type="submit"><i
                                                                    class="fa-sharp fa-solid fa-filter me-2"></i>
                                                                {{ __('language.admin.tags.search') }}
                                                            </button>
                                                            <button type="reset" class="btn btn-danger light"
                                                                title="Click here to remove filter">
                                                                {{ __('language.admin.tags.removeValue') }} </button>
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
                                <h4 class="card-title">{{ __('language.admin.tags.list') }}</h4>
                                <div class="compose-btn">
                                    @can('create', \App\Models\Tag::class)
                                        <a href="{{ route('admin.tags.create') }}">
                                            <button class="btn btn-secondary btn-sm light">
                                                + {{ __('language.admin.tags.create') }}
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
                                                    @can('deleteMultiple', \App\Models\Tag::class)
                                                        <th>
                                                            <div class="box-delete-item">
                                                                <input type="checkbox" id="item-all-checked">
                                                                <button
                                                                    data-url="{{ route('admin.tags.deleteItemMultipleChecked') }}"
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
                                                    <th style="text-align: start">
                                                        {{ __('language.admin.tags.filterName') }}</th>
                                                    <th>{{ __('language.admin.tags.active') }}</th>
                                                    <th style="text-align: start">{{ __('language.admin.tags.order') }}
                                                    </th>
                                                    @if (Auth()->user()->can('update', \App\Models\Tag::class) ||
                                                            Auth()->user()->can('delete', \App\Models\Tag::class))
                                                        <th>{{ __('language.admin.tags.action') }}</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $tag)
                                                    <tr>
                                                        @can('deleteMultiple', \App\Models\Tag::class)
                                                            <td>
                                                                <input type="checkbox" data-id="{{ $tag->id }}"
                                                                    class="item-checked">
                                                            </td>
                                                        @endcan
                                                        <td>
                                                            <strong
                                                                class="text-black">{{ ($data->currentPage() - 1) * $data->perPage() + $key + 1 }}
                                                            </strong>
                                                        </td>
                                                        <td style="text-align: start">
                                                            <b>
                                                                {{ $tag->name }}
                                                            </b>
                                                        </td>
                                                        <td>
                                                            @can('changeActive', \App\Models\Tag::class)
                                                                <button
                                                                    class="toggle-active-btn btn btn-xs {{ $tag->active == 1 ? 'btn-success' : 'btn-danger' }} text-white"
                                                                    data-id="{{ $tag->id }}"
                                                                    data-status="{{ $tag->active }}"
                                                                    data-url="{{ route('admin.tags.changeActive') }}">
                                                                    {{ $tag->active == 1 ? __('language.admin.tags.show') : __('language.admin.tags.hidden') }}
                                                                </button>
                                                            @else
                                                                <span
                                                                    class="badge light badge-{{ $tag->active == 1 ? 'success' : 'danger' }}">
                                                                    {{ $tag->active == 1 ? __('language.admin.tags.show') : __('language.admin.tags.hidden') }}
                                                                @endcan
                                                        </td>
                                                        <td>
                                                            @can('changeOrder', \App\Models\Tag::class)
                                                                <input type="number" min="0" name="order"
                                                                    value="{{ $tag->order }}" data-id="{{ $tag->id }}"
                                                                    data-url="{{ route('admin.tags.changeOrder') }}"
                                                                    class="form-control changeOrder" style="width: 67px;">
                                                            @else
                                                                <b>{{ $tag->order }}</b>
                                                            @endcan
                                                        </td>

                                                        @if (Auth()->user()->can('update', \App\Models\Tag::class) ||
                                                                Auth()->user()->can('delete', \App\Models\Tag::class))
                                                            <td>
                                                                <div
                                                                    style="padding-right: 20px; display: flex; justify-content: end">
                                                                    @can('update', \App\Models\Tag::class)
                                                                        <a href="{{ route('admin.tags.edit', $tag->id) }}"
                                                                            class="btn btn-primary shadow btn-xs sharp me-1">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('delete', \App\Models\Tag::class)
                                                                        <form
                                                                            action="{{ route('admin.tags.delete', $tag->id) }}"
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
