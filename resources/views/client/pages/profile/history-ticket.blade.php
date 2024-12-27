@extends('client.layouts.main')
@section('title', 'Lịch sử mua vé')

@section('css')
@endsection

@section('content')
    <div class="container ticket-login account-page">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <ul class="menu">

                    <li class=""><a href="https://touchcinema.com/account">Thành viên</a></li>
                    <li class=""><a href="https://touchcinema.com/account/password">Đổi mật khẩu</a></li>
                    <li class=""><a href="https://touchcinema.com/account/profile">Đổi thông tin</a></li>
                    <li class="active"><a href="https://touchcinema.com/account/transaction">Lịch sử mua vé</a></li>
                    <li><a href="javascript:;">Đổi thưởng</a></li>
                    <div class="member-card">
                        <img src="https://touchcinema.com/images/member-card.png" alt="member-card">
                    </div>
                </ul>
            </div>
            <div class="col-md-9 col-sm-9 login-wrap account-wrap">
                <div class="mbox mbox-2">
                    <div class="title">
                        <h2>Lịch sử mua vé</h2>
                    </div>
                    <div class="box-body">
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
