@extends('admin.layouts.main')

@section('title', __('language.admin.members.roles.titleAdd'))

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
                <form method="post" action="{{ route('admin.roles.store') }}" class="product-vali"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <label
                                                class="form-label mb-2">{{ __('language.admin.members.roles.name') }}</label>
                                            <input type="text" id="name" name="role[name]" class="form-control"
                                                placeholder="{{ __('language.admin.members.roles.inputName') }}"
                                                value="{{ old('role.name') }}">
                                            @error('role.name')
                                                <div class="mt-2">
                                                    <span class="text-red">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    @if (!auth()->user()->cinema_id)
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <label
                                                    class="form-label mb-2">{{ __('language.admin.members.roles.type') }}</label><br>
                                                <select name="role[type]" class="form-control w-50 selectRoles"
                                                    id="">
                                                    <option value="" selected>--
                                                        {{ __('language.admin.members.roles.select') }} --</option>
                                                    <option value="{{ \App\Models\User::TYPE_ADMIN }}"
                                                        {{ old('role.type') == \App\Models\User::TYPE_ADMIN ? 'selected' : '' }}>
                                                        {{ __('language.admin.members.roles.admin') }}</option>
                                                    <option value="{{ \App\Models\User::TYPE_MANAGE }}"
                                                        {{ old('role.type') == \App\Models\User::TYPE_MANAGE ? 'selected' : '' }}>
                                                        {{ __('language.admin.members.roles.manage') }}</option>
                                                    <option value="{{ \App\Models\User::TYPE_STAFF }}"
                                                        {{ old('role.type') == \App\Models\User::TYPE_STAFF ? 'selected' : '' }}>
                                                        {{ __('language.admin.members.roles.staff') }}</option>
                                                    <option value="{{ \App\Models\User::TYPE_MEMBER }}"
                                                        {{ old('role.type') == \App\Models\User::TYPE_MEMBER ? 'selected' : '' }}>
                                                        {{ __('language.admin.members.roles.member') }}</option>
                                                </select>
                                                @error('role.type')
                                                    <div class="mt-2">
                                                        <span class="text-red">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    @else
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <label
                                                    class="form-label mb-2">{{ __('language.admin.members.roles.type') }}</label>
                                                <input type="text" readonly
                                                    value="{{ __('language.admin.members.roles.staff') }}"
                                                    class="form-control">
                                                    <input type="hidden" name="role[type]" value="{{ \App\Models\User::TYPE_STAFF }}">
                                                @error('role.type')
                                                    <div class="mt-2">
                                                        <span class="text-red">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif

                                    <div class="mb-4">
                                        <label
                                            class="form-label mb-2">{{ __('language.admin.members.roles.inputDescription') }}</label>
                                        <textarea class="form-control" cols="20" rows="3" name="role[description]">{{ old('role.description') ?? '' }}</textarea>
                                        @error('role.description')
                                            <div class="mt-2">
                                                <span class="text-red">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="permissionBox">
                                <div class="card h-auto">
                                    <div class="card-body" style="padding: 20px 32px !important;">
                                        <h4 style="margin-top: 7px;">{{ __('language.admin.members.roles.selectOptions') }}
                                        </h4>
                                        <div class="mt-4 d-flex align-items-center">
                                            @if ($data['modules']->isNotEmpty())
                                                <div class="form-check custom-checkbox checkbox-info check-lg me-3">
                                                    <input type="checkbox" class="form-check-input checkAll"
                                                        id="selectAllModules">
                                                    <label class="form-check-label" for="customCheckBox4"></label>
                                                </div>
                                                <h4 style="padding-top: 10px;">
                                                    {{ __('language.admin.members.roles.selectAll') }}
                                                </h4>
                                            @else
                                                <h5 style="padding-top: 10px; color: red; font-weight: 400;">
                                                    {{ __('language.admin.members.roles.noPermission') }}</h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if ($data['modules']->isNotEmpty())
                                    <div class="row">
                                        @foreach ($data['modules'] as $module)
                                            <div class="col-6">
                                                <div class="filter cm-content-box box-primary">
                                                    <div class="card border-0 pb-0">
                                                        <div class="card-header border-0 pb-0"
                                                            style="justify-content: start;">
                                                            <div
                                                                class="form-check custom-checkbox checkbox-info check-lg me-3">
                                                                <!-- CheckBox của modules chọn tất cả -->
                                                                <input type="checkbox" value="{{ $module->id }}"
                                                                    class="form-check-input module-checkbox"
                                                                    data-module-id="{{ $module->id }}"
                                                                    id="module_{{ $module->id }}">
                                                                <label class="form-check-label"
                                                                    for="customCheckBox4"></label>
                                                            </div>
                                                            <h4 class="card-title">{{ $module->name ?? '' }}</h4>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div id="DZ_W_Todo4"
                                                                class="widget-media dlab-scroll height370 my-4 px-4">
                                                                <ul class="timeline">
                                                                    @if ($module->permissions->isNotEmpty())
                                                                        @foreach ($module->permissions()->orderBy('id')->get() as $permission)
                                                                            <li>
                                                                                <div class="timeline-panel">
                                                                                    <div
                                                                                        class="form-check custom-checkbox checkbox-info check-lg me-3">
                                                                                        <!-- CheckBox của permissions chọn tất cả -->
                                                                                        <input type="checkbox"
                                                                                            value="{{ $permission->id }}"
                                                                                            name="permissions[]"
                                                                                            class="form-check-input permission-checkbox"
                                                                                            data-module-id="{{ $module->id }}"
                                                                                            id="permission_{{ $permission->id }}">
                                                                                        <label class="form-check-label"
                                                                                            for="customCheckBox4"></label>
                                                                                    </div>
                                                                                    <div class="media-body">
                                                                                        <h5 class="mb-0">
                                                                                            {{ $permission->name ?? '' }}
                                                                                        </h5>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        @endforeach
                                                                    @else
                                                                        <div
                                                                            class="d-flex justify-content-center align-items-center p-4">
                                                                            <h4>{{ __('language.admin.members.roles.noDataModule') }}
                                                                            </h4>
                                                                        </div>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>



                        <div class="col-xl-4">
                            <div class="right-sidebar-sticky">
                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">
                                            {{ __('language.admin.members.roles.avatar') }}
                                        </div>
                                    </div>
                                    <div class="cm-content-body publish-content form excerpt">
                                        <div class="card-body">
                                            <div class="avatar-upload d-flex align-items-center">
                                                <div class=" position-relative" style="width: 120px;">
                                                    <div class="avatar-preview">
                                                        <div class="imagePreview"
                                                            style="background-image: url({{ asset('images/no-img-avatar.png') }});">
                                                        </div>
                                                    </div>
                                                    @error('role.image')
                                                        <div class="mt-2 mb-2">
                                                            <span class="text-red">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                    <div class="change-btn d-flex align-items-center flex-wrap">
                                                        <input type="file" class="form-control d-none uploadImage"
                                                            id="imageUpload" name="role[image]"
                                                            accept=".png, .jpg, .jpeg">
                                                        <label for="imageUpload"
                                                            class="btn btn-sm btn-primary light ms-0">{{ __('language.admin.members.roles.selectImage') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3 d-flex justify-content-start gap-2">
                                    <button type="submit"
                                        class="btn btn-success">{{ __('language.admin.members.roles.createNew') }}</button>
                                    <a href="{{ route('admin.roles.index') }}"
                                        class="btn btn-warning">{{ __('language.admin.members.roles.back') }}</a>
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
