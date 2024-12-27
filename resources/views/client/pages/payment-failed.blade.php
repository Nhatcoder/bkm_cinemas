@extends('client.layouts.main')

@section('title', 'Đặt Vé Thành Công')

@section('css')
<link rel="stylesheet" href="{{ asset('client/css/payment_success.css') }}">
@endsection

@section('content')
<div class="success-container">
    <h1 class="success-title">Đặt Vé Thất bại!</h1>
    <div class="button-group ">
        <a href="{{ route('home') }}" class="button">Về Trang Chủ</a>
    </div>
</div>
@endsection

@section('js')
@endsection
