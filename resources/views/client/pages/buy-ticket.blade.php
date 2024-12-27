@extends('client.layouts.main2')

@section('title', 'BKM Cinemas - Rạp chiếu phim 3D công nghệ hàng đầu.')

@section('css')
<style>
</style>
@endsection
@vite(['resources/js/app.js', 'resources/css/app.css'])

@section('content')
<div x-data="SeatViewComponent({{$showtimeId}}, '{{$endTime}}')" id="main-left">

    <div id="header">
        <div class="header-content">
            <div class="logo">
                <h1>
                    <strong style="display: none;">Touch Cinema - Rạp chiếu phim công nghệ hiện đại đạt chuẩn
                        quốc tế</strong>
                    <a href="/">
                        <img style="max-width: 100%" src="{{asset('client/images/logo.png')}}" alt="touchcinema">
                    </a>
                </h1>
            </div>
            <div id="menu-datve">
                <ul class="nav navbar-nav navbar-left nav-back">
                    <li><a href="/">Quay lại</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left nav-step">
                    <li :class="{'active': step == 1}"><a href="javascript:;" @click="setStep(1)">01 CHỌN GHẾ</a></li>
                    <li :class="{'active': step == 2}"><a href="javascript:;">02 XÁC THỰC & THANH TOÁN</a></li>
                    <li :class="{'active': step == 3}"><a href="javascript:;">03 HOÀN TẤT</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="app-content">
        <div id="content">
            <template x-if="step == 1">
                <div>
                    <div id="wrap-datve">
                        <div id="note-time">
                            <div id="note">
                                * Không được bỏ trống 01 ghế bên cạnh hoặc ghế đầu tiên của dãy
                            </div>
                            <div id="time">
                                Thời gian đặt vé
                                <span id="count-time" x-text="formatMinuteSecond()"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="note">
                                    <div class="seat selected"><span class="list-style"></span> Ghế bạn đang chọn</div>
                                    <div class="seat booking"><span class="list-style"></span> Ghế nguời khác chọn</div>
                                    <div class="seat booked"><span class="list-style"></span> Ghế đã có người đặt</div>
                                    <template x-for="seatType in seatTypes" :key="seatType.id">
                                        <div class="seat" :class="seatType.code"><span class="list-style"></span> <span class="tw-inline" x-text="seatType.text"></span></div>
                                    </template>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div id="manhinh">
                                    Màn hình
                                </div>
                                <div>
                                    <div :style="{'pointer-events: none': true}" id="seatingArea" class="tw-inline-flex tw-items-center tw-justify-center tw-mb-3 tw-text-white tw-w-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="main-right">
                        <div id="main-right-content">
                            <div class="right-content ps ps--active-y">
                                <div id="member">
                                    <div class="avatar">
                                        <img src="https://touchcinema.com/images/avatar.png" alt="Duy Nguyễn Touchcinema">
                                    </div>
                                    <div class="info">
                                        <p class="name" x-text="user?.name"></p>
                                        <p style="font-weight: normal;font-size: 16px; color: #ea0a85;" x-text="user?.type"></p>
                                    </div>
                                </div>
                                <div id="price-total">
                                    <span id="totalPrice" x-text="price(totalPriceSeats + totalPriceFoods)"></span>
                                </div>
                                <div id="showtimes-detail">
                                    <div class="movie-name" x-text="movie?.title"></div>
                                    <div x-text="moment(movie?.release_date).format('dddd, [ngày] DD/MM HH:mm').replace('thứ', 'Thứ') + ' - ' + cinema?.name"></div>
                                </div>
                                <div id="current-select">
                                    <div class="select seats">
                                        Phòng: <span id="seat-code" x-text="room?.room_name"></span>
                                    </div>
                                    <div class="select seats">
                                        Ghế: <span id="seat-code" x-text="seatsSelected.map(seat => seat.seat_number).join(',')"></span>
                                        <span class="price"><span id="totalPriceSeat" x-text="price(totalPriceSeats)"></span></span>
                                    </div>
                                    <div class="select combo">
                                        <a href="javascript:;" style="text-decoration: none; color:#ea0a85;" @click="showTabCombo = !showTabCombo">
                                            <span class="glyphicon glyphicon-star tada animated infinite"></span>
                                            Chọn Combo </a>
                                        <span class="price"><span id="totalPriceCombo" x-text="price(totalPriceFoods)"></span></span>
                                    </div>
                                    <div class="login">
                                        <h3><a>Thông tin đặt vé</a></h3>

                                        <div class="select ">Họ tên: <b x-text="user?.name"></b></div>
                                        <div class="select ">Số điện thoại: <b x-text="user?.phone"></b></div>
                                        <div class="select ">Email: <b x-text="user?.email"></b></div>

                                    </div>
                                </div>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; height: 605px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 385px;"></div>
                                </div>
                            </div>
                            <a href="javascript:;" class="btn btn-checkout" :class="{'pay': seatsSelected.length > 0}" id="datve" @click="submit">
                                <span class="loading hidden">
                                    <i class="fa fa-circle-o-notch fa-spin fa-fw"></i>
                                    <span class="sr-only">Loading...</span>
                                </span>
                                ĐẶT VÉ
                            </a>
                        </div>
                    </div>
                    <div @click="showTabCombo = false" x-show="showTabCombo" class="tw-fixed tw-top-0 tw-left-0 tw-w-full tw-h-full"></div>
                    <div style="overflow-y: auto;" id="tab-combo"
                        :class="{
                        'slide': showTabCombo
                    }">
                        <div class="tw-mt-16 tw-pl-3">
                            <template x-for="foodType in foodTypes" :key="foodType.id">
                                <div class="tw-w-full tw-border-b tw-gap-2">
                                    <div class="tw-text-left tw-font-bold tw-mb-2 tw-pt-2 tw-border tw-border-solid tw-border-gray-200 tw-border-x-0 tw-p-4" x-text="foodType.name"></div>
                                    <template x-for="food in foodType.foods" :key="food.id">
                                        <div class="tw-grid tw-grid-cols-12 tw-gap-4 tw-items-center tw-p-4">
                                            <div class="tw-bg-cover tw-bg-center tw-col-span-2">
                                                <img class="tw-block tw-w-[60px] tw-aspect-square tw-object-cover tw-rounded-full tw-border-2 tw-border-solid tw-border-pink-500 tw-overflow-hidden"
                                                    :src="food.image">
                                            </div>
                                            <div class="tw-flex-1 tw-col-span-7">
                                                <div class="tw-font-semibold" x-text="food.name"></div>
                                                <small class="tw-text-gray-500" x-html="food.description ?? '&nbsp;'"></small>
                                                <div class="tw-text-[#44c020] tw-font-normal" x-text="price(food.price)"></div>
                                            </div>
                                            <div class="text-center comb-qty tw-flex tw-gap-2">
                                                <button class="giamItem" data-forcombo="1000000" @click="food.quantity > 0 && food.quantity--;calculateTotalPrice()">-</button>
                                                <input class="tongItem" type="number" x-model="food.quantity" readonly>
                                                <button class="tangItem active" data-forcombo="1000000" @click="food.quantity < 10 && food.quantity++;calculateTotalPrice()">+</button>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </template>
            <template x-if="step == 2">
                <div>
                    <div id="wrap-datve">
                        <div id="note-time">
                            <div id="note">
                                * Vui lòng kiểm tra kỹ thông tin vé đã đặt trước khi thanh toán
                            </div>
                            <div id="time">
                                Thời gian còn lại
                                <span id="count-time" x-text="formatMinuteSecond()"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="ticket-info">
                                    <h3 class="title">Thông tin vé</h3>
                                    <div class="info">
                                        <p>Phim: <b x-text="movie?.title"></b></p>
                                        <p>Thời gian: <b x-text="moment(showtimeDetail?.start_time).format('dddd, [ngày] DD/MM HH:mm').replace('thứ', 'Thứ') + ' - ' + cinema?.name"></b></p>
                                        <p>Phòng chiếu: <b x-text="room?.room_name"> </b></p>
                                        <p>Ghế đã chọn: <b x-text="seatsSelected.map(seat => seat.seat_number).join(',')"></b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="ticket-info">
                                    <h3 class="title">Thông tin đặt vé</h3>
                                    <div class="info">
                                        <p>Họ tên: <b x-text="user?.name"></b></p>
                                        <p>Số điện thoại: <b x-text="user?.phone"></b></p>
                                        <p>Email: <b x-text="user?.email"></b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="ticket-info">
                                    <h3 class="title">Thông tin combo bắp nước</h3>
                                    <div class="info">
                                        <template x-for="foodSelected in foodsSelected" :key="foodSelected.id">
                                            <p style="margin-bottom: 0;"><b x-text="foodSelected.name"></b>
                                                <span class="pull-right">
                                                    <b x-text="price(foodSelected.price)"></b> x
                                                    <b x-text="foodSelected.quantity"></b>
                                                </span>
                                            </p>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="main-right">
                            <div id="main-right-content">
                                <div class="right-content ps ps--active-y">
                                    <div id="member">
                                        <div class="avatar">
                                            <img src="https://touchcinema.com/images/avatar.png" alt="Duy Nguyễn Touchcinema">
                                        </div>
                                        <div class="info">
                                            <p class="name" x-text="user?.name"></p>
                                            <p class="diem"><span class="current_point" x-text="price(user?.balance)"></span> </p>
                                        </div>
                                    </div>
                                    <div id="couponbox">
                                        <div id="formCoupon">
                                            <button type="button" class="btn-use-coupon" @click="modalVoucher = true; getVouchers()">
                                                <i class="fa fa-gift " aria-hidden="true"></i> Sử dụng voucher
                                            </button>
                                            <div style="padding: 0 15px;" x-show="voucherSelected?.name" class="applied-voucher">
                                                <div class="tw-flex tw-justify-center tw-items-center">VOUCHER: <strong x-text="voucherSelected?.code"></strong> | <strong x-text="voucherSelected.name"></strong></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="current-select">
                                        <div class="select">
                                            Tổng cộng:<span class="price" style="font-size: 30px">
                                                <span id="totalPrice" x-text="price((totalPriceSeats + totalPriceFoods - discountPrice) < 0 ? 0 : (totalPriceSeats + totalPriceFoods - discountPrice))"></span>
                                            </span>
                                            <span id="decrease"></span>
                                        </div>
                                        <div class="select">
                                            voucher:<span class="price">
                                                -<span id="price_seat" x-text="price(discountPrice >= (totalPriceSeats + totalPriceFoods) ? (totalPriceSeats + totalPriceFoods) : discountPrice)"></span>
                                            </span>
                                        </div>
                                        <div class="select">
                                            Vé ghế:<span class="price">
                                                <span id="price_seat" x-text="price(totalPriceSeats)"></span>
                                            </span>
                                        </div>
                                        <div class="select combo">
                                            <span>Combo </span>
                                            <span class="price">
                                                <span id="price_combo" x-text="price(totalPriceFoods)"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div id="current-select">
                                        <div class="select payment">
                                            <p>Chọn phương thức thanh toán</p>
                                            <div class="input-group">
                                                <input type="radio" x-model="paymentMethod" name="payment_method" value="zalopay" id="zalopay">
                                                <label for="zalopay">
                                                    <span></span>
                                                    <span class="card zalopay"></span>Thanh toán qua ZaloPay</label>
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" x-model="paymentMethod" name="payment_method" value="vnpay" id="vnpay">
                                                <label for="vnpay">
                                                    <span></span>
                                                    <span class="card vnpay"></span>Thẻ nội địa/ Thẻ quốc tế/ QRcode</label>
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" x-model="paymentMethod" name="payment_method" value="momo" id="momo">
                                                <label for="momo">
                                                    <span></span>
                                                    <span class="card momo"></span>Ví điện tử MoMo</label>
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" x-model="paymentMethod" name="payment_customer" value="customer" id="customer">
                                                <label for="customer">
                                                    <span></span>
                                                    <span class="card customer"></span>Ví thành viên</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; height: 264px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 100px;"></div>
                                    </div>
                                </div>
                                <a @click="submit()" href="javascript:;" class="btn btn-checkout pay">
                                    <span class="loading hidden">
                                        <i class="fa fa-circle-o-notch fa-spin fa-fw"></i>
                                        <span class="sr-only">Loading...</span>
                                    </span>
                                    Thanh Toán
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
            {{-- combo and login --}}

        </div>
    </div>
    <div class="my-modal" x-show="modalVoucher" x-cloak>
        <div @click.outside="modalVoucher = false" class="modal-content">
            <span class="modal-close" id="close-modal-btn" @click="modalVoucher = false">×</span>
            <h3>Chọn Mã Giảm Giá</h3>

            <div class="coupon-list" id="coupon-list" style="overflow-y: auto;">
                <!-- Mã giảm giá sẽ được render tại đây -->
                <template x-for="voucher in vouchers" :key="voucher.id">
                    <div @click="choseVoucher(voucher)" :class="{
                    'coupon-item': true,
                    'active': voucher.id === voucherSelected?.id,
                    }">
                        <img :src="voucher.image" alt="SALE20">
                        <div class="coupon-info">
                            <strong x-text="voucher.code">SALE20</strong>
                            <span x-text="voucher.description">Giảm 20% cho đơn hàng từ 500k</span>
                            <div><small>Hiệu lực đến ngày: <b x-text="voucher.end_date"></b></small></div>
                        </div>
                    </div>
                </template>
            </div>

            <div class="coupon-input">
                <input x-model="voucherCode" type="text" placeholder="Nhập mã giảm giá">
                <button id="apply-coupon" @click="applyVoucher()">Áp dụng</button>
            </div>
            <div x-show="voucherSelected?.name" class="applied-voucher" x-cloak>
                <div class="tw-flex tw-items-center tw-justify-center">VOUCHER: <strong x-text="voucherSelected?.code"></strong> | <strong x-text="voucherSelected.name"></strong></div>
            </div>

            <!-- Thông báo lỗi nếu mã giảm giá không hợp lệ -->
            <div x-show="voucherNotFound" class="error-message">
                <p class="tw-text-red-500">Mã giảm giá không hợp lệ</p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('client/js/movie-detail.js') }}"></script>
@endsection