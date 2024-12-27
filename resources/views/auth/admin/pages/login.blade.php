@extends('auth.admin.layouts.main')

@section('title', __('language.admin.titleAuth'))

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 align-self-start">
            <div class="account-info-area" style="background-image: url({{ asset('images/logo.png') }})">
                <div class="login-content">
                    <h1 class="title">{{ __('language.admin.bivaco') }}</h1>
                    <marquee class="text" behavior="scroll" direction="left" scrollamount="5">{{ __('language.admin.descriptionAuth') }}</marquee>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-7 col-sm-12 mx-auto align-self-center">
            <div class="login-form">
                <div class="login-head">
                    <h3 class="title">{{  __('language.admin.titleAuth')}}</h3>
                    <p>{{  __('language.admin.instruct')}}</p>
                </div>
                <h6 class="login-title"><span>{{  __('language.admin.login')}}</span></h6>
                <form action="{{ route('admin.loginSubmit') }}" id="formLogin" class="formLogin" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-4 position-relative" style="margin-bottom: 40px !important;">
                        <div class="mb-2">
                            <label class="mb-1 form-label required">{{ __('language.admin.email') }}</label>
                            <input type="email" name="email" class="form-control emailInput" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <span class="text-red errorForm position-absolute">
                                {{ $message }}
                            </span>
                        @enderror
                        <span class="text-red errorFormEmail position-absolute"></span>
                    </div>

                    <div class="mb-4 position-relative" style="margin-bottom: 40px !important;">
                        <div class="mb-2 position-relative">
                            <label class="mb-1 form-label required">{{ __('language.admin.password') }}</label>
                            <input type="password" name="password" id="dlab-password" class="form-control passwordInput" value="{{ old('password') }}">
                            <span class="show-pass eye">
                                <i class="fa fa-eye-slash"></i>
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>
                        @error('password')
                            <span class="text-red errorForm position-absolute">
                                {{ $message }}
                            </span>
                        @enderror
                        <span class="text-red errorFormPassword position-absolute"></span>
                    </div>
                    <div class="text-center mb-4">
                        <button type="submit" class="btn btn-primary btn-block btn-login">{{  __('language.admin.login')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin/auth/login.js') }}"></script>
@endsection
