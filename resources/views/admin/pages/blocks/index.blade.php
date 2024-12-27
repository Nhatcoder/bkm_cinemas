@extends('admin.layouts.main')

@section('title', __('language.admin.interfaces.blocks.list'))

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

        <div class="card p-0 rounded-0 file_area mb-0">
            <div class="row gx-0">
                <!--column-->
                <div class="col-xl-2 col-xxl-3">
                    @include('admin.components.sidebar-left-body', [
                        'pages' => $pages,
                        'blockTypes' => $blockTypes,
                    ])
                </div>
                <!--/column-->
                <!--column-->
                <div class="col-xl-10 col-xxl-9">
                    <!--row-->
                    <div class="row gx-0">
                        <!--column-->
                        <div class="col-xl-12">
                            <div class="file-drive">
                                <div class="card-body p-3">
                                    <!--row-->
                                    <div class="row gx-0">
                                        <!--column-->
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="drive">
                                                <div class="dz-folder">
                                                    <svg xmlns="http://www.w3.org/2000/svg" with="35px" height="35px"
                                                         stroke="#1B87FF" fill="#1B87FF" viewBox="0 0 512 512">
                                                        <path
                                                            d="M234.5 5.7c13.9-5 29.1-5 43.1 0l192 68.6C495 83.4 512 107.5 512 134.6l0 242.9c0 27-17 51.2-42.5 60.3l-192 68.6c-13.9 5-29.1 5-43.1 0l-192-68.6C17 428.6 0 404.5 0 377.4L0 134.6c0-27 17-51.2 42.5-60.3l192-68.6zM256 66L82.3 128 256 190l173.7-62L256 66zm32 368.6l160-57.1 0-188L288 246.6l0 188z"/>
                                                    </svg>
                                                </div>
                                                <div class="drive-content">
                                                    <h5>{{ __('language.admin.interfaces.blocks.have') }}
                                                        : {{ $countBlock }} {{ __('language.admin.interfaces.blocks.block_sample') }}</h5>
                                                    <div class="progress default-progress">
                                                        <div class="progress-bar bg-vigit progress-animated bg-primary"
                                                             style="width: {{ $countBlock }}%; height:100%;"
                                                             role="progressbar">
                                                            <span class="sr-only">{{ $countBlock }}% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/column-->
                                    </div>
                                    <!--row-->
                                </div>
                            </div>
                        </div>
                        <!--column-->

                        <!--column-->
                        <div class="col-xl-12">
                            <div class="file-header">
                                @include('admin.components.breadcrumb-and-search')
                            </div>
                        </div>
                        <!--/column-->

                        <!--column-->
                        <div class="col-xl-12">
                            @if (!$blocks->isEmpty())
                                <ul class="folder-structure dlab-scroll grid" id="folder">
                                    @foreach ($blocks as $key => $block)
                                        <li>
                                            <div class="file-list">
                                                <div class="dz-media">
                                                    <svg xmlns="http://www.w3.org/2000/svg" with="35px" height="35px"
                                                         stroke="#1B87FF" fill="#1B87FF" viewBox="0 0 512 512">
                                                        <path
                                                            d="M234.5 5.7c13.9-5 29.1-5 43.1 0l192 68.6C495 83.4 512 107.5 512 134.6l0 242.9c0 27-17 51.2-42.5 60.3l-192 68.6c-13.9 5-29.1 5-43.1 0l-192-68.6C17 428.6 0 404.5 0 377.4L0 134.6c0-27 17-51.2 42.5-60.3l192-68.6zM256 66L82.3 128 256 190l173.7-62L256 66zm32 368.6l160-57.1 0-188L288 246.6l0 188z"/>
                                                    </svg>
                                                </div>
                                                <div class="dz-info">
                                                    <a @can('update', $block)
                                                           href="{{ route('admin.blocks.edit', $block->id) }}"
                                                        @endcan>
                                                        <h6 class="mb-0">{{ $block->name }}</h6>
                                                    </a>
                                                    <div class="mt-1 d-flex justify-content-center align-items-center">
                                                        @can('update', $block)
                                                            <a href="{{ route('admin.blocks.edit', $block->id) }}"
                                                               class="text-hover">{{ __('language.admin.interfaces.blocks.quick_fix') }}</a>
                                                        @endcan
                                                        @can('delete', $block)
                                                            <form action="{{ route('admin.blocks.delete', $block->id) }}"
                                                                  class="formDelete" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="text-hover bt-form btnDelete">{{ __('language.admin.interfaces.blocks.delete') }}</button>
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="d-flex justify-content-center align-items-center"
                                     style="padding: 18rem !important;">
                                    <div>
                                        <h3 class="text-center">{{ request()->name ? __('language.admin.interfaces.blocks.notFound') . request()->name : __('language.admin.interfaces.blocks.noData') }}</h3>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!--column-->
                        <div class="col-xl-12">
                            <div class="table-pagenation">
                                <nav class="w-100">
                                    {{ $blocks->links('pagination::bootstrap-4') }}
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <!--/column-->
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            @if ($errors->any())
            $('#modalAddBlock').modal('show');
            @endif
        });
    </script>
@endsection
