@extends('admin.layouts.main')

@section('title', 'Menu - Giao diện')

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="page-titles">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    @include('admin.components.breadcrumbs', [
                        'breadcrumbs' => $breadcrumbs
                    ])
                </nav>
            </div>
        </div>

        <div class="element-area">
            <div class="demo-right">
                <div class="filter cm-content-box box-primary">
                    <div class="content-title SlideToolHeader">
                        <div class="cpa">
                            {{ __('language.admin.interfaces.menus.create') }}
                        </div>
                    </div>
                    <div class="cm-content-body form excerpt">
                        <div class="card-body">
                            <!-- Trang -->
                            <div class="filter cm-content-box box-primary border">
                                <div class="content-title SlideToolHeader border-0">
                                    <div class="cpa">
                                        {{ __('language.admin.interfaces.menus.pages.title') }}
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:void(0);" class="handle expand">
                                            <i class="fa-solid fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="cm-content-body form excerpt border-top">
                                    <div class="col-xl-12">
                                        <div class="card dz-card">
                                            <div class="card-header flex-wrap border-0" id="default-tab">
                                                <h4 class="card-title"></h4>
                                            </div>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel"
                                                     aria-labelledby="home-tab">
                                                    <div class="card-body pt-0">
                                                        <!-- Nav tabs -->
                                                        <div class="default-tab">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                <li class="nav-item" role="presentation">
                                                                    <a class="nav-link tab-menus active"
                                                                       data-bs-toggle="tab"
                                                                       href="#page"
                                                                       aria-selected="false" role="tab" tabindex="-1">
                                                                        <i class="fa-solid fa-fire"></i>
                                                                        {{ __('language.admin.interfaces.menus.pages.list') }}</a>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content tab-menus-border">
                                                                <div class="tab-pane fade active show" id="page"
                                                                     role="tabpanel">
                                                                    <div style="padding: 1rem 1rem 0 1rem">
                                                                        <div class="menu-tabs">
                                                                            @if(!$pages->isEmpty())
                                                                                @foreach($pages as $page)
                                                                                    <div class="form-check">
                                                                                        <input data-id="{{ $page->id }}"
                                                                                               data-type="0"
                                                                                               class="form-check-input"
                                                                                               type="checkbox">
                                                                                        <label class="form-check-label"
                                                                                               for="flexCheckDefault">
                                                                                            {{ $page->name }}
                                                                                        </label>
                                                                                    </div>
                                                                                @endforeach
                                                                            @else
                                                                                <div class="d-flex justify-content-center align-items-center p-3">
                                                                                    <p>{{ __('language.admin.interfaces.menus.pages.notFound') }}</p>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div style="padding: 1rem 0 0 1rem">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-check custom-checkbox mb-3">
                                                                        <input type="checkbox" class="form-check-input checkbox_all" required="">
                                                                        <label class="form-check-label"
                                                                               style="text-overflow: ellipsis; white-space: nowrap; display: inline-block; overflow: hidden; width: 300px;"
                                                                               for="customCheckBox1">{{ __('language.admin.interfaces.menus.pages.checkAll') }}</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="custom-checkbox mb-3 text-end">
                                                                        @can('create', App\Models\Menu::class)
                                                                            <button class="btn btn-sm btn-outline-primary btn-add-menu">
                                                                                {{ __('language.admin.interfaces.menus.posts.add') }}
                                                                            </button>
                                                                        @endcan
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Trang -->

                            <!-- Danh mục Bài viết -->
                            <div class="filter cm-content-box box-primary border">
                                <div class="content-title border-0 SlideToolHeader collapse">
                                    <div class="cpa">
                                        {{ __('language.admin.interfaces.menus.categoryPosts.title') }}
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:void(0);" class="handle collapse"><i
                                                class="fa-solid fa-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="cm-content-body form excerpt border-top" style="display: none;">
                                    <div class="col-xl-12">
                                        <div class="card dz-card">
                                            <div class="card-header flex-wrap border-0" id="default-tab">
                                                <h4 class="card-title"></h4>
                                            </div>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel"
                                                     aria-labelledby="home-tab">
                                                    <div class="card-body pt-0">
                                                        <!-- Nav tabs -->
                                                        <div class="default-tab">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                <li class="nav-item" role="presentation">
                                                                    <a class="nav-link tab-menus active"
                                                                       data-bs-toggle="tab"
                                                                       href="#post"
                                                                       aria-selected="false" role="tab" tabindex="-1">
                                                                        <i class="fa-solid fa-fire"></i>
                                                                        {{ __('language.admin.interfaces.menus.categoryPosts.list') }}</a>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content tab-menus-border">
                                                                <div class="tab-pane fade active show" id="post"
                                                                     role="tabpanel">
                                                                    <div style="padding: 1rem 1rem 0 1rem">
                                                                        <div class="menu-tabs">
                                                                            @if(!$categoryPosts->isEmpty())
                                                                                @foreach($categoryPosts as $cate)
                                                                                    <div class="form-check">
                                                                                        <input data-id="{{ $cate->id }}"
                                                                                               data-type="1"
                                                                                               class="form-check-input"
                                                                                               type="checkbox">
                                                                                        <label class="form-check-label"
                                                                                               style="text-overflow: ellipsis; white-space: nowrap; display: inline-block; overflow: hidden; width: 300px;"
                                                                                               for="flexCheckDefault">
                                                                                            {{ $cate->name }}
                                                                                        </label>
                                                                                    </div>
                                                                                @endforeach
                                                                            @else
                                                                                <div class="d-flex justify-content-center align-items-center p-3">
                                                                                    <p>{{ __('language.admin.interfaces.menus.categoryPosts.notFound') }}</p>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div style="padding: 1rem 0 0 1rem">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-check custom-checkbox mb-3">
                                                                        <input type="checkbox" class="form-check-input checkbox_all" required="">
                                                                        <label class="form-check-label"
                                                                               for="customCheckBox1">{{ __('language.admin.interfaces.menus.categoryPosts.checkAll') }}</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="custom-checkbox mb-3 text-end">
                                                                        @can('create', App\Models\Menu::class)
                                                                            <button class="btn btn-sm btn-outline-primary btn-add-menu">
                                                                                {{ __('language.admin.interfaces.menus.categoryProducts.add') }}
                                                                            </button>
                                                                        @endcan
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Danh mục Bài viết -->

                            <!-- Bài viết -->
                            <div class="filter cm-content-box box-primary border">
                                <div class="content-title border-0 SlideToolHeader collapse">
                                    <div class="cpa">
                                        {{ __('language.admin.interfaces.menus.posts.title') }}
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:void(0);" class="handle collapse"><i
                                                class="fa-solid fa-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="cm-content-body form excerpt border-top" style="display: none;">
                                    <div class="col-xl-12">
                                        <div class="card dz-card">
                                            <div class="card-header flex-wrap border-0" id="default-tab">
                                                <h4 class="card-title"></h4>
                                            </div>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel"
                                                     aria-labelledby="home-tab">
                                                    <div class="card-body pt-0">
                                                        <!-- Nav tabs -->
                                                        <div class="default-tab">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                <li class="nav-item" role="presentation">
                                                                    <a class="nav-link tab-menus active"
                                                                       data-bs-toggle="tab"
                                                                       href="#post"
                                                                       aria-selected="false" role="tab" tabindex="-1">
                                                                        <i class="fa-solid fa-fire"></i>
                                                                        {{ __('language.admin.interfaces.menus.posts.list') }}</a>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content tab-menus-border">
                                                                <div class="tab-pane fade active show" id="post"
                                                                     role="tabpanel">
                                                                    <div style="padding: 1rem 1rem 0 1rem">
                                                                        <div class="menu-tabs">
                                                                            @if(!$posts->isEmpty())
                                                                                @foreach($posts as $post)
                                                                                    <div class="form-check">
                                                                                        <input data-id="{{ $post->id }}"
                                                                                               data-type="2"
                                                                                               class="form-check-input"
                                                                                               type="checkbox">
                                                                                        <label class="form-check-label"
                                                                                               style="text-overflow: ellipsis; white-space: nowrap; display: inline-block; overflow: hidden; width: 300px;"
                                                                                               for="flexCheckDefault">
                                                                                            {{ $post->name }}
                                                                                        </label>
                                                                                    </div>
                                                                                @endforeach
                                                                            @else
                                                                                <div class="d-flex justify-content-center align-items-center p-3">
                                                                                    <p>{{ __('language.admin.interfaces.menus.posts.notFound') }}</p>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div style="padding: 1rem 0 0 1rem">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-check custom-checkbox mb-3">
                                                                        <input type="checkbox" class="form-check-input checkbox_all" required="">
                                                                        <label class="form-check-label"
                                                                               for="customCheckBox1">{{ __('language.admin.interfaces.menus.posts.checkAll') }}</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="custom-checkbox mb-3 text-end">
                                                                        @can('create', App\Models\Menu::class)
                                                                            <button class="btn btn-sm btn-outline-primary btn-add-menu">
                                                                                {{ __('language.admin.interfaces.menus.products.add') }}
                                                                            </button>
                                                                        @endcan
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Bài viết -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="demo-view">
                <div class="container-fluid pt-0 ps-0 pe-lg-4 pe-0">
                    <div class="row">
                        <div class="col-xl-12">
                            <form action="{{ route('admin.menus.store') }}" method="post">
                                @csrf
                                <div class="card dz-card">
                                    <div class="card-header flex-wrap border-0"
                                         style="border-bottom: 1px solid #e6e6e6 !important;" id="default-tab">
                                        <h4 class="card-title">{{ __('language.admin.interfaces.menus.title') }}</h4>
                                    </div>
                                    <div class="card h-auto">
                                        <div style="padding: 1.875rem 1.875rem 0 1.875rem;">
                                            <div class="row"
                                                 style="padding-bottom: 39px;border-bottom: 1px solid #e6e6e6 !important;">
                                                <div class="col-md-6">
                                                    <div class="card-content">
                                                        <div class="nestable">
                                                            <div class="dd" id="nestable">
                                                                <ol class="dd-list" id="menu-items">
                                                                    @if(!$menus->isEmpty())
                                                                        @foreach($menus as $menu)
                                                                            <li class="accordion-item dd-item menu-ac-item" data-id="{{ $menu->id }}">
                                                                                <div class="accordion-header position-relative">
                                                                                    <div class="move-media dd-handle">
                                                                                        <i class="fa-solid fa-arrows-up-down-left-right"></i>
                                                                                    </div>
                                                                                    <button class="accordion-button btnLabel collapsed" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; display: inline-block;" data-id="{{ $menu->id }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $menu->id }}" aria-expanded="true" aria-controls="collapseOne__id__">
                                                                                        {{ $menu->name ?? '' }}
                                                                                    </button>
                                                                                </div>
                                                                                <div id="collapseOne{{ $menu->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                                                                                    <div class="accordion-body">
                                                                                        <div class="row">
                                                                                            <div class="col-xl-12">
                                                                                                <div class="mb-3">
                                                                                                    <label class="form-label">{{ __('language.admin.interfaces.menus.navigation_labels') }}</label>
                                                                                                    <input type="text" class="form-control title_url" data-id="{{ $menu->id }}" id="title_url{{ $menu->id }}" value="{{ $menu->name ?? '' }}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xl-12">
                                                                                                <div class="mb-3">
                                                                                                    <label class="form-label">{{  __('language.admin.interfaces.menus.slug')}}</label>
                                                                                                    <input type="text" class="form-control slug_menu" data-id="{{ $menu->id }}" id="slug_menu{{ $menu->id }}" value="{{ $menu->slug ?? '' }}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xl-12">
                                                                                                <div class="mb-3">
                                                                                                    <label class="form-label">{{  __('language.admin.interfaces.menus.url')}}</label>
                                                                                                    <input type="text" class="form-control url_menu" value="{{ $menu->url ?? '' }}">
                                                                                                </div>
                                                                                            </div>

                                                                                            <input type="hidden" class="form-control record_id" value="{{ $menu->record_id ?? '' }}">

                                                                                            <input type="hidden" class="form-control type_menu" value="{{ $menu->type ?? '' }}">

                                                                                            <div class="d-flex align-items-center">
                                                                                                @can('delete', App\Models\Menu::class)
                                                                                                    <a class="text-hover remove-menu-item remove" href="javascript:void(0);">{{  __('language.admin.interfaces.menus.deleteMenuItem')}}</a>
                                                                                                    <span class="mx-2">|</span>
                                                                                                @endcan

                                                                                                <a class="text-hover cancel" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $menu->id }}" aria-expanded="true" aria-controls="collapseOne">
                                                                                                    {{  __('language.admin.interfaces.menus.cancel')}}
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @if(count($menu->childrenRecursive) > 0)
                                                                                    @include('admin.components.menu-child', [
                                                                                        'children' => $menu->childrenRecursive
                                                                                    ])
                                                                                @endif
                                                                            </li>
                                                                        @endforeach
                                                                    @endif
                                                                </ol>
                                                            </div>
                                                            <script type="text/template" id="menu-item-template">
                                                                <li class="accordion-item dd-item menu-ac-item" data-id="__id__">
                                                                    <div class="accordion-header position-relative">
                                                                        <div class="move-media dd-handle">
                                                                            <i class="fa-solid fa-arrows-up-down-left-right"></i>
                                                                        </div>
                                                                        <button class="accordion-button btnLabel collapsed" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; display: inline-block;" data-type="__type__" data-id="__id__" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne__id__" aria-expanded="true" aria-controls="collapseOne__id__">
                                                                            __name__
                                                                        </button>
                                                                    </div>
                                                                    <div id="collapseOne__id__" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                                                                        <div class="accordion-body">
                                                                            <div class="row">
                                                                                <div class="col-xl-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label">{{  __('language.admin.interfaces.menus.navigation_labels')}}</label>
                                                                                        <input type="text" class="form-control title_url" data-id="__id__" id="title_url__id__" value="__name__">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label">{{  __('language.admin.interfaces.menus.slug')}}</label>
                                                                                        <input type="text" class="form-control slug_menu" data-id="__id__" id="slug_menu__id__" value="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label">{{  __('language.admin.interfaces.menus.url')}}</label>
                                                                                        <input type="text" class="form-control url_menu" value="">
                                                                                    </div>
                                                                                </div>

                                                                                <input type="hidden" class="form-control record_id" value="__recordId__">

                                                                                <input type="hidden" class="form-control type_menu" value="__type__">

                                                                                <div class="d-flex align-items-center">
                                                                                    <a class="text-hover remove-menu-item remove" href="javascript:void(0);">{{  __('language.admin.interfaces.menus.deleteMenuItem')}}</a>
                                                                                    <span class="mx-2">|</span>
                                                                                    <a class="text-hover cancel" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseOne__id__" aria-expanded="true" aria-controls="collapseOne">
                                                                                        {{  __('language.admin.interfaces.menus.cancel')}}
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card h-auto">
                                        <div class="row" style="padding-left: 1.875rem;">
                                            <div class="d-flex flex-start">
                                                <div class="custom-checkbox text-end">
                                                    @can('save', App\Models\Menu::class)
                                                        <button data-url="{{  route('admin.menus.store')}}" data-image="{{ asset('client/images/hand.png') }}" data-error="{{ asset('client/images/no-hand.png') }}" class="btn btn-primary btn-save-menu">
                                                            {{ __('language.admin.interfaces.menus.save') }}
                                                        </button>
                                                    @endcan
                                                    @can('delete', App\Models\Menu::class)
                                                        <a href="{{ route('admin.menus.delete') }}" class="text-red btnDeleteMenu" style="margin-left: 10px;">{{ __('language.admin.interfaces.menus.delete') }}</a>
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin/menus/menu.js') }}"></script>
    <script src="{{ asset('js/admin/ajaxs/save-menu.js') }}"></script>
@endsection
