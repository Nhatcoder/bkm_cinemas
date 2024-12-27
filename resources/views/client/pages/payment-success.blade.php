@extends('client.layouts.main')

@section('title', 'Đặt Vé Thành Công')

@section('css')
<link rel="stylesheet" href="{{ asset('client/css/payment_success.css') }}">
@endsection

@section('content')
<div class="success-container">
    <h1 class="success-title">Đặt Vé Thành Công!</h1>
    <div class="ticket-info text-center">
        <p><strong>Tên phim:</strong> {{$movie->title}}</p>
        <p><strong>Thời gian chiếu:</strong> {{ \Carbon\Carbon::parse($showtime->start_time)->format('d/m/Y - H:i') }}</p>
        <p><strong>Rạp:</strong> {{"$cinema->name $area->name thành phố $city->name"}}</p>
        <p><strong>Ghế:</strong> {{implode(', ', $seatsBooking)}}</p>
    </div>
    <div class="qr-code">
        <p>Mã vé: {{$code}}</p>
    </div>
    <div class="button-group ">
        <a href="{{ route('home') }}" class="button">Về Trang Chủ</a>
        <a style="margin-left: 20px;" href="{{ route('account', ['tab' => 'vedadat']) }}" class="button btn-ticket-view">Thông tin đặt vé</a>
    </div>
</div>
@endsection

@section('js')
@endsection
