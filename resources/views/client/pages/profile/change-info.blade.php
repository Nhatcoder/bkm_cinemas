@extends('client.layouts.main')
@section('title', 'Đổi thông tin')

@section('css')
@endsection

@section('content')
    <div class="container ticket-login account-page">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <ul class="menu">

                    <li class=""><a href="https://touchcinema.com/account">Thành viên</a></li>
                    <li class=""><a href="https://touchcinema.com/account/password">Đổi mật khẩu</a></li>
                    <li class="active"><a href="https://touchcinema.com/account/profile">Đổi thông tin</a></li>
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
                        <h2>Đổi thông tin</h2>
                    </div>
                    <div class="box-body">
                        <form action="https://touchcinema.com/account/profile" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="8NgSRWgOpNjJqEYr8c5Ai8XgUE3bjWfbXBpEgHRS">
                            <div class="form-group">
                                <label for="nickname">Nickname</label>
                                <input disabled="" required="" type="text" value="trannhat29" class="form-control"
                                    id="nickname">
                            </div>
                            <div class="form-group">
                                <label for="fullname">Họ và tên</label>
                                <input required="" type="text" name="fullname" value="Trần Dần" class="form-control"
                                    id="fullname">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input required="" disabled="" type="email" value="nhatcaca2004@gmail.com"
                                    class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" name="phone" value="0971131429" class="form-control" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="birthday">Ngày sinh</label>
                                <input type="text" name="birthday" value="01/01/1995" placeholder="00/00/0000"
                                    class="form-control" id="birthday" maxlength="20">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="user_gender">Giới tính</label>
                                <select id="user_gender" name="sex" class="form-control">
                                    <option value="male" selected="">Nam</option>
                                    <option value="female">Nữ</option>
                                </select>
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
