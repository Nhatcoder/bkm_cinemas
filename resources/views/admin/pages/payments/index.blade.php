@extends('admin.layouts.main')

@section('title', 'Danh sách phương thức thanh toán')

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
                                    <i class="fa-sharp fa-solid fa-filter me-2"></i>Bộ lọc
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="filter cm-content-box box-primary">
                                    <div class="cm-content-body form excerpt" style="">
                                        <form action="{{ route('admin.payments.index') }}" method="GET">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-3 col-sm-6">
                                                        <label class="form-label">Tên loại </label>
                                                        <input id="" value="{{ request()->payment_name }}"
                                                            name="payment_name" type="text"
                                                            class="form-control mb-xl-0 mb-3"
                                                            placeholder="Nhập tên phương thức thanh toán">
                                                    </div>
                                                    <div class="col-xl-2  col-sm-4 mb-3 mb-xl-0">
                                                        <label class="form-label">Lọc theo</label>
                                                        <select name="fill_action" class="form-control">
                                                            <option value="">
                                                                --chọn--
                                                            </option>
                                                            <option @selected(request()->fill_action == 'active') value="active">
                                                                Hiển thị
                                                            </option>
                                                            <option @selected(request()->fill_action == 'noActive') value="noActive">
                                                                Ẩn
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-5 col-sm-5 align-self-end">
                                                        <div class="">
                                                            <button class="btn btn-primary me-2"
                                                                title="Click here to Search" type="submit"><i
                                                                    class="fa-sharp fa-solid fa-filter me-2"></i>Tìm kiếm
                                                                nâng cao
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
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Danh sách phương thức thanh toán</h4>
                                <div class="compose-btn">
                                    @can('create', \App\Models\Payment::class)
                                        <a href="{{ route('admin.payments.create') }}">
                                            <button class="btn btn-secondary btn-sm light">
                                                + Thêm mới
                                            </button>
                                        </a>
                                    @endcan
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($payments->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md" id="data-table">
                                            <thead>
                                                <tr>
                                                    <th style="width:80px;">STT</th>
                                                    <th>Tên</th>
                                                    <th>Hình ảnh</th>
                                                    <th>Trạng thái</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($payments as $key => $payment)
                                                    <tr>
                                                        <td>
                                                            <strong
                                                                class="text-black">{{ ($payments->currentPage() - 1) * $payments->perPage() + $key + 1 }}</strong>
                                                        </td>
                                                        <td>
                                                            <b>
                                                                <a href="{{ route('admin.payments.index') }}">
                                                                    {{ $payment->name }}
                                                                </a>
                                                            </b>
                                                        </td>
                                                        <td>
                                                            @if (!empty($payment->image) && file_exists(public_path($payment->image)))
                                                                <img src="{{ asset($payment->image) }}"
                                                                    style="width:80px; height:100px; object-fit:cover">
                                                            @else
                                                                <img src="#" alt="No image"
                                                                    style="width:80px; height:100px; object-fit:cover">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @can('changeActive', \App\Models\Payment::class)
                                                                <button
                                                                    class="toggle-active-btn btn btn-xs {{ $payment->active == 1 ? 'btn-success' : 'btn-danger' }} text-white"
                                                                    data-id="{{ $payment->id }}"
                                                                    data-status="{{ $payment->active }}"
                                                                    data-url="{{ route('admin.payments.changeActive') }}">
                                                                    {{ $payment->active == 1 ? 'Hiển thị' : 'Ẩn' }}
                                                                </button>
                                                            @else
                                                                <span class="badge light badge-{{ $payment->active == 1 ? 'success' : 'danger' }}">
                                                                    {{ $payment->active == 1 ? 'Hiện' : 'Ẩn' }}
                                                                </span>
                                                            @endcan
                                                        </td>
                                                        <td>
                                                            <div
                                                                style="padding-right: 20px; display: flex; justify-content: end">
                                                                @can('update', \App\Models\Payment::class)
                                                                    <a href="{{ route('admin.payments.edit', $payment->id) }}"
                                                                        class="btn btn-primary shadow btn-xs sharp me-1">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('delete', \App\Models\Payment::class)
                                                                    <form
                                                                        action="{{ route('admin.payments.delete', $payment->id) }}"
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
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                {{ $payments->links('pagination::bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center align-items-center p-5">
                                        <div>
                                            <h3 class="text-center">
                                                Không tìm thấy: {{ request()->name }}
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
