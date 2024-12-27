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
        <div style="border-collapse:collapse;padding:0;margin:0 auto;width:600px; margin-top: 80px !important;">
            <div class="email-container">
                <div class="email-header">
                    <img src="{{ $message->embed(public_path('client/images/logo.png')) }}" alt="Logo của Nền tảng" />
                    <h1>Chào mừng, {{ $user->first_name . ' ' . $user->last_name }},</h1>
                </div>
                <div class="email-body">
                    <p>Cảm ơn bạn đã đăng ký nhận tin thông báo tại BKM Cinemas!</p>
                    <p>Để đăng nhập khi truy cập trang web của chúng tôi, chỉ cần nhấp vào <a href="{{ route('account') }}">Đăng nhập</a> sau đó nhập địa chỉ email và mật khẩu của bạn.</p>
                    <p>Khi bạn đăng nhập vào tài khoản của mình, bạn sẽ có thể thực hiện những thao tác sau:</p>
                    <div>
                        <ul>
                            <li>Tiến hành thanh toán nhanh hơn khi mua hàng</li>
                            <li>Kiểm tra trạng thái đơn hàng</li>
                            <li>Xem các đơn hàng trước đây</li>
                            <li>Thực hiện thay đổi thông tin tài khoản của bạn</li>
                            <li>Thay đổi mật khẩu của bạn</li>
                            <li>Lưu trữ địa chỉ thay thế (để giao hàng cho nhiều thành viên gia đình và bạn bè!)</li>
                        </ul>
                    </div>
                </div>
                <div class="email-footer">
                    <p>Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi tại <a href="mailto:no-reply@bkm.vn">no-reply@bkm.vn</a> hoặc qua điện thoại tại <a href="tel:1900 6017">1900 6017</a>.</p>
                </div>
            </div>
            <div class="thankyou-footer">
                <h5 style="font-family:Verdana,Arial;font-weight:normal;text-align:center;font-size:22px;line-height:32px;margin-bottom:75px;margin-top:30px">Thank you, BKM Cinemas!</h5>
            </div>
        </div>
    </div>
</body>
</html>
