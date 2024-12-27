<!DOCTYPE html>
<html>

<head>
    <title>Chào mừng đến với Nền tảng của chúng tôi</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333333;
        }

        .custom-container {
            display: flex !important;
            background-color: #ebebeb;
            height: 100%;
        }

        .email-container {
            max-width: 700px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-shadow: 2px 2px 40px 3px #ccc;
        }

        .email-header {
            text-align: center;
        }

        .email-header img {
            max-width: 110px;
            margin-bottom: 15px;
        }

        .email-header h1 {
            color: #c23284;
            font-size: 28px;
            margin: 0;
        }

        .box-email-forgotpassword {
            text-align: center !important;
        }

        .button_access {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            font-size: 16px;
            color: #ffffff !important;
            background-color: #964187;
            text-decoration: none;
            border-radius: 5px;
        }

        .thankyou-footer {
            text-align: center !important;
        }
    </style>
</head>

<body>
    <div class="custom-container">
        <div style="border-collapse:collapse;padding:0;margin:0 auto;width:600px; margin-top: 80px !important;">
            <div class="email-container">
                <div class="email-header">
                    <img src="{{ $message->embed(public_path('client/images/logo.png')) }}" alt="Logo của Nền tảng" />
                    <h1>Đặt vé thành công</h1>
                </div>
                <div class="email-body">
                    <p>Cảm ơn Quý khách đã sử dụng dịch vụ của BKM Cinemas.</p>
                    <p>Ngày, giờ giao dịch:<b>{{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</b></p>
                    <p>Số tiền giao dịch: <b>{{ number_format($data['amount'], 0, '.', ',') }} VND</b></p>

                    <div style="display: flex; justify-content: space-between;">
                        <div>
                            <h3>Thông tin vé</h3>
                            <div>
                                <p>Phim: <b>{{$data['movie_name']}}</b></p>
                                <p>Mã vé:<b>{{$data['code']}}</b></p>
                                <p>Rạp <b>{{$data['cinema_name']}}</b></p>
                                <p>Thời gian chiếu: <b>{{ $data['start_time']->locale('vi')->isoFormat('dddd, [ngày] DD/MM HH:mm') }}</b></p>
                                <p>Phòng chiếu: <b>{{$data['room_name']}}</b></p>
                                <p>Ghế đã chọn: <b>{{$data['seats_number']}}</b></p>
                                <p style="margin-bottom: 0;">Tổng tiền ghế: <b>{{ number_format($data['total_seat'], 0, '.', ',') }} VND</b></p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <h3>Thông tin combo bắp nước</h3>
                                <div>
                                    @foreach ($data['foodsBooking'] as $food)
                                    <p style="margin-bottom: 0;">{{$food['name']}}
                                        <span>
                                            <b>{{ number_format($food['price'], 0, '.', ',') }}₫</b> x
                                            <b>{{ $food['quantity'] }}</b>
                                        </span>
                                    </p>
                                    @endforeach
                                    <p style="margin-bottom: 0;">Tổng tiền đồ ăn: <b>{{ number_format($data['total_food'], 0, '.', ',') }} VND</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Tổng tiền: <b>{{ number_format($data['total'], 0, '.', ',') }} VND</b></h3>
                    <div>
                        <p style="font-family:Verdana,Arial;font-weight:normal">Mọi thắc mắc và góp ý vui lòng liên hệ với bộ
                            phận chăm sóc khách hàng</p>
                        <p style="font-family:Verdana,Arial;font-weight:normal">- Hotline: 1900 6017</p>
                        <p style="font-family:Verdana,Arial;font-weight:normal">- Giờ làm việc: 8:00 - 22:00 (Tất cả các
                            ngày bao gồm cả Lễ Tết)</p>
                        <p style="font-family:Verdana,Arial;font-weight:normal">- Email hỗ trợ: <a
                                href="mailto:hoidap@cgv.vn" style="color:#3696c2" target="_blank">hoidap@cgv.vn</a></p>
                    </div>
                </div>
                <div class="email-footer">
                    <p>Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi tại <a
                            href="mailto:no-reply@bkm.vn">no-reply@bkm.vn</a> hoặc qua điện thoại tại <a
                            href="tel:1900 6017">1900 6017</a>.</p>
                </div>
            </div>
            <div class="thankyou-footer">
                <h5 style="font-family:Verdana,Arial;font-weight:normal;text-align:center;font-size:22px;line-height:32px;margin-bottom:75px;margin-top:30px">Thank you, BKM Cinemas!</h5>
            </div>
        </div>
    </div>
</body>

</html>