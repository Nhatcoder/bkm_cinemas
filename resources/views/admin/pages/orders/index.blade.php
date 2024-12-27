@extends('admin.layouts.main')

@section('title', 'Danh sách vé')

@section('css')
    <style>
        /* Ticket */
        .card-body {
            padding: 15px 20px;
        }

        .info {
            display: flex;
            justify-content: space-between;
            text-align: center;
        }

        .info div {
            flex: 1;
        }

        .info div:not(:last-child) {
            border-right: 1px solid #ddd;
        }

        .info p {
            margin: 5px 0;
            font-size: 14px;
        }

        .info-bkm-card {
            max-width: 76px !important;
        }

        .info-bkm-card a.btn-login {
            font-size: 13px;
            padding: 6px 20px;
            border-radius: 3px;
            margin-top: 10px;
            text-decoration: none;
            color: #fff;
        }

        .info-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .mt-25 {
            margin-top: 25px;
        }

        .body-account {
            border-top: none;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .h3-body-account {
            margin-top: 10px;
            margin-bottom: 25px;
        }

        .date-content {
            display: flex;
            align-content: center;
        }

        .date-box-content {
            position: relative;
        }

        .date-box-content .date-input {
            text-align: center;
            width: 108px;
            border-radius: 4px;
            padding-left: 23px;
        }

        .date-box-content .dp__input_icons {
            position: absolute;
            width: 34px;
            height: 14px;
            stroke-width: 0;
            font-size: 1rem;
            line-height: calc(1rem * 1.5);
            cursor: pointer;
            top: 50%;
            inset-inline-start: 0;
            transform: translateY(-50%);
            color: #959595;
            stroke: currentcolor;
            fill: currentcolor;
        }

        .mb-10 {
            margin-bottom: 10px !important;
        }

        .btn-cancelled-ticket {
            padding: 5px 10px;
            background-color: #eb1689;
            color: #fff;
            box-shadow: -2px 0 4px #000;
            border-radius: 0;
            font-size: 12px;
        }

        .gr-ticket {
            display: grid !important;
            grid-template-columns: 1fr 1fr;
            width: 200px;
        }

        .transaction-reward th {
            padding: 7px;
            font-size: 13px;
        }

        .transaction-reward td {
            padding: 7px;
            font-size: 13px;
        }

        .col-inner {
            background-position: 50% 50%;
            background-repeat: no-repeat;
            background-size: cover;
            flex: 1 0 auto;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            width: 100%;
        }

        .order-view-container .order-view-content,
        .order-view-container .order-view-content p,
        .order-view-container .order-view-content td,
        .order-view-container .order-view-content h1,
        .order-view-container .order-view-content h2,
        .order-view-container .order-view-content h3,
        .order-view-container .order-view-content h4,
        .order-view-container .order-view-content h5,
        .order-view-container .order-view-content h6,
        .order-view-container .order-view-content .heading-font {
            color: black;
        }

        .order-view-container .order-view-content {
            height: 100%;
        }

        .order-view-container .order-view-content>.row {
            height: 100%;
        }

        .row-collapse>.col,
        .row-collapse>.flickity-viewport>.flickity-slider>.col {
            padding: 0 !important;
        }

        .small-12,
        .small-columns-1 .flickity-slider>.col,
        .small-columns-1>.col {
            flex-basis: 100%;
            max-width: 100%;
        }

        .col,
        .columns,
        .gallery-item {
            margin: 0;
            position: relative;
            width: 100%;
        }

        .col-inner {
            background-position: 50% 50%;
            background-repeat: no-repeat;
            background-size: cover;
            flex: 1 0 auto;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            width: 100%;
        }



        @media screen and (min-width: 850px) {
            .col:first-child .col-inner {
                margin-left: auto;
                margin-right: 0;
            }
        }

        .order-view-container .order-view-content>.row>.col.content-col>.col-inner {
            position: relative;
            background-color: #f4f5f6;
            border-radius: 20px;
        }

        .row-collapse {
            padding: 0;
        }

        .row.row-collapse {
            max-width: 1300px;
        }

        .row-collapse>.col,
        .row-collapse>.flickity-viewport>.flickity-slider>.col {
            padding: 0 !important;
        }

        .col-inner {
            background-position: 50% 50%;
            background-repeat: no-repeat;
            background-size: cover;
            flex: 1 0 auto;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            width: 100%;
        }

        .order-details-row>.col>.col-inner {
            padding: 20px;
        }

        .text-center {
            text-align: center;
        }

        .order-details-row .qrcode-image {
            max-width: 160px;
            margin: auto;
        }

        .text-center .is-divider,
        .text-center .is-star-rating,
        .text-center .star-rating,
        .text-center>div,
        .text-center>div>div {
            margin-left: auto;
            margin-right: auto;
        }

        .order-details-row .qrcode-image>div {
            line-height: 1.2em;
            margin-bottom: 7px;
        }

        .order-details-row .qrcode-image>div:last-child {
            margin-bottom: 0px;
        }

        .order-details-row .code {
            color: #72be43;
            font-weight: bold;
        }

        .row-collapse>.col,
        .row-collapse>.flickity-viewport>.flickity-slider>.col {
            padding: 0 !important;
        }

        .order-view-container .row-divided>.col+.col:not(.large-12) {
            border-left-style: dashed;
            border-left-color: rgb(0 0 0 / 30%);
        }

        .col-inner {
            background-position: 50% 50%;
            background-repeat: no-repeat;
            background-size: cover;
            flex: 1 0 auto;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            width: 100%;
        }

        .order-details-row>.col>.col-inner {
            padding: 20px;
        }

        .align-middle {
            align-items: center !important;
            align-self: center !important;
            vertical-align: middle !important;
        }

        .icon-box-left,
        .icon-box-right {
            display: flex;
            flex-flow: row wrap;
            width: 100%;
        }

        .text-left {
            text-align: left;
        }

        .icon-box .icon-box-img {
            margin-bottom: 1em;
            max-width: 100%;
            position: relative;
        }

        .icon-box-left .icon-box-img,
        .icon-box-right .icon-box-img {
            flex: 0 0 auto;
            margin-bottom: 0;
            max-width: 200px;
        }

        .icon-box-left .icon-box-text,
        .icon-box-right .icon-box-text {
            flex: 1 1 0px;
        }

        .icon-box-left .icon-box-img+.icon-box-text {
            padding-left: 1em;
        }

        .order-film-box .title {
            font-size: 1.3em;
            line-height: 1.3em;
            margin-bottom: 15px;
            text-align: left;
            font-weight: 700;
        }

        .order-film-box .metas ul {
            margin: 0px 0px 15px;
            padding: 0px;
            list-style: none;
            font-size: 0.9em;
        }

        .col-inner ol li,
        .col-inner ul li,
        .entry-content ol li,
        .entry-content ul li,
        .entry-summary ol li,
        .entry-summary ul li {
            margin-left: 1.3em;
        }

        .order-film-box .metas ul li {
            margin: 0px 0px 10px;
        }

        .modal-tikets {
            width: 1300px;
        }

        img {
            border-style: none;
        }

        img {
            display: inline-block;
            height: auto;
            max-width: 100%;
            vertical-align: middle;
        }

        img {
            opacity: 1;
            transition: opacity 1s;
        }

        .order-film-box .metas ul li img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            float: left;
            margin-top: 3px;
        }

        .row.ticket-row {
            font-size: 0.9em;
            margin-bottom: 15px !important;
        }

        .row.row-small {
            max-width: 1322.5px;
        }

        @media screen and (min-width: 850px) {
            .large-3 {
                flex-basis: 25%;
                max-width: 25%;
            }
        }

        @media screen and (min-width: 550px) {
            .medium-3 {
                flex-basis: 25%;
                max-width: 25%;
            }
        }

        .container .row:not(.row-collapse),
        .lightbox-content .row:not(.row-collapse),
        .row .gallery,
        .row .row:not(.row-collapse) {
            margin-left: -15px;
            margin-right: -15px;
            padding-left: 0;
            padding-right: 0;
            width: auto;
        }

        .container .row-small:not(.row-collapse),
        .row .row-small:not(.row-collapse) {
            margin-bottom: 0;
            margin-left: -10px;
            margin-right: -10px;
        }

        .row-small>.col,
        .row-small>.flickity-viewport>.flickity-slider>.col {
            margin-bottom: 0;
            padding: 0 9.8px 19.6px;
        }

        .ticket-row .col {
            padding-bottom: 0px;
        }

        .ticket-row p {
            margin-bottom: 5px;
        }

        .order-film-box .total {
            font-size: 1.2em;
            font-weight: bold;
        }

        .order-film-box .total span {
            color: #72be43;
        }

        .mt-0 {
            margin-top: 0 !important;
        }

        .fw-700 {
            font-weight: 700;
        }

        .d-flex {
            display: flex !important;
        }

        .justify-content-center {
            justify-content: center !important;
        }

        .align-items-center {
            align-items: center !important;
        }

        .p-5 {
            padding: 10rem !important;
        }

        .no-ticket {
            border: 1px solid #d9d9d9;
            margin-top: 25px;
            border-radius: 4px;
            background: #f5f5f5;
        }

        .flex-column {
            flex-direction: column !important;
        }

        .reward-options .reward-image img {
            width: 100px;
        }
    </style>
@endsection

@vite(['resources/js/app.js', 'resources/css/app.css'])

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
                                        <form action="{{ route('admin.orders.index') }}" method="GET">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-3 col-sm-6">
                                                        <label class="form-label">Tên mã</label>
                                                        <input id="" value="{{ request()->code }}" name="code"
                                                            type="text" class="form-control mb-xl-0 mb-3"
                                                            placeholder="Nhập mã đơn">
                                                    </div>
                                                    <div class="col-xl-2  col-sm-4 mb-3 mb-xl-0">
                                                        <label class="form-label">Trạng thái vé</label>
                                                        <select name="status" class="form-control">
                                                            <option value="">
                                                                --chọn--
                                                            </option>
                                                            <option @selected(request()->status == 'completed') value="completed">
                                                                Hoàn thành
                                                            </option>
                                                            <option @selected(request()->status == 'cancelled') value="cancelled">
                                                                Hủy
                                                            </option>
                                                            <option @selected(request()->status == 'waiting_for_cancellation')
                                                                value="waiting_for_cancellation">
                                                                Chờ hủy
                                                            </option>
                                                            <option @selected(request()->status == 'rejected') value="rejected">
                                                                Từ chối hủy
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-2  col-sm-4 mb-3 mb-xl-0">
                                                        <label class="form-label">Trạng thái thanh toán</label>
                                                        <select name="payment_status" class="form-control">
                                                            <option value="">
                                                                --chọn--
                                                            </option>
                                                            <option @selected(request()->payment_status == 'pending') value="pending">
                                                                Chờ xác nhận
                                                            </option>
                                                            <option @selected(request()->payment_status == 'completed') value="completed">
                                                                Hoàn thành
                                                            </option>
                                                            <option @selected(request()->payment_status == 'failed') value="failed">
                                                                Lỗi
                                                            </option>
                                                            <option @selected(request()->payment_status == 'cancelled') value="cancelled">
                                                                Hủy
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-2  col-sm-4 mb-3 mb-xl-0">
                                                        <label class="form-label">Trạng thái hoàn tiền</label>
                                                        <select name="refund_status" class="form-control">
                                                            <option value="">
                                                                --chọn--
                                                            </option>
                                                            <option @selected(request()->refund_status == 'pending') value="pending">
                                                                Chờ hoàn tiền
                                                            </option>
                                                            <option @selected(request()->refund_status == 'completed') value="completed">
                                                                Hoàn thành
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-2  col-sm-4 mb-3 mb-xl-0">
                                                        <label class="form-label">Nhận vé</label>
                                                        <select name="get_tickets" class="form-control">
                                                            <option value="">
                                                                --chọn--
                                                            </option>
                                                            <option @selected(request()->get_tickets == 1) value="1">
                                                                Đã nhận
                                                            </option>
                                                            <option @selected(request()->get_tickets == 0) value="0">
                                                                Chưa nhận
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-5 col-sm-5 align-self-end mt-3">
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
                                <h4 class="card-title">Danh sách đơn hàng</h4>
                                @if ($data->count() > 0)
                                    <button type="button" data-url="{{ route('admin.orders.changeManyTickets') }}" class="btn btn-success" id="change-many-tickets">
                                        Cập nhật nhiều vé
                                    </button>
                                @endif
                            </div>
                            <div class="card-body">
                                @if ($data->count() > 0)
                                    <table class="table table-responsive-md" id="data-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Mã đơn</th>
                                                <th>Phim</th>
                                                <th>Rạp phim</th>
                                                <th>Người đặt</th>
                                                <th>Trạng thái</th>
                                                <th>Trạng thái thanh toán</th>
                                                <th>Trạng thái hoàn tiền</th>
                                                <th>Nhận vé</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $order)
                                                <tr>
                                                    <td>
                                                        <strong
                                                            class="text-black">{{ ($data->currentPage() - 1) * $data->perPage() + $key + 1 }}</strong>
                                                    </td>
                                                    <td>
                                                        <b class="text-black">
                                                            {{ $order->code }}
                                                        </b>
                                                    </td>
                                                    <td>
                                                        {{ $order->movie->title }}
                                                    </td>
                                                    <td>
                                                        {{ $order->cinema->name }}
                                                    </td>
                                                    <td>
                                                        {{ $order->user->name ?? $order->user->email }}
                                                    </td>
                                                    <td>
                                                        @if (
                                                            $order->status == 'cancelled' ||
                                                                $order->status == null ||
                                                                $order->status == 'completed' ||
                                                                $order->status == 'rejected')
                                                            <b id="status-{{ $order->id }}">
                                                                @switch($order->status)
                                                                    @case('completed')
                                                                        Hoàn thành
                                                                    @break

                                                                    @case('rejected')
                                                                        Từ chối hủy
                                                                    @break

                                                                    @case('cancelled')
                                                                        Hủy
                                                                    @break

                                                                    @default
                                                                        Không xác định
                                                                @endswitch
                                                            </b>
                                                        @else
                                                            <select name="status" id="status-{{ $order->id }}"
                                                                class="form-control order_status"
                                                                data-url="{{ route('api.orders.changeStatus', $order->id) }}">
                                                                <option value="cancelled" @selected($order->status == 'cancelled')>
                                                                    Hủy
                                                                </option>
                                                                <option value="waiting_for_cancellation"
                                                                    @selected($order->status == 'waiting_for_cancellation')>
                                                                    Chờ hủy
                                                                </option>
                                                                <option value="rejected" @selected($order->status == 'rejected')>
                                                                    Từ chối hủy
                                                                </option>
                                                            </select>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <b id="payment_status-{{ $order->id }}">
                                                            @switch($order->payment_status)
                                                                @case('pending')
                                                                    Chờ xác nhận
                                                                @break

                                                                @case('completed')
                                                                    Hoàn thành
                                                                @break

                                                                @case('failed')
                                                                    Lỗi
                                                                @break

                                                                @case('cancelled')
                                                                    Hủy
                                                                @break

                                                                @default
                                                                    Không xác định
                                                            @endswitch
                                                        </b>
                                                    </td>
                                                    <td>
                                                        @if (is_null($order->refund_status))
                                                            <b id="refund_status-{{ $order->id }}">Không có</b>
                                                        @elseif ($order->refund_status == 'completed')
                                                            <b id="refund_status-{{ $order->id }}">
                                                                Hoàn tiền thành công
                                                            </b>
                                                        @else
                                                            <select name="refund_status"
                                                                data-url="{{ route('api.orders.changeRefundStatus', $order->id) }}"
                                                                class="form-control refund_status"
                                                                id="refund_status-{{ $order->id }}">
                                                                <option value="pending" @selected($order->refund_status == 'pending')>
                                                                    Chờ hoàn tiền
                                                                </option>
                                                                <option value="completed"
                                                                    @selected($order->refund_status == 'completed')>
                                                                    Hoàn tiền
                                                                </option>
                                                            </select>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (
                                                            $order->refund_status != null ||
                                                                $order->status == 'cancelled' ||
                                                                $order->payment_status != 'completed' ||
                                                                $order->status == 'waiting_for_cancellation' ||
                                                                $order->get_tickets == 1)
                                                            <b id="get_tickets-{{ $order->id }}">
                                                                {{ $order->get_tickets == 1 ? 'Đã nhận' : 'Chưa nhận' }}
                                                            </b>
                                                        @else
                                                            <button id="get_tickets-{{ $order->id }}"
                                                                class="get_tickets btn btn-xs btn-success text-white"
                                                                data-id="{{ $order->id }}"
                                                                data-url="{{ route('admin.orders.changeGetTickets', $order->id) }}">
                                                                Nhận vé
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#modalTickets_{{ $order->id }}"
                                                            class="btn btn-primary shadow btn-xs sharp me-1">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="modalTickets_{{ $order->id }}"
                                                    aria-modal="true" role="dialog">
                                                    <div class="modal-dialog modal-xl" style="max-width: 1200px !important;" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    {{ __('language.admin.members.roles.information') }}
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="col-inner">
                                                                    <div class="order-view-container">
                                                                        <div class="order-view-content">
                                                                            <div
                                                                                class="row align-center align-middle row-collapse">
                                                                                <div
                                                                                    class="col content-col medium-12 small-12 large-12">
                                                                                    <div class="col-inner">
                                                                                        <div
                                                                                            class="row d-flex align-middle row-divided order-details-row row-collapse">
                                                                                            <div class="col-3">
                                                                                                <div
                                                                                                    class="col-inner p-3">
                                                                                                    <div
                                                                                                        class="qrcode-image text-center">
                                                                                                        <div>Thông tin
                                                                                                            vé</div>
                                                                                                        <div>
                                                                                                            <img
                                                                                                                src="{{ asset('client/images/offline-ticket.jpg') }}">
                                                                                                        </div>
                                                                                                        <div><span
                                                                                                                class="code">Vé
                                                                                                                đặt
                                                                                                                online</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-9">
                                                                                                <div
                                                                                                    class="col-inner p-3">
                                                                                                    <div
                                                                                                        class="icon-box icon-box-left align-middle text-left order-film-box">
                                                                                                        <div
                                                                                                            class="icon-box-img">
                                                                                                            <img
                                                                                                                src="{{ $order->movie->image }}">
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="icon-box-text p-last-0">
                                                                                                            <h4
                                                                                                                class="fw-700">
                                                                                                                {{ $order->movie->title }}
                                                                                                            </h4>
                                                                                                            <div
                                                                                                                class="metas">
                                                                                                                <ul>
                                                                                                                    <li>
                                                                                                                        <img
                                                                                                                            src="{{ asset('client/images/helpIcon.png') }}">
                                                                                                                        <span>Phụ
                                                                                                                            đề,
                                                                                                                            {{ $order->movie->format }}</span>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <img
                                                                                                                            src="{{ asset('client/images/calendarIcon.png') }}">
                                                                                                                        <span>{{ date('d/m/Y', strtotime($order->showtime->start_time)) }}</span>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <img
                                                                                                                            src="{{ asset('client/images/clockIcon.png') }}">
                                                                                                                        Suất
                                                                                                                        chiếu:
                                                                                                                        <span>{{ date('H:i', strtotime($order->showtime->start_time)) }}</span>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <img
                                                                                                                            src="{{ asset('client/images/locationIcon.png') }}">
                                                                                                                            <span>{{ $order->cinema->name }}</span>
                                                                                                                    </li>
                                                                                                                </ul>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="row d-flex row-small ticket-row row-divided">
                                                                                                                <div
                                                                                                                    class="col medium-12 small-12 large-3">
                                                                                                                    <div
                                                                                                                        class="col-inner text-center">
                                                                                                                        <p>Đồ ăn</p>
                                                                                                                        <div>
                                                                                                                            @if ($order->foodsBooking && $order->foodsBooking->count())
                                                                                                                                @foreach ($order->foodsBooking as $foodBooking)
                                                                                                                                    <span>{{ $foodBooking->food->name ?? '' }} x{{ $foodBooking->quantity }}</span>
                                                                                                                                    @if (!$loop->last)
                                                                                                                                        |
                                                                                                                                    @endif
                                                                                                                                @endforeach
                                                                                                                            @else
                                                                                                                                <span>Không có
                                                                                                                                    đồ ăn</span>
                                                                                                                            @endif
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col medium-12 small-12 large-3">
                                                                                                                    <div
                                                                                                                        class="col-inner text-center">
                                                                                                                        <p>Ghế
                                                                                                                        </p>
                                                                                                                        <div>
                                                                                                                            @if ($order->seatsBooking && $order->seatsBooking->count())
                                                                                                                                @foreach ($order->seatsBooking as $seatBooking)
                                                                                                                                    <span>{{ $seatBooking->seat->seat_number ?? '' }}</span>
                                                                                                                                    @if (!$loop->last)
                                                                                                                                        ,
                                                                                                                                    @endif
                                                                                                                                @endforeach
                                                                                                                            @else
                                                                                                                                <span>Không
                                                                                                                                    có
                                                                                                                                    ghế</span>
                                                                                                                            @endif
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col medium-12 small-12 large-3">
                                                                                                                    <div
                                                                                                                        class="col-inner text-center">
                                                                                                                        <p>Phòng
                                                                                                                            chiếu
                                                                                                                        </p>
                                                                                                                        <div>
                                                                                                                            {{ $order->showtime->room->room_name ?? '' }}
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            @if ($order->totalFoodsPrice() > 0)
                                                                                                                <div class="total mb-10 gr-ticket">
                                                                                                                    <div>
                                                                                                                        Tiền vé:
                                                                                                                    </div>
                                                                                                                    <div>
                                                                                                                        <span>{{ number_format($order->totalSeatsPrice(), 0, ',', '.') }}đ</span> 
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="total mb-10 gr-ticket">
                                                                                                                    <div>
                                                                                                                        Tiền đồ ăn:
                                                                                                                    </div>
                                                                                                                    <div>
                                                                                                                        <span>{{ number_format($order->totalFoodsPrice(), 0, ',', '.') }}đ</span> 
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            @else
                                                                                                                <div class="total mb-10 gr-ticket">
                                                                                                                    <div>
                                                                                                                        Tiền vé:
                                                                                                                    </div>
                                                                                                                    <div>
                                                                                                                        <span>{{ number_format($order->totalSeatsPrice(), 0, ',', '.') }}đ</span> 
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            @endif
                                                                                                            @if ($order->discount_price > 0)
                                                                                                                <div class="total mb-10 gr-ticket">
                                                                                                                    <div>
                                                                                                                        Voucher:
                                                                                                                    </div>
                                                                                                                    <div>
                                                                                                                        <span>-{{ number_format($order->discount_price, 0, ',', '.') }}đ</span> 
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            @endif
                                                                                                            <div class="total mb-10 gr-ticket">
                                                                                                                <div>
                                                                                                                    Tổng tiền:
                                                                                                                </div>
                                                                                                                <div>
                                                                                                                    <span>{{ number_format($order->final_price, 0, ',', '.') }}đ</span> 
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="total mb-10 gr-ticket">
                                                                                                                <div>
                                                                                                                    Thanh toán:
                                                                                                                </div>
                                                                                                                <div>
                                                                                                                    @if ($order->payment_method == 'vnpay')
                                                                                                                        Ví <span style="color: #ed1c24;">VN</span><span style="color: #005baa;">PAY</span>
                                                                                                                    @elseif ($order->payment_method == 'momo')
                                                                                                                        Ví <span style="color: rgb(212, 42, 135);">MOMO</span>
                                                                                                                    @elseif ($order->payment_method == 'zalopay')
                                                                                                                        Ví <span style="color: rgb(0, 51, 201);">ZALO</span><span style="color: rgb(0, 207, 106);">PAY</span>
                                                                                                                    @else
                                                                                                                        Ví thành viên
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
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center">
                                            {{ $data->links('pagination::bootstrap-4') }}
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
    <script type="module" src=" {{ asset('/js/admin/ajaxs/order.js') }} "></script>
@endsection
