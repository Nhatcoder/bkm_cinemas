@extends('client.layouts.main')
@section('title', 'Liên hệ')
@section('css')
    <style>
        .info{
            display: block;
            text-align: left;
        }
        .info>p{
            font-size: 17px;
        }
    </style>
@endsection

@section('content')
    <div class="page-contact">
        <div class="header-image">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <ul class="nav nav-tabs tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#">Liên hệ</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="lien-he" class="tab-pane fade in active">
                            <form id="contact-form" action="{{ route('submit.contact') }}" method="POST" class="form">
                                <p>Các mục được đánh dấu (*) là bắt buộc</p>
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Họ và tên *" name="contact[full_name]" value="">
                                    <div id="contact_full_name_error" class="mt-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Email *" name="contact[email]" value="">
                                            <div id="contact_email_error" class="mt-2"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Số điện thoại *" name="contact[phone_number]" value="">
                                            <div id="contact_phone_number_error" class="mt-2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Tiêu đề *" name="contact[title]" value="">
                                    <div id="contact_title_error" class="mt-2"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="contact[content]" placeholder="Nội dung *"></textarea>
                                    <div id="contact_content_error" class="mt-2"></div>
                                </div>
                                <div class="center">
                                    <input type="submit" class="submit" id="submit" value="Gửi thư">
                                    <div id="sendding" style="display: none;">
                                        <img height="34" src="https://touchcinema.com/images/loader.gif">
                                        Liên hệ của bạn đang được gửi đi!
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="info">
                        <h1>Thông tin liên hệ</h1>
                        <h2>BKM cinema</h2>
                        {!! $contact->content !!}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
@section('js')
   <script type="module" src="{{ asset('client/js/contact.js') }}"></script>
@endsection
