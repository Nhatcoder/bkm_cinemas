<ul class="nav nav-tabs menu" style="display: flex; flex-direction: column">
    @guest
        <li class="active">
            <a data-toggle="tab" href="#dang-nhap" aria-expanded="true">Đăng nhập</a>
        </li>
        <li class="">
            <a data-toggle="tab" href="#dang-ky" aria-expanded="false">Đăng ký</a>
        </li>
        <li class="">
            <a data-toggle="tab" href="#quen-mat-khau" aria-expanded="false">Quên mật khẩu</a>
        </li>
    @else
        <li class="{{ request('tab') === 'thanhvien' || !request('tab') ? 'active' : '' }}">
            <a data-toggle="tab" href="#thanhvien" aria-expanded="true">Thành viên</a>
        </li>
        <li class="">
            <a data-toggle="tab" href="#doithongtin" aria-expanded="false">Đổi thông tin</a>
        </li>
        <li class="">
            <a data-toggle="tab" href="#doimatkhau" aria-expanded="false">Đổi mật khẩu</a>
        </li>
        <li class="">
            <a data-toggle="tab" href="#tichluydiem" aria-expanded="false">Tích lũy & đổi thưởng</a>
        </li>
        <li class="{{ request('tab') === 'vedadat' ? 'active' : '' }}">
            <a data-toggle="tab" href="#vedadat" aria-expanded="false">Vé đã đặt</a>
        </li>
        <li class="">
            <a data-toggle="tab" href="#lichsugiaodich" aria-expanded="false">Lịch sử giao dịch</a>
        </li>
    @endguest
</ul>
<div class="member-card">
    <img src="{{ asset('client/images/member-card.png') }}" alt="member-card">
</div>
