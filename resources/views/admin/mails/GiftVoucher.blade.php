<!DOCTYPE html>
<html>
<head>
    <title>Chào mừng đến với Nền tảng của chúng tôi</title>
    <style>
        body, html {
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

        .thankyou-footer {
            text-align: center !important;
        }
    </style>
</head>
<body>
    <div class="custom-container">
        <div style="border-collapse: collapse; padding: 0; margin: 0 auto; width: 600px; margin-top: 80px !important;">
            <div class="email-container">
                <!-- Header -->
                <div class="email-header">
                    <img src="{{ $message->embed(public_path('client/images/logo.png')) }}" alt="Logo của Nền tảng" />
                    <h1>🎉 Chào mừng, {{ $user->name }}</h1>
                </div>

                <!-- Body -->
                <div class="email-body">
                    <p>Bạn vừa nhận được voucher tại BKM Cinemas!</p>
                    <p>Xin chào <strong>{{ $user->name }} ({{ $user->email }})</strong>,</p>
                    <p>Bạn vừa nhận được một mã giảm giá. Dưới đây là chi tiết mã giảm giá:</p>

                    <!-- Voucher Details -->
                    <ul>
                        <li>Tên mã giảm giá: <strong><a href="{{ route('account') }}">{{ $voucher->name }}</a></strong></li>
                        <li>Mã giảm giá: <strong><a href="{{ route('account') }}">{{ $voucher->code }}</a></strong></li>
                        <li>Giá trị giảm:
                            @if ($voucher->discount_type == 'money')
                                {{ number_format($voucher->discount_value, 0, ',', '.') }} VNĐ
                            @else
                                {{ $voucher->discount_value }}%
                            @endif
                        </li>
                        @php
                            use Carbon\Carbon;
                        @endphp
                        <li>Ngày bắt đầu: <strong>{{ Carbon::parse($voucher->start_date)->format('d/m/Y H:i') }}</strong></li>
                        <li>Ngày kết thúc: <strong>{{ Carbon::parse($voucher->end_date)->format('d/m/Y H:i') }}</strong></li>
                    </ul>
                </div>

                <!-- Footer -->
                <div class="email-footer">
                    <p>Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi tại <a href="mailto:no-reply@bkm.vn">no-reply@bkm.vn</a> hoặc qua điện thoại tại <a href="tel:1900 6017">1900 6017</a>.</p>
                </div>
            </div>

            <div class="thankyou-footer">
                <h5 style="font-family: Verdana, Arial; font-weight: normal; text-align: center; font-size: 22px; line-height: 32px; margin-bottom: 75px; margin-top: 30px;">Thank you, BKM Cinemas!</h5>
            </div>
        </div>
    </div>
</body>
</html>
