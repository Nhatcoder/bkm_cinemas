@extends('admin.layouts.main')

@section('title', 'Danh sách vouchers')

@section('css')
    <style>
        .table tbody tr td {
            vertical-align: top !important;
        }

        .voucher-item {
            width: 90px;
            height: 30px;
            display: flex;
        }

        .voucher-image {
            width: 100%;
            border-radius: 7px;
        }
    </style>

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
                                        <form action="{{ route('admin.vouchers.index') }}" method="GET">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-4 col-sm-6">
                                                        <label class="form-label">Tên voucher hoặc mã code:</label>
                                                        <input value="{{ request()->name }}" name="name" type="text"
                                                            class="form-control mb-xl-0 mb-3"
                                                            placeholder="Nhập voucher hoặc mã code">
                                                    </div>
                                                    <div class="col-xl-4  col-sm-4 mb-3 mb-xl-0">
                                                        <label class="form-label">Sắp xếp</label>
                                                        <div id="order" class="dropdown bootstrap-select form-control">
                                                            <select name="order_with" class="form-control">
                                                                <option value="">
                                                                    --chọn--
                                                                </option>
                                                                <option @selected(request()->order_with == 'dateASC') value="dateASC">
                                                                    Ngày tạo tăng dần
                                                                </option>
                                                                <option @selected(request()->order_with == 'dateDESC') value="dateDESC">
                                                                    Ngày tạo giảm dần
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-sm-5 align-self-end">
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
                                <h4 class="card-title">Danh sách voucher</h4>
                                @can('create', App\Models\Voucher::class)
                                    <div class="compose-btn">
                                        <a href="{{ route('admin.vouchers.create') }}">
                                            <button class="btn btn-secondary btn-sm light">
                                                + Thêm mới
                                            </button>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                            <div class="card-body">
                                @if ($data->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md" id="data-table">
                                            <thead>
                                                <tr>
                                                    @can('deleteMultiple', App\Models\Voucher::class)
                                                        <th>
                                                            <div class="box-delete-item">
                                                                <input type="checkbox" id="item-all-checked">
                                                                <button id="btn-delete-all"
                                                                    data-url="{{ route('admin.vouchers.deleteItemMultipleChecked') }}"
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
                                                    <th>Thông tin cơ bản</th>
                                                    <th>Áp dụng</th>
                                                    <th>Hình ảnh</th>
                                                    <th>Hiệu lực</th>
                                                    <th>Trạng thái</th>
                                                    <th>Ngày đăng</th>
                                                    @if (auth()->user()->can('update', \App\Models\Voucher::class) ||
                                                            auth()->user()->can('delete', \App\Models\Voucher::class) ||
                                                            auth()->user()->can('giftVoucher', \App\Models\Voucher::class))
                                                        <th>Hành động</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $voucher)
                                                    <tr data-id-tr="{{ $voucher->id }}"
                                                        data-end-date="{{ $voucher->end_date }}">
                                                        @can('deleteMultiple', App\Models\Voucher::class)
                                                            <td>
                                                                <input type="checkbox" data-id="{{ $voucher->id }}"
                                                                    class="item-checked">
                                                            </td>
                                                        @endcan
                                                        <td>
                                                            <strong
                                                                class="text-black">{{ ($data->currentPage() - 1) * $data->perPage() + $key + 1 }}</strong>
                                                        </td>
                                                        <td>
                                                            <b>
                                                                <a href="{{ route('admin.vouchers.index') }}">
                                                                    <p><b>Tên:</b> {{ $voucher->name }}</p>
                                                                    <p><b>Số lượng:</b> {{ $voucher->quantity }}</p>
                                                                    <p><b>Mã code:</b> {{ $voucher->code }}</p>
                                                                    <p><b> Giá trị giảm:</b>
                                                                        @if ($voucher->discount_type == 'percent')
                                                                            {{ $voucher->discount_value }}%
                                                                        @else
                                                                            {{ number_format($voucher->discount_value, 0, ',', '.') }}
                                                                            VND
                                                                        @endif

                                                                    </p>
                                                                    <p>
                                                                        @if (!empty($voucher->condition_type))
                                                                            @if ($voucher->condition_type == 'new_member')
                                                                                <b>Áp dụng: </b> cho người mới
                                                                            @elseif($voucher->condition_type == 'level_up')
                                                                                <b>Áp dụng:</b> cho hạng tài khoản
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                    <p>
                                                                        @if (!empty($voucher->level_type))
                                                                            @if ($voucher->level_type == 'vip')
                                                                                <b>Thành viên:</b> vip
                                                                            @elseif($voucher->level_type == 'vvip')
                                                                                <b>Thành viên:</b> Vvip
                                                                            @endif
                                                                        @endif
                                                                    </p>


                                                                </a>
                                                            </b>
                                                        </td>
                                                        <td>
                                                            @if ($voucher->discount_condition == 'all')
                                                                Áp dụng tất cả
                                                            @elseif($voucher->discount_condition == 'condition')
                                                                Áp dụng 1 số tài khoản
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (!empty($voucher->image) && file_exists(public_path($voucher->image)))
                                                                <img src="{{ asset($voucher->image) }}"
                                                                    style="width:80px; height:100px; object-fit:cover">
                                                            @else
                                                                <img src="#" alt="No image"
                                                                    style="width:80px; height:100px; object-fit:cover">
                                                            @endif
                                                        </td>

                                                        @if ($voucher->discount_condition == 'condition')
                                                            <td>
                                                                <p>                                                      
                                                                    Không có
                                                                </p>
                                                            </td>
                                                        @else
                                                            @php
                                                                $startDate = \Carbon\Carbon::parse(
                                                                    $voucher->start_date,
                                                                );
                                                                $endDate = \Carbon\Carbon::parse($voucher->end_date);
                                                                $now = \Carbon\Carbon::now();
                                                                $timeLeft = $endDate->diffForHumans($now, true);
                                                            @endphp
                                                            <td
                                                                @if ($startDate->isSameDay($now)) class="time-left text-success" id="time-left-{{ $voucher->id }}" @endif>


                                                                @if ($startDate->isSameDay($now))
                                                                    Còn {{ $timeLeft }}
                                                                @elseif ($startDate->gt($now))
                                                                    <p class="text-warning">Chờ phát hành</p>
                                                                @else
                                                                    <p class="text-warning">Chờ phát hành</p>
                                                                @endif
                                                            </td>
                                                        @endif
                                                        <td>
                                                            @can('changeActive', App\Models\Voucher::class)
                                                                <button
                                                                    class="toggle-active-btn btn btn-xs {{ $voucher->active == 1 ? 'btn-success' : 'btn-danger' }} text-white"
                                                                    data-id="{{ $voucher->id }}"
                                                                    data-status="{{ $voucher->active }}"
                                                                    data-url="{{ route('admin.vouchers.changeActive') }}">
                                                                    {{ $voucher->active == 1 ? 'Hiển thị' : 'Ẩn' }}
                                                                </button>
                                                            @else
                                                                <span
                                                                    class="badge light badge-{{ $voucher->active == 1 ? 'success' : 'danger' }}">{{ $voucher->active == 1 ? 'Hiển thị' : 'Ẩn' }}</span>
                                                            @endcan
                                                        </td>

                                                        <td>
                                                            {{ \Carbon\Carbon::parse($voucher->created_at)->format('d-m-Y') }}
                                                        </td>
                                                        @if (auth()->user()->can('update', \App\Models\Voucher::class) ||
                                                                auth()->user()->can('delete', \App\Models\Voucher::class) ||
                                                                auth()->user()->can('giftVoucher', \App\Models\Voucher::class))
                                                            <td>
                                                                <div
                                                                    style="padding-right: 20px; display: flex; justify-content: end">
                                                                    @can('update', App\Models\Voucher::class)
                                                                        <a href="{{ route('admin.vouchers.edit', $voucher->id) }}"
                                                                            class="btn btn-primary shadow btn-xs sharp me-1">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('delete', App\Models\Voucher::class)
                                                                        <form
                                                                            action="{{ route('admin.vouchers.delete', $voucher->id) }}"
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
                                                                    @if ($voucher->discount_condition != 'condition')
                                                                        @can('giftVoucher', App\Models\Voucher::class)
                                                                            <button type="button" id="show_modal"
                                                                                class="btn btn-success mb-2 shadow btn-xs sharp me-1 giftButton"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#basicModal_{{ $voucher->id }}"
                                                                                data-voucher-id="{{ $voucher->id }}"
                                                                                data-url="{{ route('admin.vouchers.getAccountByVoucher') }}">
                                                                                <i class="fa-solid fa-gift"></i>
                                                                            </button>
                                                                            <div class="modal fade modal_voucher"
                                                                                id="basicModal_{{ $voucher->id }}"
                                                                                aria-modal="true" role="dialog">

                                                                                <div class="modal-dialog modal-lg"
                                                                                    role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title">Tặng
                                                                                                voucher
                                                                                            </h5>
                                                                                            <button type="button"
                                                                                                class="btn-close close-modal"
                                                                                                data-bs-dismiss="modal">
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body text-start">
                                                                                            <div
                                                                                                class="d-flex justify-content-between align-items-center mb-4">
                                                                                                <div class="form-check">
                                                                                                    <input
                                                                                                        class="form-check-input"
                                                                                                        type="checkbox"
                                                                                                        value="all"
                                                                                                        id="checked_all_account">
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="flexCheckDefault">
                                                                                                        Chọn tất cả
                                                                                                    </label>
                                                                                                </div>

                                                                                                <input style="width:330px;"
                                                                                                    id="searchUserInput_{{ $voucher->id }}"
                                                                                                    data-url="{{ route('admin.vouchers.searchUser') }}"
                                                                                                    placeholder="Tên người dùng hoặc email ..."
                                                                                                    type="text"
                                                                                                    class="form-control">
                                                                                            </div>


                                                                                            <div class="d-flex flex-wrap overflow-auto"
                                                                                                style="max-height: 200px;gap:7px 15px;">
                                                                                                {{-- hiển thi tài khoản ở đây --}}
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="btn btn-danger light close-modal"
                                                                                                data-bs-dismiss="modal">Hủy</button>
                                                                                            <button type="button"
                                                                                                data-url="{{ route('admin.vouchers.giftVoucherAccount') }}"
                                                                                                class="btn btn-primary giftVoucher">Lưu
                                                                                                thay
                                                                                                đổi</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endcan
                                                                    @endif

                                                                </div>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                {{ $data->links('pagination::bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center align-items-center p-5">
                                        <div>
                                            <h3 class="text-center">
                                                {{ request()->name ? 'Không có kết quả với từ khóa:' . request()->name : 'Không có dữ liệu' }}
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
    <script src="{{ asset('js/admin/commons/vouchers/index.js') }}"></script>
    <script src="{{ asset('js/admin/ajaxs/voucher.js') }}"></script>
@endsection
