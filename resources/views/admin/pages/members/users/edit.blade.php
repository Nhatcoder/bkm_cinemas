@extends('admin.layouts.main')

@section('title', __('language.admin.members.users.titleEdit'))

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
                <form method="post" action="{{ route('admin.users.update', $data['user']->id) }}" class="product-vali"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <label
                                                class="form-label mb-2">{{ __('language.admin.members.users.name') }}</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                placeholder="{{ __('language.admin.members.users.inputName') }}"
                                                value="{{ old('name') ?? $data['user']->name }}">
                                            @error('name')
                                                <div class="mt-2">
                                                    <span class="text-red">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <label
                                                class="form-label mb-2">{{ __('language.admin.members.users.email') }}</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder="{{ __('language.admin.members.users.inputEmail') }}"
                                                value="{{ old('email') ?? $data['user']->email }}">
                                            @error('email')
                                                <div class="mt-2">
                                                    <span class="text-red">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <label
                                                class="form-label mb-2">{{ __('language.admin.members.users.firstName') }}</label>
                                            <input type="text" id="first_name" name="first_name" class="form-control"
                                                placeholder="{{ __('language.admin.members.users.inputFirstName') }}"
                                                value="{{ old('first_name') ?? $data['user']->first_name }}">
                                            @error('first_name')
                                                <div class="mt-2">
                                                    <span class="text-red">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <label
                                                class="form-label mb-2">{{ __('language.admin.members.users.lastName') }}</label>
                                            <input type="text" id="last_name" name="last_name" class="form-control"
                                                placeholder="{{ __('language.admin.members.users.inputLastName') }}"
                                                value="{{ old('last_name') ?? $data['user']->last_name }}">
                                            @error('last_name')
                                                <div class="mt-2">
                                                    <span class="text-red">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            class="form-label mb-2">{{ __('language.admin.members.users.newPassword') }}</label><br>
                                        <button type="button"
                                            class="btn btn-sm btn-facebook createNewPassword mt-3">{{ __('language.admin.members.users.createNewPassword') }}</button>
                                        <div class="input-group mt-2 mb-3 d-none" id="box-new-password">
                                            <input type="password" id="password" name="new_password"
                                                class="form-control newPassword"
                                                placeholder="{{ __('language.admin.members.users.inputNewPassword') }}"
                                                value="{{ old('newPassword') ?? '' }}">
                                            <button class="btn btn-outline btn-facebook changeTypePassword" type="button">
                                                <i class="fa-solid fa-eye-slash" id="toggleIcon"></i>
                                            </button>
                                            <button class="btn btn-outline btn-google-plus destroyBoxNewPassword"
                                                type="button">
                                                {{ __('language.admin.members.users.destroy') }}
                                            </button>
                                        </div>

                                        @error('newPassword')
                                            <div class="mt-2">
                                                <span class="text-red">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <label
                                                    class="form-label mb-2">{{ __('language.admin.members.users.role') }}</label><br>
                                                <select name="role_id" class="form-control role_id" id="">
                                                    <option data-type="member" value="">-- Chọn --</option>
                                                    @if ($data['roles']->isNotEmpty())
                                                        @foreach ($data['roles'] as $role)
                                                            <option @selected($role->id === $data['user']->role_id)
                                                                data-type="{{ $role->type ?? '' }}"
                                                                value="{{ $role->id }}">{{ $role->name ?? '' }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <input type="hidden" name="type" class="type"
                                                    value="{{ $data['user']->type ?? '' }}">

                                                @error('role_id')
                                                    <div class="mt-2">
                                                        <span class="text-red">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>

                                            @if (!auth()->user()->cinema_id)
                                                <div class="col-6">
                                                    <label class="form-label mb-2">Chọn rạp (nếu có)</label><br>
                                                    <select name="cinema_id" class="form-control cinema_id"
                                                        id="">
                                                        <option value="">-- Chọn rạp --</option>
                                                        @if ($data['cinemas']->isNotEmpty())
                                                            @foreach ($data['cinemas'] as $cinema)
                                                                <option @selected($cinema->id === $data['user']->cinema_id)
                                                                    value="{{ $cinema->id }}">{{ $cinema->name ?? '' }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <br>

                                                    @error('cinema_id')
                                                        <div class="mt-2">
                                                            <span class="text-red">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                            @else
                                                <div class="col-6">
                                                    <label class="form-label mb-2">Rạp</label>
                                                    <select name="cinema_id" class="form-control cinema_id"
                                                        id="">
                                                        <option name="cinema_id" selected
                                                            value="{{ $data['user']->cinema_id }}">
                                                            {{ $data['user']->cinema->name ?? '' }}
                                                        </option>
                                                    </select>
                                                    @error('cinema_id')
                                                        <div class="mt-2">
                                                            <span class="text-red">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="right-sidebar-sticky">
                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">
                                            {{ __('language.admin.members.users.avatar') }}
                                        </div>
                                    </div>
                                    <div class="cm-content-body publish-content form excerpt">
                                        <div class="card-body">
                                            <div class="avatar-upload d-flex align-items-center">
                                                <div class=" position-relative" style="width: 120px;">
                                                    <div class="avatar-preview">
                                                        <div class="imagePreview"
                                                            style="background-image: url({{ $data['user']->image ?? asset('images/no-img-avatar.png') }});">
                                                        </div>

                                                        @if (!empty($data['user']->image))
                                                            <button type="button" class="removeImage"
                                                                data-id="{{ $data['user']->id }}"
                                                                data-url="{{ route('admin.users.removeAvatarImage') }}"
                                                                data-image="{{ asset('images/no-img-avatar.png') }}">
                                                                <i class="fa-solid fa-xmark"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                    @error('image')
                                                        <div class="mt-2 mb-2">
                                                            <span class="text-red">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                    <div class="change-btn d-flex align-items-center flex-wrap">
                                                        <input type="file" class="form-control d-none uploadImage"
                                                            id="imageUpload" name="image" accept=".png, .jpg, .jpeg">
                                                        <label for="imageUpload"
                                                            class="btn btn-sm btn-primary light ms-0">{{ __('language.admin.members.users.selectImage') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 d-flex justify-content-start gap-2">
                                    <button type="submit"
                                        class="btn btn-success">{{ __('language.admin.members.roles.editSave') }}</button>
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
