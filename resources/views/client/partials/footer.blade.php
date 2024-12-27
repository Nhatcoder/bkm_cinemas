<div id="footer" class="mt-4">
    <div id="footer">
        <div class="footer-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-md-6 col-xs-6 footer-item">
                                @if (!empty($customerCare))
                                    <h4 class="footer-title">{{ $customerCare->name }}</h4>
                                    <div class="footer-content">
                                        {!! $customerCare->content !!}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 col-xs-6 connect-us">
                                @if (!empty($connectWithUs))
                                    <h4 class="footer-title">{{ $connectWithUs->name }}</h4>
                                    @if ($connectWithUs->childs->count() > 0)
                                        @foreach ($connectWithUs->childs as $item)
                                            <a href="{{ $item->description }}" target="_blank">
                                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" />
                                            </a>
                                        @endforeach
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 text-right" style="margin-top:10px">

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-4 co-sm-12">
                        <div class="clearfix"></div>
                        <div class="row text-detail">
                            @if (!empty($rightFooter) && $rightFooter->childs->count() > 0)
                                @foreach ($rightFooter->childs()->where('active', 1)->limit(8)->orderBy('order')->get()->chunk(4) as $chunk)
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        @foreach ($chunk as $item)
                                            <a href="{{ route('post.list', $item->slug) }}">{{ $item->name }}</a>
                                        @endforeach
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-6 text-center">
                                    <div class="newsletter" data-toggle="modal" href='#modal-subscribe'>
                                        <img src="{{ asset('client/images/icons/icon-email.png') }}" alt="Email" />
                                        Đăng kí nhận tin
                                    </div>
                                </div>
                            <div class="col-md-6 col-sm-12 col-xs-6 text-center">
                                <a rel="nofollow" target="_blank" href="">
                                    <img class="img-responsive" src="{{ asset('client/images/icons/dathongbao.png') }}"
                                        alt="Touchcinema - Đã thông báo bộ công thương" />
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="bg-left"></div>
                <div class="bg-right"></div>
            </div>
        </div>
        <div class="partner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="item">
                            <img src="{{ asset('client/images/partner-2.png') }}" alt="partner" />
                        </span>
                        <span class="item">
                            <img src="{{ asset('client/images/partner-3.png') }}" alt="partner" />
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="copyright">&copy{{ date('Y') }} BKM Cinema - Mọi quyền được bảo lưu. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-subscribe">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Đăng kí nhận tin</h4>
                </div>
                <div class="modal-body">
                    <div id="subscribe-msg" class="alert alert-danger hidden">
                        <button type="button" class="close emailSubscribe" data-dismiss="alert" aria-hidden="true">&times;</button>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        <input type="email" name="email-subscribe" placeholder="Nhập địa chỉ email..." class="form-control"
                            id="email-subscribe" required>
                    </div>
                    <div id="email_error" class="mt-2"></div>
                </div>
                <div class="modal-footer">
                    <div class="center">
                        <button data-token="{{ csrf_token() }}" data-url="{{ route('emailSubscribe') }}" type="button"
                            class="btn btn-primary btn-email-subscribe">Đăng kí</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
