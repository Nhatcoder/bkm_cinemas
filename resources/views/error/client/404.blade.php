@extends('client.layouts.main')

@section('title', 'Trang không tồn tại')

@section('css')
    <style>
        .pagenotfound {
            padding: 50px 0;
            background: #FFF;
            text-align: center;
            color: #000;
            font-size: 16px;
        }

        .font404 {
            font-size: 70px;
            color: #ea3b92;
            display: block;
        }

        .notfound {
            font-size: 40px;
            color: #ea3b92;
            margin-bottom: 40px;
            display: block;
        }

        .search a {
            display: inline-block;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 10px 30px;
            border-radius: 22px;
            background: #ea3b92;
            color: #FFF;
        }
    </style>
@endsection

@section('content')
    <div class="pagenotfound">
        <span class="font404">Error 404</span>
        <span class="notfound">Không tìm thấy dấu vết</span>
        <div class="search">
            <a href="{{ route('home') }}">Trở về trang chủ</a>
        </div>
    </div>
@endsection

@section('js')
@endsection
