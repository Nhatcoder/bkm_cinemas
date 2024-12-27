@extends('admin.layouts.main')

@section('title', __('language.admin.members.permissions.titleList'))

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                @include('admin.components.breadcrumbs', [
                    'breadcrumbs' => $breadcrumbs
                ])
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="filter cm-content-box box-primary">
                    <div class="content-title SlideToolHeader">
                        <div class="cpa">
                            <i class="fa-sharp fa-solid fa-filter me-2"></i>Bộ lọc
                        </div>
                    </div>
                    <div class="cm-content-body form excerpt" style="">
                        <form action="{{ route('admin.permissions.index') }}" method="GET">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6">
                                        <label
                                            class="form-label">Tên chức năng</label>
                                        <input id="name" value="{{ request()->name }}" name="name" type="text"
                                            class="form-control mb-xl-0 mb-3"
                                            placeholder="Nhập tên chức năng">
                                    </div>
                                    <div class="col-xl-3 col-sm-6 align-self-end">
                                        <div>
                                            <button class="btn btn-primary me-2" title="Click here to Search"
                                                type="submit"><i class="fa-sharp fa-solid fa-filter me-2"></i>Tìm
                                                kiếm nâng cao
                                            </button>

                                            <button type="reset" class="btn btn-danger light"
                                                title="Click here to remove filter">Xóa trống</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('language.admin.members.permissions.list') }}</h4>
                        <div class="compose-btn">
                            @can('create', App\Models\Permission::class)
                                <a href="{{ route('admin.permissions.create') }}">
                                    <button class="btn btn-secondary btn-sm light">
                                        + {{ __('language.admin.members.permissions.create') }}
                                    </button>
                                </a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            @if($data['permissions']->isNotEmpty())
                                <table class="table table-sm mb-0">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div class="box-delete-item">
                                                <input type="checkbox" id="item-all-checked">
                                                 @can('deleteMultiple', App\Models\Permission::class)
                                                    <button data-url="{{ route('admin.permissions.deleteItemMultipleChecked') }}" id="btn-delete-all" class="btn btn-sm btn-danger btn-delete-multiple_item">
                                                        <svg
                                                            width="15" height="15"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                            <path fill="white"
                                                                  d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                                        </svg>
                                                    </button>
                                                 @endcan
                                            </div>
                                        </th>

                                        <th class="align-middle">#</th>
                                        <th class="align-middle">{{ __('language.admin.members.permissions.name') }}</th>
                                        <th class="align-middle">{{ __('language.admin.members.permissions.value') }}</th>
                                        @if(Auth()->user()->can('update', App\Models\Permission::class) || Auth()->user()->can('delete', App\Models\Permission::class))
                                            <th class="align-middle text-end">{{ __('language.admin.members.permissions.action') }}</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody id="orders">
                                        @foreach($data['permissions'] as $key => $permission)
                                            <tr class="btn-reveal-trigger">
                                                <td><input  type="checkbox" data-id="{{ $permission->id }}"
                                                    class="item-checked">
                                                </td>
                                                <td class="py-2">
                                                    <strong
                                                        class="text-black">{{ ($data['permissions']->currentPage() - 1) * $data['permissions']->perPage() + $key + 1 }}</strong>
                                                </td>
                                                <td class="py-2">{{ $permission->name ?? '' }}</td>
                                                <td class="py-2">{{ $permission->value ?? '' }}</td>
                                                @if(Auth()->user()->can('update', App\Models\Permission::class) || Auth()->user()->can('delete', App\Models\Permission::class))
                                                    <td class="py-2 text-end">
                                                        <div
                                                            style="padding-right: 20px; display: flex; justify-content: end">
                                                            @can('update', App\Models\Permission::class)
                                                                <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                                                   class="btn btn-primary shadow btn-xs sharp me-1">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                            @endcan
                                                            @can('delete', App\Models\Permission::class)
                                                                <form
                                                                    action="{{ route('admin.permissions.delete', $permission->id) }}"
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
                            @else
                                <div class="d-flex justify-content-center align-items-center p-5">
                                    <div>
                                        <h3 class="text-center">{{ request()->name ? 'Không có kết quả với từ khóa:' . request()->name : 'Không có dữ liệu' }}</h3>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="table-pagenation px-4">
                        @if(!empty($data['permissions']))
                            {{ $data['permissions']->links('pagination::bootstrap-4') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
