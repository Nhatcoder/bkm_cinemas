@extends('client.layouts.main2')

@section('title', 'BKM Cinemas - Rạp chiếu phim 3D công nghệ hàng đầu.')

@section('css')
    <style>
     
    </style>
@endsection

@section('content')
    <div id="content">
        <div id="wrap-datve">
            <div id="note-time">
                <div id="note">
                    * Vui lòng kiểm tra kỹ thông tin vé đã đặt trước khi thanh toán
                </div>
                <div id="time">
                    Thời gian còn lại
                    <span id="count-time">02:03</span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="ticket-info">
                        <h3 class="title">Thông tin vé</h3>
                        <div class="info">
                            <p>Phim: <b>Anh Trai Vượt Mọi Tam Tai</b></p>
                            <p>Thời gian: <b>Thứ Hai, ngày 16/9 17:10</b></p>
                            <p>Phòng chiếu: <b>02 </b></p>
                            <p>Ghế đã chọn: <b>F08</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="ticket-info">
                        <h3 class="title">Thông tin đặt vé</h3>
                        <div class="info">
                            <p>Họ tên: <b>Trần Dần</b></p>
                            <p>Số điện thoại: <b>0971131429</b></p>
                            <p>Email: <b>nhatcaca2004@gmail.com</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="ticket-info">
                        <h3 class="title">Thông tin combo bắp nước</h3>
                        <div class="info">
                            Không có combo bắp nước
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="ticket-info">
                        <h3 class="title">Lưu ý:</h3>
                        <div class="info">
                            <p> - Vé đã mua không thể đổi hay trả lại.</p>
                            <p> - Khi được yêu cầu, vui lòng xuất trình giấy tờ tùy thân để chứng thực độ tuổi khi xem phim.
                            </p>
                            <p> - Bản sao thông tin vé sẽ được lưu vào mục lịch sử giao dịch trong tài khoản nếu quý khách
                                đã đăng nhập khi mua vé. 1 bản sao khác sẽ gửi đến Email của quý khách. Quý khách vui lòng
                                kiểm tra kỹ cả trong mục spam email. </p>
                            <p> - Quý khách vui lòng lưu lại hoặc chụp ảnh lại để xuất trình khi qua cửa soát vé
                                <strong>(KHÔNG CẦN IN VÉ TẠI QUẦY)</strong>.
                            </p>
                            <p> - Nếu có kèm mua bắp nước online quý khách được ưu tiên khi xếp hàng để lên thẳng quầy vé in
                                hóa đơn, sau đó xếp hàng ở quầy bắp nước để nhận.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- combo and login --}}
    <div id="main-right">
        <div id="main-right-content">
            <div class="right-content ps ps--active-y">
                <div id="member">
                    <div class="avatar">
                        <img src="https://lh3.googleusercontent.com/a/ACg8ocJ0DSz_GDjnfix_87kgjKwDdGpjB_yHFo8f1eDDIy60h2xlaZg=s96-c"
                            alt="Trần Dần Touchcinema">
                    </div>
                    <div class="info">
                        <p class="name">Trần Dần</p>
                        <p style="font-weight: normal;font-size: 16px; color: #ea0a85;">Touch Member</p>
                    </div>
                </div>
                <div id="price-total">
                    <span id="totalPrice">0</span> đ
                </div>
                <div id="showtimes-detail">
                    <div class="movie-name">Anh Trai Vượt Mọi Tam Tai</div>
                    <div>Thứ Hai, ngày 16/9 19:15 - RẠP 03 </div>
                </div>
                <div id="current-select">
                    <div class="select seats">
                        Ghế: <span id="seat-code"></span>
                        <span class="price"><span id="totalPriceSeat">0</span> đ</span>
                    </div>
                    <div class="select combo">
                        <a href="javascript:;" class="show-combo">
                            <span class="glyphicon glyphicon-star tada animated infinite"></span>
                            Chọn Combo </a>
                        <span class="price"><span id="totalPriceCombo">0</span> đ</span>
                    </div>
                    <div class="login">
                        <h3><a>Thông tin đặt vé</a></h3>

                        <div class="select ">Họ tên: <b>Trần Dần</b></div>
                        <div class="select ">Số điện thoại: <b>0971131429</b></div>
                        <div class="select ">Email: <b>nhatcaca2004@gmail.com</b></div>
                        <div><a href="javasctip:;" id="changeInfo">Đăng nhập tài khoản khác hoặc Đổi thông tin</a></div>

                    </div>
                </div>

                <div class="payment-note">
                    <div class="payment-note">
                        <p><b>Lưu ý:</b></p>
                        <p> - Vé đã mua không thể đổi hay trả lại.</p>
                        <p> - Khi được yêu cầu, vui lòng xuất trình giấy tờ tùy thân để chứng thực độ tuổi khi xem phim.</p>
                        <p> - Bản sao thông tin vé sẽ được lưu vào mục lịch sử giao dịch trong tài khoản nếu quý khách đã
                            đăng nhập khi mua vé. 1 bản sao khác sẽ gửi đến Email của quý khách. Quý khách vui lòng kiểm tra
                            kỹ cả trong mục spam email. </p>
                        <p> - Quý khách vui lòng lưu lại hoặc chụp ảnh lại để xuất trình khi qua cửa soát vé <strong>(KHÔNG
                                CẦN IN VÉ TẠI QUẦY)</strong>.</p>
                        <p> - Nếu có kèm mua bắp nước online quý khách được ưu tiên khi xếp hàng để lên thẳng quầy vé in hóa
                            đơn, sau đó xếp hàng ở quầy bắp nước để nhận.</p>

                    </div>
                </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; height: 292px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 89px;"></div>
                </div>
            </div>
            <a href="javascript:;" class="btn btn-checkout" id="datve">
                <span class="loading hidden">
                    <i class="fa fa-circle-o-notch fa-spin fa-fw"></i>
                    <span class="sr-only">Loading...</span>
                </span>
                ĐẶT VÉ
            </a>
        </div>
    </div>

    <div id="tab-combo" class="ps ps--active-y slide">
        <table class="table table-noborder combo">
            <tbody>
                <tr>
                    <th colspan="2">
                        Combo
                    </th>
                </tr>
                @for ($i = 0; $i < 25; $i++)
                    <tr>
                        <td>
                            <div class="combo-info">
                                <div class="image-combo"
                                    style="background-image: url(https://touchcinema.com/medias/hinh-san-pham/cb-pepsibapngot-1696227008-poster.png)">
                                </div>
                                <div class="combo-group">
                                    <p class="combo-name">Pepsi + Bắp Ngọt</p>
                                    <small class="combo-description">
                                        1 Bắp rang bơ, 1 Pepsi
                                    </small>
                                    <p class="price-combo"> <span class="price">67.000 đ</span></p>
                                </div>
                            </div>
                        </td>
                        <td class="text-center comb-qty" width="150">
                            <button class="giamItem" data-forcombo="1000000">-</button>
                            <input name="combo[1000000]" id="1000000" data-price="67000" class="tongItem" value="0"
                                min="0" max="10" type="text" readonly="">
                            <button class="tangItem active" data-forcombo="1000000">+</button>
                        </td>
                    </tr>
                @endfor

            </tbody>
        </table>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 382px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 18px;"></div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('client/js/movie-detail.js') }}"></script>
@endsection
