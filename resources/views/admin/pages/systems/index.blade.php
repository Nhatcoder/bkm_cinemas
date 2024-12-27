@extends('admin.layouts.main')

@section('title', $title['index'] ?? 'Danh sách nội dung')

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
                                    'title' => $title['index'] ?? '',
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
                                    {{ __('language.admin.systems.filter') }}
                                </div>
                            </div>
                            <div class="cm-content-body form excerpt" style="">
                                <form action="{{ route('admin.systems.index') }}" method="GET">
                                    @if (request()->system_id > 0)
                                        <input type="hidden" name="system_id" value="{{ request()->system_id }}">
                                    @endif
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-3 col-sm-6">
                                                <label
                                                    class="form-label">{{ __('language.admin.systems.filterName') }}</label>
                                                <input type="text" name="name" value="{{ request()->name ?? '' }}"
                                                    class="form-control mb-xl-0 mb-3" id="exampleFormControlInput1"
                                                    placeholder="{{ __('language.admin.systems.inputName') }}">
                                            </div>
                                            <div class="col-xl-2  col-sm-4 mb-3 mb-xl-0">
                                                <label class="form-label">{{ __('language.admin.systems.active') }}</label>
                                                <select name="active" class="form-control">
                                                    <option value=""
                                                        {{ request()->active === null ? 'selected' : '' }}>
                                                        -- {{ __('language.admin.systems.select') }} --
                                                    </option>
                                                    <option value="1" {{ request()->active == '1' ? 'selected' : '' }}>
                                                        {{ __('language.admin.systems.show') }}</option>
                                                    <option value="0"
                                                        {{ request()->active == '0' ? 'selected' : '' }}>
                                                        {{ __('language.admin.systems.hidden') }}</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-6 col-sm-6 align-self-end">
                                                <div>
                                                    <button class="btn btn-primary me-2"
                                                        title="{{ __('language.admin.systems.search') }}" type="submit">
                                                        <i class="fa-sharp fa-solid fa-filter me-2"></i>
                                                        {{ __('language.admin.systems.search') }}
                                                    </button>
                                                    <button class="btn btn-danger light"
                                                        title="{{ __('language.admin.systems.removeValue') }}"
                                                        type="reset">
                                                        {{ __('language.admin.systems.removeValue') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ $title['index'] ?? __('language.admin.systems.list') }}</h4>
                                <div class="compose-btn">
                                    @can('create', App\Models\System::class)
                                        <a
                                            href="{{ route('admin.systems.create', request()->system_id > 0 ? 'system_id=' . request()->system_id : '') }}">
                                            <button class="btn btn-secondary btn-sm light">
                                                + {{ __('language.admin.systems.add') }}
                                            </button>
                                        </a>
                                    @endcan
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if (isset($_GET['system_id']))
                                        @if (!$systemBySystemId->isEmpty())
                                            <table class="table table-responsive-md" id="data-table">
                                                <input type="hidden" id="value-item-id" value="">
                                                <thead>
                                                    <tr>
                                                        @can('deleteMultiple', \App\Models\System::class)
                                                            <th>
                                                                <div class="box-delete-item">
                                                                    <input type="checkbox" id="item-all-checked">
                                                                    <button
                                                                        data-url="{{ route('admin.systems.deleteItemMultipleChecked') }}"
                                                                        id="btn-delete-all"
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
                                                        <th style="width:80px;">#</th>
                                                        <th>{{ __('language.admin.systems.folder') }}</th>
                                                        <th>{{ __('language.admin.systems.nameSystem') }}</th>
                                                        <th>{{ __('language.admin.systems.value') }}</th>
                                                        @can('changeOrder', \App\Models\System::class)
                                                            <th>{{ __('language.admin.systems.order') }}</th>
                                                        @endcan
                                                        @can('changeActive', \App\Models\System::class)
                                                            <th>{{ __('language.admin.systems.active') }}</th>
                                                        @endcan
                                                        @if (auth()->user()->can('update', \App\Models\System::class) ||
                                                                auth()->user()->can('delete', \App\Models\System::class))
                                                            <th>{{ __('language.admin.systems.action') }}</th>
                                                        @endif
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($systemBySystemId as $key => $system)
                                                        <tr>
                                                            @can('deleteMultiple', \App\Models\System::class)
                                                                <td>
                                                                    <input type="checkbox" data-id="{{ $system->id }}"
                                                                        class="item-checked">
                                                                </td>
                                                            @endcan
                                                            <td>
                                                                <strong
                                                                    class="text-black">{{ ($systemBySystemId->currentPage() - 1) * $systemBySystemId->perPage() + $key + 1 }}
                                                                </strong>
                                                            </td>
                                                            <td>
                                                                @if ($system->childs->count() > 0)
                                                                    <i class="nav-icon fas fa-folder"></i>
                                                                @else
                                                                    <i class="nav-icon fas fa-file"></i>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a
                                                                    href="{{ route('admin.systems.index') . '?system_id=' . $system->id }}">
                                                                    <b>{{ $system->name }}</b>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                {{ $system->description }}
                                                            </td>
                                                            <td>
                                                                @can('changeOrder', App\Models\System::class)
                                                                    <input type="number" min="0" name="order"
                                                                        value="{{ $system->order }}"
                                                                        data-id="{{ $system->id }}"
                                                                        data-url="{{ route('admin.systems.changeOrder') }}"
                                                                        class="form-control changeOrder" style="width: 67px;">
                                                                @else
                                                                    <b>{{ $system->order }}</b>
                                                                @endcan
                                                            </td>
                                                            <td>
                                                                @can('changeActive', App\Models\System::class)
                                                                    <button
                                                                        class="toggle-active-btn btn btn-xs {{ $system->active == 1 ? 'btn-success' : 'btn-danger' }} text-white"
                                                                        data-id="{{ $system->id }}"
                                                                        data-status="{{ $system->active }}"
                                                                        data-url="{{ route('admin.systems.changeActive') }}">
                                                                        {{ $system->active == 1 ? __('language.admin.systems.show') : __('language.admin.systems.hidden') }}
                                                                    </button>
                                                                @else
                                                                    <span
                                                                        class="badge light badge-{{ $system->active == 1 ? 'success' : 'danger' }}">
                                                                        {{ $system->active == 1 ? __('language.admin.systems.show') : __('language.admin.systems.hidden') }}
                                                                    </span>
                                                                @endcan
                                                            </td>

                                                            @if (auth()->user()->can('update', \App\Models\System::class) ||
                                                                    auth()->user()->can('delete', \App\Models\System::class))
                                                                <td>
                                                                    <div
                                                                        style="padding-right: 20px; display: flex; justify-content: end">
                                                                        @can('update', App\Models\System::class)
                                                                            <a href="{{ route('admin.systems.edit', $system->id) }}{{ request()->system_id > 0 ? '?system_id=' . request()->system_id : '' }}"
                                                                                class="btn btn-primary shadow btn-xs sharp me-1">
                                                                                <i class="fa fa-pencil"></i>
                                                                            </a>
                                                                        @endcan
                                                                        @can('delete', App\Models\System::class)
                                                                            <form
                                                                                action="{{ route('admin.systems.delete', $system->id) }}{{ request()->system_id > 0 ? '?system_id=' . request()->system_id : '' }}"
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
                                                    <h3 class="text-center">{{ __('language.admin.systems.noData') }}</h3>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        @if (!$systemByType0->isEmpty())
                                            <table class="table table-responsive-md" id="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <div class="box-delete-item">
                                                                <input type="checkbox" id="item-all-checked">
                                                                @can('deleteMultiple', \App\Models\System::class)
                                                                    <button
                                                                        data-url="{{ route('admin.systems.deleteItemMultipleChecked') }}"
                                                                        id="btn-delete-all"
                                                                        class="btn btn-sm btn-danger btn-delete-multiple_item">
                                                                        <svg width="15" height="15"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 448 512">
                                                                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                            <path fill="white"
                                                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                                                        </svg>
                                                                    </button>
                                                                @endcan
                                                            </div>
                                                        </th>
                                                        <th style="width:80px;">#</th>
                                                        <th>{{ __('language.admin.systems.folder') }}</th>
                                                        <th>{{ __('language.admin.systems.nameSystem') }}</th>
                                                        <th>{{ __('language.admin.systems.value') }}</th>
                                                        @can('changeOrder', App\Models\System::class)
                                                            <th>{{ __('language.admin.systems.order') }}</th>
                                                        @endcan
                                                        @can('changeActive', App\Models\System::class)
                                                            <th>{{ __('language.admin.systems.active') }}</th>
                                                        @endcan
                                                        @if (Auth()->user()->can('update', App\Models\System::class) ||
                                                                Auth()->user()->can('delete', App\Models\System::class))
                                                            <th>{{ __('language.admin.systems.action') }}</th>
                                                        @endif
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($systemByType0 as $key => $system)
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" data-id="{{ $system->id }}"
                                                                    class="item-checked">
                                                            </td>
                                                            <td>
                                                                <strong class="text-black">{{ $key + 1 }}</strong>
                                                            </td>
                                                            <td>
                                                                @if ($system->childs->count() > 0)
                                                                    <i class="nav-icon fas fa-folder"></i>
                                                                @else
                                                                    <i class="nav-icon fas fa-file"></i>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a
                                                                    href="{{ route('admin.systems.index') . '?system_id=' . $system->id }}">
                                                                    <b>{{ $system->name }}</b>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                {{ $system->description }}
                                                            </td>
                                                            @can('changeOrder', App\Models\System::class)
                                                                <td>
                                                                    <input type="number" min="0" name="order"
                                                                        value="{{ $system->order }}"
                                                                        data-id="{{ $system->id }}"
                                                                        data-url="{{ route('admin.systems.changeOrder') }}"
                                                                        class="form-control changeOrder" style="width: 67px;">
                                                                </td>
                                                            @endcan
                                                            @can('changeActive', App\Models\System::class)
                                                                <td>
                                                                    <button
                                                                        class="toggle-active-btn btn btn-xs {{ $system->active == 1 ? 'btn-success' : 'btn-danger' }} text-white"
                                                                        data-id="{{ $system->id }}"
                                                                        data-status="{{ $system->active }}"
                                                                        data-url="{{ route('admin.systems.changeActive') }}">
                                                                        {{ $system->active == 1 ? __('language.admin.systems.show') : __('language.admin.systems.hidden') }}
                                                                    </button>
                                                                </td>
                                                            @endcan
                                                            @if (Auth()->user()->can('update', App\Models\System::class) ||
                                                                    Auth()->user()->can('delete', App\Models\System::class))
                                                                <td>
                                                                    <div
                                                                        style="padding-right: 20px; display: flex; justify-content: end">
                                                                        @can('update', App\Models\System::class)
                                                                            <a href="{{ route('admin.systems.edit', $system->id) }}"
                                                                                class="btn btn-primary shadow btn-xs sharp me-1">
                                                                                <i class="fa fa-pencil"></i>
                                                                            </a>
                                                                        @endcan
                                                                        @can('delete', App\Models\System::class)
                                                                            <form
                                                                                action="{{ route('admin.systems.delete', $system->id) }}"
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
                                                    <h3 class="text-center">
                                                        {{ request()->name ? 'Không có kết quả với từ khóa:' . request()->name : 'Không có dữ liệu' }}
                                                    </h3>
                                                </div>
                                            </div>
                                        @endif
                                    @endif

                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="text-center">
                                            @if (!empty($_GET['system_id']))
                                                {{ $systemBySystemId->links('pagination::bootstrap-4') }}
                                            @else
                                                {{ $systemByType0->links('pagination::bootstrap-4') }}
                                            @endif
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
@endsection

@section('js')

@endsection
