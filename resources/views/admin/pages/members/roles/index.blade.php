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
        </div>
        <div class="widget-heading d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">{{ __('language.admin.members.roles.list') }}</h3>
            @can('create', App\Models\Role::class)
                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm">
                    {{ __('language.admin.members.roles.add') }}
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

        <div class="row">
            @if (!empty($data['roles']))
                @foreach ($data['roles'] as $role)
                    <!-- Table -->
                    <div class="col-xl-3 col-xxl-4 col-sm-6">
                        <div class="card all-crs-wid">
                            <div class="card-body">
                                <div class="courses-bx">
                                    <div class="dlab-media overlay-main position-relative" style="height: 300px;">
                                        <img style="height: 100%; object-fit: cover"
                                            src="{{ $role->image ?? asset('images/no-img-avatar.png') }}"
                                            class="w-100 rounded" alt="">
                                        @can('view', App\Models\Role::class)
                                            <div class="overlay-bx">
                                                <div class="overlay-icon">
                                                    <a data-bs-toggle="modal" data-bs-target="#modalRoles_{{ $role->id }}">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endcan
                                    </div>
                                    <div class="dlab-info" style="margin-bottom: 0px;">
                                        <div class="dlab-title">
                                            <h5>
                                                <a
                                                    @can('view', App\Models\Role::class)
                                                        data-bs-toggle="modal" data-bs-target="#modalRoles_{{ $role->id }}"
                                                    @endcan>{{ $role->name ?? '' }}</a>
                                            </h5>
                                            <div class="">
                                                <p class="m-0">
                                                    {{ $role->description ?? '' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-start d-flex align-items-center">
                                        @can('update', App\Models\Role::class)
                                            <a href="{{ route('admin.roles.edit', $role->id) }}"
                                                class="btn btn-primary btn-sm light">{{ __('language.admin.members.roles.editRole') }}</a>
                                        @endcan
                                        @can('delete', App\Models\Role::class)
                                            <form class="formDelete" action="{{ route('admin.roles.delete', $role->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="margin-left: 10px"
                                                    class="btn btn-danger btn-sm light btnDelete">{{ __('language.admin.members.roles.deleteRole') }}</button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalRoles_{{ $role->id }}" aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ __('language.admin.members.roles.information') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <img src="{{ $role->image ?? asset('images/no-img-avatar.png') }}"
                                            style="width: 250px;" alt="">
                                    </div>
                                    <h6 class="text-center mt-4">{{ __('language.admin.members.roles.information') }}</h6>
                                    <div class="row mt-3">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td style="width: 200px;">{{ __('language.admin.members.roles.name') }}
                                                </td>
                                                <td class="text-start">{{ $role->name ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 200px;">
                                                    {{ __('language.admin.members.roles.description') }}</td>
                                                <td class="text-start">{{ $role->description ?? '' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="card">
                                            <div class="card-header border-0 pb-0 d-flex justify-content-center">
                                                <h4 class="card-title">
                                                    {{ __('language.admin.members.roles.jurisdiction') }}</h4>
                                            </div>
                                            <div class="card-body p-0">
                                                <div id="DZ_W_TimeLine"
                                                    class="widget-timeline dlab-scroll height370 my-4 px-4">
                                                    <ul class="timeline">
                                                        @if ($role->type !== App\Models\User::TYPE_ADMIN)
                                                            @if ($role->permissions->isNotEmpty())
                                                                @foreach ($role->permissions as $key => $permission)
                                                                    <li>
                                                                        @php
                                                                            $colors = [
                                                                                'primary',
                                                                                'success',
                                                                                'info',
                                                                                'warning',
                                                                                'danger',
                                                                            ];
                                                                            $color = $colors[$key % count($colors)]; // Lấy màu dựa trên key
                                                                        @endphp
                                                                        <div class="timeline-badge {{ $color }}">
                                                                        </div>
                                                                        <a class="timeline-panel text-muted">
                                                                            <h6 class="mb-0">
                                                                                {{ $permission->name ?? '' }}.</h6>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            @else
                                                                <li>
                                                                    <div class="timeline-badge success"></div>
                                                                    <a class="timeline-panel text-muted">
                                                                        <h6 class="mb-0">
                                                                            {{ __('language.admin.members.roles.noPermission') }}
                                                                        </h6>
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        @else
                                                            <li>
                                                                <div class="timeline-badge success"></div>
                                                                <a class="timeline-panel text-muted">
                                                                    <h6 class="mb-0">
                                                                        {{ __('language.admin.members.roles.fullPermission') }}
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light"
                                        data-bs-dismiss="modal">{{ __('language.admin.members.roles.close') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
        <div class="table-pagenation px-4">
            @if (!empty($data['roles']))
                {{ $data['roles']->links('pagination::bootstrap-4') }}
            @endif
        </div>
    </div>
@endsection

@section('js')
@endsection
