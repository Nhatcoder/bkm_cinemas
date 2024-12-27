@extends('admin.layouts.main')

@section('title', __('language.admin.members.roles.titleList'))

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

            <div class="right-area folder-layout-tab">
                @can('create', App\Models\User::class)
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                        {{ __('language.admin.members.users.create') }}
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 3C7.05 3 3 7.05 3 12C3 16.95 7.05 21 12 21C16.95 21 21 16.95 21 12C21 7.05 16.95 3 12 3ZM12 19.125C8.1 19.125 4.875 15.9 4.875 12C4.875 8.1 8.1 4.875 12 4.875C15.9 4.875 19.125 8.1 19.125 12C19.125 15.9 15.9 19.125 12 19.125Z"
                                fill="#FCFCFC"></path>
                            <path
                                d="M16.3498 11.0251H12.9748V7.65009C12.9748 7.12509 12.5248 6.67509 11.9998 6.67509C11.4748 6.67509 11.0248 7.12509 11.0248 7.65009V11.0251H7.6498C7.1248 11.0251 6.6748 11.4751 6.6748 12.0001C6.6748 12.5251 7.1248 12.9751 7.6498 12.9751H11.0248V16.3501C11.0248 16.8751 11.4748 17.3251 11.9998 17.3251C12.5248 17.3251 12.9748 16.8751 12.9748 16.3501V12.9751H16.3498C16.8748 12.9751 17.3248 12.5251 17.3248 12.0001C17.3248 11.4751 16.8748 11.0251 16.3498 11.0251Z"
                                fill="#FCFCFC"></path>
                        </svg>
                    </a>
                @endcan
            </div>
        </div>
        <div class="col-12">
            <div class="filter cm-content-box box-primary">
                <div class="content-title SlideToolHeader">
                    <div class="cpa">
                        <i class="fa-sharp fa-solid fa-filter me-2"></i>Bộ lọc
                    </div>
                </div>
                <div class="cm-content-body form excerpt" style="">
                    <form action="{{ route('admin.users.index') }}" method="GET">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6">
                                    <label class="form-label">Tên người dùng</label>
                                    <input id="name" value="{{ request()->name }}" name="name" type="text"
                                        class="form-control mb-xl-0 mb-3" placeholder="Nhập tên người dùng">
                                </div>

                                @if (auth()->user()->type == \App\Models\User::TYPE_ADMIN)
                                    <div class="col-xl-3">
                                        <label
                                            class="form-label mb-2">{{ __('language.admin.members.roles.type') }}</label><br>
                                        <select name="type" class="form-control selectRoles" id="">
                                            <option value="">-- {{ __('language.admin.members.roles.select') }} --
                                            </option>
                                            <option value="{{ \App\Models\User::TYPE_ADMIN }}"
                                                {{ request()->type == \App\Models\User::TYPE_ADMIN ? 'selected' : '' }}>
                                                {{ __('language.admin.members.roles.admin') }}
                                            </option>
                                            <option value="{{ \App\Models\User::TYPE_MANAGE }}"
                                                {{ request()->type == \App\Models\User::TYPE_MANAGE ? 'selected' : '' }}>
                                                {{ __('language.admin.members.roles.manage') }}
                                            </option>
                                            <option value="{{ \App\Models\User::TYPE_STAFF }}"
                                                {{ request()->type == \App\Models\User::TYPE_STAFF ? 'selected' : '' }}>
                                                {{ __('language.admin.members.roles.staff') }}
                                            </option>
                                            <option value="{{ \App\Models\User::TYPE_MEMBER }}"
                                                {{ request()->type == \App\Models\User::TYPE_MEMBER ? 'selected' : '' }}>
                                                {{ __('language.admin.members.roles.member') }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-xl-3">
                                        <label class="form-label mb-2">Thành phố</label>
                                        <select data-url="{{ route('admin.dashboards.getAreaByCity') }}"
                                            class="select2-with-label-multiple" name="city_id" id="city_id">
                                            <option value="">-- Chọn thành phố --</option>
                                            @foreach ($cities as $key => $city)
                                                <option value="{{ $city->id }}">
                                                    {{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xl-3">
                                        <label class="form-label mb-2">Thành khu vực</label>
                                        <select data-url="{{ route('admin.dashboards.getCinemaByArea') }}"
                                            class="select2-with-label-multiple" name="area_id" id="area_id">
                                            <option value="">-- Chọn khu vực --</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 mt-3">
                                        <select class="select2-with-label-multiple" name="cinema_id" id="cinema_id">
                                            <option value="">-- Chọn rạp --</option>
                                            @foreach ($cinemas as $item)
                                                <option value="{{ $item->id }}" @selected(request()->cinema_id == $item->id)>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <div class="col-xl-3 col-sm-6 align-self-end">
                                    <div>
                                        <button class="btn btn-primary me-2" title="Click here to Search" type="submit"><i
                                                class="fa-sharp fa-solid fa-filter me-2"></i>Tìm
                                            kiếm
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

        <div class="row">
            @if (!empty($data['users']))
                <div class="col-xl-12">
                    <!-- Row -->
                    <div class="row">
                        <!--column-->
                        @foreach ($data['users'] as $user)
                            <div class="col-xl-4 col-md-6">
                                <div class="card contact_list">
                                    <div class="card-body">
                                        <div class="user-content">
                                            <div class="user-info">
                                                <div
                                                    class="{{ $user->status === 1 ? 'user-img' : 'user-img-block' }} position-relative">
                                                    <img src="{{ $user->image ?? asset('client/images/1.jpg') }}"
                                                        class="avatar avatar-lg me-3"
                                                        alt="{{ $user->first_name . ' ' . $user->last_name }}">
                                                </div>
                                                <div class="user-details">
                                                    <h5 class="mb-0">{{ $user->first_name . ' ' . $user->last_name }}
                                                    </h5>
                                                    <p class="mb-0 text-primary">{{ $user->phone ?? '' }}</p>
                                                    <p class="mb-0">{{ $user->email ?? '' }}</p>
                                                    <p class="mb-0">{{ $user->role->name ?? '' }}</p>
                                                    @if (!empty($user->cinema->name))
                                                        <b>Rạp: {{ $user->cinema->name ?? '' }}</b>
                                                    @else
                                                        <p>
                                                            @if ($user->type == 'admin')
                                                                Quản trị hệ thống
                                                            @endif
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            @if (auth()->user()->can('changeStatus', App\Models\User::class) ||
                                                    auth()->user()->can('update', App\Models\User::class) ||
                                                    auth()->user()->can('delete', App\Models\User::class))
                                                <div class="dropdown">
                                                    <a href="javascript:void(0)"
                                                        class="btn-link btn sharp tp-btn btn-primary pill"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <svg width="20" height="20" viewBox="0 0 20 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.33319 9.99985C8.33319 10.9203 9.07938 11.6665 9.99986 11.6665C10.9203 11.6665 11.6665 10.9203 11.6665 9.99986C11.6665 9.07938 10.9203 8.33319 9.99986 8.33319C9.07938 8.33319 8.33319 9.07938 8.33319 9.99985Z"
                                                                fill="#ffffff"></path>
                                                            <path
                                                                d="M8.33319 3.33329C8.33319 4.25376 9.07938 4.99995 9.99986 4.99995C10.9203 4.99995 11.6665 4.25376 11.6665 3.33329C11.6665 2.41282 10.9203 1.66663 9.99986 1.66663C9.07938 1.66663 8.33319 2.41282 8.33319 3.33329Z"
                                                                fill="#ffffff"></path>
                                                            <path
                                                                d="M8.33319 16.6667C8.33319 17.5871 9.07938 18.3333 9.99986 18.3333C10.9203 18.3333 11.6665 17.5871 11.6665 16.6667C11.6665 15.7462 10.9203 15 9.99986 15C9.07938 15 8.33319 15.7462 8.33319 16.6667Z"
                                                                fill="#ffffff"></path>
                                                        </svg>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                        @can('changeStatus', App\Models\User::class)
                                                            @if (Auth::user()->id !== $user->id)
                                                                <button type="button"
                                                                    data-url="{{ route('admin.users.changeStatus') }}"
                                                                    data-status="{{ $user->status }}"
                                                                    data-id="{{ $user->id }}"
                                                                    class="dropdown-item changeStatusUser">
                                                                    {{ $user->status == 1 ? __('language.admin.members.users.blockUser') : __('language.admin.members.users.unblockUser') }}
                                                                </button>
                                                            @endif
                                                        @endcan
                                                        @can('update', App\Models\User::class)
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.users.edit', $user->id) }}">{{ __('language.admin.members.users.editDrop') }}</a>
                                                        @endcan
                                                        @can('delete', App\Models\User::class)
                                                            @if (Auth::user()->id !== $user->id)
                                                                <form class="formDelete"
                                                                    action="{{ route('admin.users.delete', $user->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="hidden" name="page"
                                                                        value="{{ request()->page > 0 ? request()->page : 0 }}">
                                                                    <button type="submit" class="dropdown-item btnDelete">
                                                                        {{ __('language.admin.members.users.deleteDrop') }}
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        @endcan
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--/column-->
                    </div>
                    <!--/column-->
                </div>
            @else
                <div class="d-flex justify-content-center align-items-center">
                    <div class="p-5">
                        <h3 class="text-center">
                            {{ request()->name ? 'Không có kết quả với từ khóa:' . request()->name : 'Không có dữ liệu' }}
                        </h3>
                    </div>
                </div>
            @endif
        </div>
        <div class="table-pagenation px-4 d-flex justify-content-center card">
            <div style="padding-top: 20px;">
                @if (!empty($data['users']))
                    {{ $data['users']->links('pagination::bootstrap-4') }}
                @endif
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin/commons/users/index.js') }}"></script>
@endsection
