@extends('admin.layouts.main')

@section('title', 'Danh sách đổi thưởng')

@section('css')
    <style>
        .sparkle-normal {
            background: linear-gradient(45deg, #808080, #4b4b4b);
            padding: 5px 8px 5px 5px;
            border-radius: 3px;
            color: #fff;
        }

        .sparkle-vip {
            background: linear-gradient(45deg, #ce00ff99, #00b6ff);
            padding: 5px 8px 5px 5px;
            border-radius: 3px;
            color: #fff;
        }

        .sparkle-svip {
            background: linear-gradient(45deg, #913aff, #ec28ff);
            padding: 5px 8px 5px 5px;
            border-radius: 3px;
            color: #fff;
        }

        .reward-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 14px;
            border-radius: 6px;
        }

        .reward-image {
            display: flex;
            align-items: center;
        }

        .reward-button {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .reward-options .reward-image img {
            width: 100px;
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
                                        <form action="{{ route('admin.rewards.index') }}" method="GET">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-3 col-sm-6">
                                                        <label class="form-label">Tên quà tặng</label>
                                                        <input id="" value="{{ request()->name }}" name="name"
                                                               type="text" class="form-control mb-xl-0 mb-3"
                                                               placeholder="Nhập tên quà tặng">
                                                    </div>
                                                    <div class="col-xl-2  col-sm-4 mb-3 mb-xl-0">
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
                                <h4 class="card-title">Danh sách đổi thưởng</h4>
                                <div class="compose-btn">

                                </div>
                            </div>
                            <div class="card-body">
                                @if ($data['userRewards']->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md" id="data-table">
                                            <thead>
                                            <tr>
                                                <th style="width:80px;">#</th>
                                                <th>Thông tin</th>
                                                <th>Quà tặng</th>
                                                <th>Hạng thành viên</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($data['userRewards'] as $key => $user)
                                                <tr>
                                                    <td>
                                                        <strong class="text-black">{{ $key + 1 }}</strong>
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            <li>Ảnh: <img src="{{ asset($user->image) }}" width="40px" alt=""></li>
                                                            <li>Tên: {{ $user->first_name . ' ' . $user->last_name }}</li>
                                                            <li>Ngày sinh: {{ $user->date_birth }}</li>
                                                            <li>Giới tính: {{ $user->gender == 'male' ? 'Nam' : 'Nữ' }}</li>
                                                            <li>Email: {{ $user->email }} | SĐT: {{ $user->phone }}</li>
                                                            <li>Địa chỉ: {{ $user->address }}</li>
                                                        </ul>
                                                    </td>

                                                    <td>
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modalRewards_{{ $user->id }}" class="btn btn-facebook">Xem</button>
                                                        <div class="modal fade" id="modalRewards_{{ $user->id }}" aria-modal="true" role="dialog">
                                                            <div class="modal-dialog modal-xl" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">THÔNG TIN QUÀ TẶNG</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="modal-body">
                                                                            <div class="text-center">
                                                                                <h3 class="mb-3">QUÀ TẶNG THÀNH VIÊN ĐANG CÓ</h3>
                                                                            </div>
                                                                            <div class="reward-options">
                                                                                @if (!empty($user->rewards))
                                                                                    @foreach ($user->rewards as $reward)
                                                                                        <div class="reward-item">
                                                                                            <div class="reward-image">
                                                                                                <img src="{{ !empty($reward->image) ? asset($reward->image) : '' }}" alt="{{ !empty($reward->name) ? $reward->name : '' }}">
                                                                                                <div class="d-flex flex-column" style="margin-left: 20px;">
                                                                                                    <p>Mã quà tặng: {{ !empty($reward->pivot->code) ? $reward->pivot->code : '' }}</p>
                                                                                                    <p>{{ !empty($reward->name) ? $reward->name : '' }}</p>
                                                                                                    <p>Trạng thái: <span class="reward-status-modal_{{ $reward->pivot->code }}">{{ $reward->pivot->status == 1 ? 'Đã sử dụng' : 'Chưa sử dụng' }}</span></p>
                                                                                                </div>
                                                                                            </div>
                                                                                            @if($reward->pivot->status == 0)
                                                                                                <div class="reward-button_{{ $reward->pivot->code }}">
                                                                                                    <button data-url="{{ route('admin.redeemRewards.changeStatus') }}"
                                                                                                            data-code="{{ $reward->pivot->code }}"
                                                                                                            data-status="{{ $reward->pivot->status }}"
                                                                                                            class="btn btn-success btn-redeem-reward btn-login">Đổi trạng thái</button>
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    @endforeach
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">{{ __('language.admin.members.roles.close') }}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        @switch($user->membership_level)
                                                            @case('member')
                                                                <span class="sparkle-normal">🥈 BKM Member</span>
                                                                @break

                                                            @case('vip')
                                                                <span class="sparkle-vip">🌟 BKM VIP</span>
                                                                @break

                                                            @case('vvip')
                                                                <span class="sparkle-svip">👑 BKM VVIP</span>
                                                                @break

                                                            @default
                                                                Không xác định
                                                        @endswitch
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                {{ $data['userRewards']->links('pagination::bootstrap-4') }}
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
    <script>
        $(document).ready(function () {
            $(document).on('click', '.btn-redeem-reward', function () {
                var url = $(this).data('url');
                var code = $(this).data('code');
                var status = $(this).data('status');

                Swal.fire({
                    title: 'Đổi trạng thái quà tặng?',
                    text: "Trạng thái này sẽ không được hoàn tác!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "Xác nhận",
                    cancelButtonText: "Hủy",
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then(function (result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                code: code,
                                status: status
                            },
                            success: function (response) {
                                if(response.status) {
                                    $('.reward-status-modal_' + code).text('Đã sử dụng');
                                    $('.reward-button_' + code).css('display', 'none');
                                }
                            }
                        });
                    }
                })
            });
        })
    </script>
@endsection
