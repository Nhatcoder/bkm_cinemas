@extends('admin.layouts.main')

@section('title', __('language.admin.members.modules.titleEdit'))

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
                                    'breadcrumbs' => $breadcrumbs
                                ])
                            </nav>
                        </div>
                    </div>
                </div>
                <form method="post" action="{{ route('admin.modules.update', $data['module']->id) }}" class="product-vali" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <label class="form-label mb-2">{{ __('language.admin.members.modules.name') }}</label>
                                            <input type="text" id="name" name="module[name]" class="form-control"
                                                   placeholder="{{ __('language.admin.members.modules.inputName') }}" value="{{ old('module.name', $data['module']->name) }}">
                                            @error('module.name')
                                            <div class="mt-2">
                                                <span class="text-red">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div id="list-permission">
                                        @if (!empty(old('old_permissions')))
                                            @foreach (old('old_permissions') as $key => $oldPermission)
                                                @if (empty($oldPermission['name']) && empty($oldPermission['value']))
                                                    @continue
                                                @endif
                                                <div class="row mb-4 permission" data-index="{{ $key }}">
                                                    <input type="hidden" name="old_permissions[{{ $key }}][id]" value="{{ $oldPermission['id'] }}">
                                                    <div class="col-5">
                                                        <label class="form-label mb-2">Tên chức năng</label>
                                                        <input type="text" id="name" name="old_permissions[{{ $key }}][name]"
                                                            class="form-control" placeholder="Nhập tên chức năng (Thêm bài viết)"
                                                            value="{{ $oldPermission['name'] }}">
                                                    </div>
                                                    <div class="col-5">
                                                        <label class="form-label mb-2">Giá trị chức năng</label>
                                                        <input type="text" id="name" name="old_permissions[{{ $key }}][value]"
                                                            class="form-control" placeholder="Nhập giá trị chức năng (create-post)"
                                                            value="{{ $oldPermission['value'] }}">
                                                    </div>
                                                    <div class="col-2 d-flex flex-column justify-content-end">
                                                        <button class="btn btn-danger delete-permission" type="button">
                                                            Xóa
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @elseif (!empty($data['module']->permissions))
                                            @foreach ($data['module']->permissions as $key => $oldPermission)
                                                <div class="row mb-4 permission" data-index="{{ $key }}">
                                                    <input type="hidden" name="old_permissions[{{ $key }}][id]" value="{{ $oldPermission->id }}">
                                                    <div class="col-5">
                                                        <label class="form-label mb-2">Tên chức năng</label>
                                                        <input type="text" id="name" name="old_permissions[{{ $key }}][name]"
                                                            class="form-control" placeholder="Nhập tên chức năng (Thêm bài viết)"
                                                            value="{{ $oldPermission->name }}">
                                                    </div>
                                                    <div class="col-5">
                                                        <label class="form-label mb-2">Giá trị chức năng</label>
                                                        <input type="text" id="name" name="old_permissions[{{ $key }}][value]"
                                                            class="form-control" placeholder="Nhập giá trị chức năng (create-post)"
                                                            value="{{ $oldPermission->value }}">
                                                    </div>
                                                    <div class="col-2 d-flex flex-column justify-content-end">
                                                        <button class="btn btn-danger delete-permission" type="button">
                                                            Xóa
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if (!empty(old('permissions')))
                                            @foreach (old('permissions') as $key => $permission)
                                                @if (empty($permission['name']) && empty($permission['value']))
                                                    @continue
                                                @endif
                                                <div class="row mb-4 permission" data-index="{{ $key }}">
                                                    <div class="col-5">
                                                        <label class="form-label mb-2">Tên chức năng</label>
                                                        <input type="text" id="name" name="permissions[{{ $key }}][name]"
                                                            class="form-control" placeholder="Nhập tên chức năng (Thêm bài viết)"
                                                            value="{{ $permission['name'] }}">
                                                    </div>
                                                    <div class="col-5">
                                                        <label class="form-label mb-2">Giá trị chức năng</label>
                                                        <input type="text" id="name" name="permissions[{{ $key }}][value]"
                                                            class="form-control" placeholder="Nhập giá trị chức năng (create-post)"
                                                            value="{{ $permission['value'] }}">
                                                    </div>
                                                    <div class="col-2 d-flex flex-column justify-content-end">
                                                        <button class="btn btn-danger delete-permission" type="button">
                                                            Xóa
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <button type="button" class="btn btn-primary mb-4" id="add-permission">
                                        Thêm chức năng
                                    </button>
                                    
                                    <div class="mb-4">
                                        <label class="form-label mb-2">{{ __('language.admin.members.modules.description') }}</label>
                                        <textarea class="form-control" cols="20" rows="5" name="module[description]">{{ old('module.description', $data['module']->description) }}</textarea>
                                        @error('module.description')
                                        <div class="mt-2">
                                            <span class="text-red">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="right-sidebar-sticky">
                                <div class="mt-3 d-flex justify-content-start gap-2">
                                    <button type="submit" class="btn btn-success">{{ __('language.admin.members.modules.editSave') }}</button>
                                    <a href="{{ route('admin.modules.index') }}" class="btn btn-warning">{{ __('language.admin.members.modules.back') }}</a>
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
    <script src=" {{ asset('/js/admin/ajaxs/module.js') }} "></script>
@endsection
