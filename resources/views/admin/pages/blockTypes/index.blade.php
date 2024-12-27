@extends('admin.layouts.main')

@section('title', __('language.admin.interfaces.blockTypes.list'))

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
                    <div class="row  gx-0">
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="35"
                                                         height="40" viewBox="0 0 512 512">
                                                        <path fill="#1B87FF" stroke="#1B87FF"
                                                              d="M260.4 254.9 131.5 33.1a2.2 2.2 0 0 0 -3.8 0L.3 254.9A2.2 2.2 0 0 0 .3 257.1L129.1 478.9a2.2 2.2 0 0 0 3.8 0L260.4 257.1A2.2 2.2 0 0 0 260.4 254.9zm39.1-25.7a2.2 2.2 0 0 0 1.9 1.1h66.5a2.2 2.2 0 0 0 1.9-3.3L259.1 33.1a2.2 2.2 0 0 0 -1.9-1.1H190.7a2.2 2.2 0 0 0 -1.9 3.3zM511.7 254.9 384.9 33.1A2.2 2.2 0 0 0 383 32h-66.6a2.2 2.2 0 0 0 -1.9 3.3L440.7 256 314.5 476.7a2.2 2.2 0 0 0 1.9 3.3h66.6a2.2 2.2 0 0 0 1.9-1.1L511.7 257.1A2.2 2.2 0 0 0 511.7 254.9zM366 284.9H299.5a2.2 2.2 0 0 0 -1.9 1.1l-108.8 190.6a2.2 2.2 0 0 0 1.9 3.3h66.5a2.2 2.2 0 0 0 1.9-1.1l108.8-190.6A2.2 2.2 0 0 0 366 284.9z"/>
                                                    </svg>
                                                </div>
                                                <div class="drive-content">
                                                    <h5>{{ __('language.admin.interfaces.blockTypes.have') }}
                                                        : {{ $countBlockType }} {{ __('language.admin.interfaces.blockTypes.blockType_sample') }}</h5>
                                                    <div class="progress default-progress">
                                                        <div class="progress-bar bg-vigit progress-animated bg-primary"
                                                             style="width: {{ $countBlockType }}%; height:100%;"
                                                             role="progressbar">
                                                            <span class="sr-only">{{ $countBlockType }}% Complete</span>
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
                            @if(!$blockTypes->isEmpty())
                                <ul class="folder-structure dlab-scroll grid" id="folder">
                                    @foreach($blockTypes as $key => $blockType)
                                        <li>
                                            <div class="file-list">
                                                <div class="dz-media">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="35"
                                                         height="40" viewBox="0 0 512 512">
                                                        <path fill="#1B87FF" stroke="#1B87FF"
                                                              d="M260.4 254.9 131.5 33.1a2.2 2.2 0 0 0 -3.8 0L.3 254.9A2.2 2.2 0 0 0 .3 257.1L129.1 478.9a2.2 2.2 0 0 0 3.8 0L260.4 257.1A2.2 2.2 0 0 0 260.4 254.9zm39.1-25.7a2.2 2.2 0 0 0 1.9 1.1h66.5a2.2 2.2 0 0 0 1.9-3.3L259.1 33.1a2.2 2.2 0 0 0 -1.9-1.1H190.7a2.2 2.2 0 0 0 -1.9 3.3zM511.7 254.9 384.9 33.1A2.2 2.2 0 0 0 383 32h-66.6a2.2 2.2 0 0 0 -1.9 3.3L440.7 256 314.5 476.7a2.2 2.2 0 0 0 1.9 3.3h66.6a2.2 2.2 0 0 0 1.9-1.1L511.7 257.1A2.2 2.2 0 0 0 511.7 254.9zM366 284.9H299.5a2.2 2.2 0 0 0 -1.9 1.1l-108.8 190.6a2.2 2.2 0 0 0 1.9 3.3h66.5a2.2 2.2 0 0 0 1.9-1.1l108.8-190.6A2.2 2.2 0 0 0 366 284.9z"/>
                                                    </svg>
                                                </div>
                                                <div class="dz-info">
                                                    <a @can('update', $blockType)
                                                           href="{{ route('admin.blockTypes.edit', $blockType->id) }}"
                                                        @endcan>
                                                        <h6 class="mb-0">{{ $blockType->name }}</h6>
                                                    </a>
                                                    <div class="mt-1 d-flex justify-content-center align-items-center">
                                                        @can('update', $blockType)
                                                            <a href="{{ route('admin.blockTypes.edit', $blockType->id) }}"
                                                               class="text-hover">{{ __('language.admin.interfaces.blockTypes.quick_fix') }}</a>
                                                        @endcan
                                                        @can('delete', $blockType)
                                                            <form
                                                                action="{{ route('admin.blockTypes.delete', $blockType->id) }}"
                                                                class="formDelete" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button
                                                                    class="text-hover bt-form btnDelete">{{ __('language.admin.interfaces.blockTypes.delete') }}</button>
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
                                        <h3 class="text-center">{{ request()->name ? __('language.admin.interfaces.blockTypes.notFound') . request()->name : __('language.admin.interfaces.blockTypes.noData') }}</h3>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!--column-->
                        <div class="col-xl-12">
                            <div class="table-pagenation">
                                <nav class="w-100">
                                    {{ $blockTypes->links('pagination::bootstrap-4') }}
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
