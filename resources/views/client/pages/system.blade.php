@extends('client.layouts.main')
@section('title', $system->name)
@section('css')
@endsection

@section('content')
    <div class="container page-post-detail">
        <div class="row">
            <div class="col-md-12">
                <div class="post-detail">
                    <h1>{{ $system->name }}</h1>
                    <div class="clearfix"></div>
                    <div class="post-content">
                        {!! $system->content ?? 'Đang cập nhật nội dung !' !!}
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="box-comment">
                    
                </div>
            </div>
        </div>
    </div>

@endsection
