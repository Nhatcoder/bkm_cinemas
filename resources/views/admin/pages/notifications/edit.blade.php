@extends('admin.layouts.main')

@section('title', 'Thêm thông báo')

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
                <form method="post" action="{{ route('admin.notifications.update',$data->id) }}" class="product-vali"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="actor-row row mt-2">
                                            <div class="col-6">
                                                <label class="form-label mb-2">Tiêu đề:</label>
                                                <input type="text" value="{{ old('notification.title',$data->title) }}"
                                                    name="notification[title]" class="form-control"
                                                    placeholder="Nhập tiêu đề">
                                                @error('notification.title')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="actor-row row mt-2">
                                            <div class="col-6">
                                                <label class="form-label mb-2">Nội dung:</label>
                                                <textarea placeholder="Nhập nội dung..." class="form-control" name="notification[content]" cols="30" rows="10">{!!old('notification.content',$data->content) !!}</textarea>
                                                @error('notification.content')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">
                        Cập nhật
                    </button>
                    <a href="{{ route('admin.notifications.index') }}" class="btn btn-warning">
                        Trở về trang danh sách
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection
