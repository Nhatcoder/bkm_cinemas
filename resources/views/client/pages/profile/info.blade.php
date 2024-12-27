@extends('client.layouts.main')
@section('title', 'Khuyễn mãi')

@section('css')
@endsection

@section('content')
    <div class="container ticket-login account-page">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <ul class="menu">

                    <li class="active"><a href="https://touchcinema.com/account">Thành viên</a></li>
                    <li class=""><a href="https://touchcinema.com/account/password">Đổi mật khẩu</a></li>
                    <li class=""><a href="https://touchcinema.com/account/profile">Đổi thông tin</a></li>
                    <li class=""><a href="https://touchcinema.com/account/transaction">Lịch sử mua vé</a></li>
                    <li><a href="javascript:;">Đổi thưởng</a></li>
                    <div class="member-card">
                        <img src="https://touchcinema.com/images/member-card.png" alt="member-card">
                    </div>
                </ul>
            </div>
            <div class="col-md-9 col-sm-9 login-wrap account-wrap">
                <div class="mbox mbox-2">
                    <div class="title">
                        <h2>Thông tin tài khoản</h2>
                    </div>
                    <div class="box-body">
                        <div class="account-group">
                            <div class="avatar" id="current-avatar">
                                <img src="https://lh3.googleusercontent.com/a/ACg8ocJ0DSz_GDjnfix_87kgjKwDdGpjB_yHFo8f1eDDIy60h2xlaZg=s96-c"
                                    alt="trannhat29" class="img-responsive img-circle">
                                <a href="javascript:;" id="change-avatar">Đổi ảnh đại diện</a>
                            </div>
                            <div class="account-info">
                                <p style="color: #dc0000;font-weight: normal;">Bạn cần xác thực số điện thoại để xem chính
                                    xác thông tin </p>
                                <p>Họ tên: Trần Dần <small class="level">Touch Member</small></p>
                                <p>Email: nhatcaca2004@gmail.com</p>
                                <p>SĐT:
                                    0971131429
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                    <a href="javascript:;" title="Tài khoản chưa được xác thực" class="no-verify"
                                        id="verify">
                                        Xác thực SMS
                                    </a>
                                </p>
                                <p>Mã thành viên:
                                    <a href="https://touchcinema.com/account/touch" title="Liên kết thẻ khác"
                                        class="no-verify">
                                        Liên kết thẻ khác
                                    </a>
                                </p>
                                <p>Điểm tích lũy: <span class="point">0</span></p>
                                <p>EXP: <span class="point">0</span></p>
                                <p>Tổng chi tiêu: <span class="point">0</span></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body" style="border-top: none">
                        <h3>Giao dịch gần nhất</h3>
                        <div class="clearfix"></div>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Chưa có giao dịch nào
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
