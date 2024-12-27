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
                    <h1>Thông báo liên hệ</h1>
                </div>
                <div class="email-body">
                    <p>Xin chào Quản trị viên,</p>
                    <p>Người dùng đã gửi thông tin liên hệ thông qua hệ thống của bạn với nội dung như sau:</p>
                    <div style="margin-left: 20px;">
                        <p><b>Họ và tên:</b> {{ $user->full_name }}</p>
                        <p><b>Email:</b> {{ $user->email }}</p>
                        <p><b>Số điện thoại:</b> {{ $user->phone_number }}</p>
                        <p><b>Nội dung:</b> {{ $user->content }}</p>
                    </div>
                    <p style="margin-top: 20px;">Vui lòng kiểm tra và phản hồi cho người dùng trong thời gian sớm nhất.</p>
                </div>
                <div class="email-footer">
                    <p>Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi tại <a
                            href="mailto:support@bkm.vn">support@bkm.vn</a>.</p>
                </div>
            </div>
            <div class="thankyou-footer">
                <h5 style="font-family:Verdana,Arial;font-weight:normal;text-align:center;font-size:18px;line-height:28px;margin-bottom:40px;margin-top:30px">
                    Trân trọng,<br />Hệ thống hỗ trợ BKM Cinemas</h5>
            </div>
        </div>
    </div>
</body>

</html>
