@extends('client.layouts.main')
@section('title', $post->name ?? '')
@section('css')
    {{-- <link rel="stylesheet" href="https://touchcinema.com/statics/frontend/plugins/owl-carousel/assets/owl.carousel.min.css"
        type="text/css" media="all" /> --}}
@endsection

@section('content')
    <div class="container page-post-detail">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                @if ($post)
                    <div class="post-detail">
                        <h1>{{ $post->name }}</h1>
                        <div class="pull-left">
                            <div class="post-meta">
                                Đăng lúc
                                <span>{{ $post->created_at->format('d/m/Y') }}</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="post-content">
                            {!! $post->content ?? 'Đang cập nhật nội dung !' !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endif

                <div class="box-comment">
                    <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop" colorscheme="light"
                         width="100%"
                         data-href="{{ route('post.detail', ['cate_slug' => $cateSlug, 'slug' => $post->slug]) }}"
                         data-numposts="20" fb-xfbml-state="rendered" style="width: 100%;">
                        <span
                            style="vertical-align: bottom; width: 100%; height: 500px;">
                            <iframe name="f55fca7c4c800dd66" width="1000px" height="100px" data-testid="fb:comments Facebook Social Plugin" title="fb:comments Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" style="border: none; visibility: visible; width: 100%; height: 500px;" class=""></iframe>
                        </span>
                    </div>
                </div>
            </div>

            @include('client.components.movie-showing-sidebar')
        </div>
        <div class="clearfix"></div>
        <div class="related-post">
            <h2>Tin liên quan</h2>
            <div class="row">
                @if ($postRelated->isNotEmpty())
                    @foreach ($postRelated as $item)
                        <div class="col-md-3 col-sm-4">
                            <div class="poster">
                                <a href="{{ route('post.detail', ['cate_slug' => $cateSlug, 'slug' => $item->slug]) }}">
                                    <img class="img-responsive" src=" {{ asset($item->avatar) }}"
                                         alt="{{ $item->name }}">
                                </a>
                            </div>
                            <h3>
                                <a href="{{ route('post.detail', ['cate_slug' => $cateSlug, 'slug' => $item->slug]) }}">{{ $item->name }}</a>
                            </h3>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
