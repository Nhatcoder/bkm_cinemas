@extends('admin.layouts.main')

@section('title', __('language.admin.members.modules.titleList'))

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                @include('admin.components.breadcrumbs', [
                    'breadcrumbs' => $breadcrumbs,
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
                        <form action="{{ route('admin.modules.index') }}" method="GET">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6">
                                        <label class="form-label">Tên module</label>
                                        <input id="name" value="{{ request()->name }}" name="name" type="text"
                                            class="form-control mb-xl-0 mb-3" placeholder="Nhập tên module">
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
                        <h4 class="card-title">{{ __('language.admin.members.modules.list') }}</h4>
                        <div class="compose-btn">
                            @can('create', App\Models\Module::class)
                                <a href="{{ route('admin.modules.create') }}">
                                    <button class="btn btn-secondary btn-sm light">
                                        + {{ __('language.admin.members.modules.create') }}
                                    </button>
                                </a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            @if ($data['modules']->isNotEmpty())
                                <table class="table table-sm mb-0">
                                    <input type="hidden" id="value-item-id" value="">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="box-delete-item">
                                                    <input type="checkbox" id="item-all-checked">
                                                    @can('deleteMultiple', App\Models\Module::class)
                                                        <button
                                                            data-url="{{ route('admin.modules.deleteItemMultipleChecked') }}"
                                                            id="btn-delete-all"
                                                            class="btn btn-sm btn-danger btn-delete-multiple_item">
                                                            <svg width="15" height="15"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                <path fill="white"
                                                                    d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                                            </svg>
                                                        </button>
                                                    @endcan
                                                </div>
                                            </th>
                                            <th class="align-middle">#</th>
                                            <th class="align-middle">{{ __('language.admin.members.modules.name') }}</th>
                                            <th class="align-middle">{{ __('language.admin.members.modules.description') }}
                                            </th>
                                            @can('viewPermission', App\Models\Module::class)
                                                <th class="align-middle">
                                                    {{ __('language.admin.members.modules.viewOperationTitle') }}</th>
                                            @endcan
                                            @if (Auth()->user()->can('update', App\Models\Module::class) ||
                                                    Auth()->user()->can('delete', App\Models\Module::class))
                                                <th class="align-middle text-end">
                                                    {{ __('language.admin.members.modules.action') }}</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody id="orders">
                                        @foreach ($data['modules'] as $key => $module)
                                            <tr class="btn-reveal-trigger">
                                                <td><input type="checkbox" data-id="{{ $module->id }}"
                                                        class="py-2 item-checked"></td>
                                                <td class="py-2">
                                                    <strong
                                                        class="text-black">
                                                        {{ ($data['modules']->currentPage() - 1) * $data['modules']->perPage() + $key + 1 }}
                                                    </strong>
                                                </td>
                                                <td class="py-2">{{ $module->name ?? '' }}</td>
                                                <td class="py-2">{{ $module->description ?? '' }}</td>
                                                @can('viewPermission', App\Models\Module::class)
                                                    <td class="py-2">
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#modalModules_{{ $module->id }}"
                                                            class="btn btn-linkedin">
                                                            {{ __('language.admin.members.modules.viewOperation') }}
                                                            <span class="btn-icon-end">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </span>
                                                        </button>
                                                    </td>
                                                @endcan
                                                @if (Auth()->user()->can('update', App\Models\Module::class) ||
                                                        Auth()->user()->can('delete', App\Models\Module::class))
                                                    <td class="py-2 text-end">
                                                        <div
                                                            style="padding-right: 20px; display: flex; justify-content: end">
                                                            @can('update', App\Models\Module::class)
                                                                <a href="{{ route('admin.modules.edit', $module->id) }}"
                                                                    class="btn btn-primary shadow btn-xs sharp me-1">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                            @endcan

                                                            @can('delete', App\Models\Module::class)
                                                                <form action="{{ route('admin.modules.delete', $module->id) }}"
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
                                                @endcan
                                        </tr>
                                        @can('viewPermission', App\Models\Module::class)
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalModules_{{ $module->id }}" aria-modal="true"
                                                role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                {{ __('language.admin.members.modules.titleModule') }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($module->permissions->isNotEmpty())
                                                                <h6 class="text-center">
                                                                    {{ __('language.admin.members.modules.viewOperationTitle') }}
                                                                    :
                                                                    {{ $module->name ?? '' }}</h6>
                                                                <div class="row mt-3">
                                                                    <div class="d-flex flex-wrap">
                                                                        @foreach ($module->permissions()->orderBy('id', 'asc')->get() as $permission)
                                                                            <button type="button"
                                                                                class="btn btn-rounded btn-outline-light m-2">
                                                                                {{ $permission->name ?? '' }}
                                                                            </button>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div
                                                                    class="d-flex justify-content-center align-items-center">
                                                                    <h5>{{ __('language.admin.members.modules.noDataModule') }}
                                                                    </h5>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger light"
                                                                data-bs-dismiss="modal">{{ __('language.admin.members.roles.close') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endcan
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
                    @if (!empty($data['modules']))
                        {{ $data['modules']->links('pagination::bootstrap-4') }}
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')
@endsection
