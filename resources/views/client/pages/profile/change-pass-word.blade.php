@extends('client.layouts.main')
@section('title', 'Đổi mật khẩu')

@section('css')
@endsection

@section('content')
    <div class="container ticket-login account-page">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <ul class="menu">

                    <li class=""><a href="https://touchcinema.com/account">Thành viên</a></li>
                    <li class="active"><a href="https://touchcinema.com/account/password">Đổi mật khẩu</a></li>
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
                        <h2>Đổi mật khẩu</h2>
                    </div>
                    <div class="box-body">
                        <form action="https://touchcinema.com/account/password" method="POST">
                            <input type="hidden" name="_token" value="8NgSRWgOpNjJqEYr8c5Ai8XgUE3bjWfbXBpEgHRS">
                            <div class="form-group">
                                <label for="old-password">Mật khẩu hiện tại</label>
                                <input required="" type="password" name="current_password" value=""
                                    autocomplete="false" class="form-control" id="old-password">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu mới</label>
                                <input required="" type="password" name="password" value="" autocomplete="false"
                                    class="form-control" id="password">
                            </div>
                            <div class="form-group">
                                <label for="re-password">Nhập lại mật khẩu mới</label>
                                <input required="" type="password" name="re_password" value="" autocomplete="false"
                                    class="form-control" id="re-password">
                            </div>
                            <div class="center">
                                <input type="submit" name="submit" value="Lưu" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection