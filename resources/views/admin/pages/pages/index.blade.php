@extends('admin.layouts.main')

@section('title', 'Danh sách trang')

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
                    @include('admin.components.sidebar-left-body')
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
                                                    <svg width="35" height="40" viewBox="0 0 59 81" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M53.1365 80H5.86371C3.13985 80 0.90918 77.7693 0.90918 75.0455V5.95453C0.90918 3.23067 3.13985 1 5.86371 1H38.3839L58.091 20.7071V75.0455C58.091 77.7693 55.8604 80 53.1365 80Z"
                                                            fill="#D0E9FF" stroke="#1B87FF"></path>
                                                        <path d="M38.5911 0.5L58.5911 20.5H38.5911V0.5Z"
                                                              fill="#1B87FF"></path>
                                                        <path d="M38.5911 0.5L58.5911 20.5H38.5911V0.5Z"
                                                              stroke="#1B87FF"></path>
                                                        <path d="M13.1365 31.4092H45.8638V35.9546H13.1365V31.4092Z"
                                                              fill="#1B87FF"></path>
                                                        <path d="M13.1365 31.4092H45.8638V35.9546H13.1365V31.4092Z"
                                                              stroke="#1B87FF"></path>
                                                        <path d="M13.1365 42.3184H45.8638V46.8638H13.1365V42.3184Z"
                                                              fill="#1B87FF"></path>
                                                        <path d="M13.1365 42.3184H45.8638V46.8638H13.1365V42.3184Z"
                                                              stroke="#1B87FF"></path>
                                                        <path d="M13.1365 53.2275H36.7729V57.773H13.1365V53.2275Z"
                                                              fill="#1B87FF"></path>
                                                        <path d="M13.1365 53.2275H36.7729V57.773H13.1365V53.2275Z"
                                                              stroke="#1B87FF"></path>
                                                    </svg>
                                                </div>
                                                <div class="drive-content">
                                                    <h5>{{ __('language.admin.interfaces.pages.have') }}: {{ $countPage }} {{ __('language.admin.interfaces.pages.page_sample') }}</h5>
                                                    <div class="progress default-progress">
                                                        <div class="progress-bar bg-vigit progress-animated bg-primary"
                                                             style="width: {{ $countPage }}%; height:100%;" role="progressbar">
                                                            <span class="sr-only">{{ $countPage }}% Complete</span>
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
                            @if(!$pages->isEmpty())
                                <ul class="folder-structure dlab-scroll" id="folder">
                                    @foreach($pages as $key => $page)
                                        <li>
                                            <div class="file-list">
                                                <div class="dz-media">
                                                    <svg width="35" height="40" viewBox="0 0 59 81" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M53.1365 80H5.86371C3.13985 80 0.90918 77.7693 0.90918 75.0455V5.95453C0.90918 3.23067 3.13985 1 5.86371 1H38.3839L58.091 20.7071V75.0455C58.091 77.7693 55.8604 80 53.1365 80Z"
                                                            fill="#D0E9FF" stroke="#1B87FF"></path>
                                                        <path d="M38.5911 0.5L58.5911 20.5H38.5911V0.5Z"
                                                              fill="#1B87FF"></path>
                                                        <path d="M38.5911 0.5L58.5911 20.5H38.5911V0.5Z"
                                                              stroke="#1B87FF"></path>
                                                        <path d="M13.1365 31.4092H45.8638V35.9546H13.1365V31.4092Z"
                                                              fill="#1B87FF"></path>
                                                        <path d="M13.1365 31.4092H45.8638V35.9546H13.1365V31.4092Z"
                                                              stroke="#1B87FF"></path>
                                                        <path d="M13.1365 42.3184H45.8638V46.8638H13.1365V42.3184Z"
                                                              fill="#1B87FF"></path>
                                                        <path d="M13.1365 42.3184H45.8638V46.8638H13.1365V42.3184Z"
                                                              stroke="#1B87FF"></path>
                                                        <path d="M13.1365 53.2275H36.7729V57.773H13.1365V53.2275Z"
                                                              fill="#1B87FF"></path>
                                                        <path d="M13.1365 53.2275H36.7729V57.773H13.1365V53.2275Z"
                                                              stroke="#1B87FF"></path>
                                                    </svg>
                                                </div>
                                                <div class="dz-info">
                                                    <a href="{{ route('admin.pages.edit', $page->id) }}">
                                                        <h6 class="mb-0">{{ $page->name }}</h6>
                                                    </a>
                                                    <div class="mt-1 d-flex justify-content-center align-items-center">
                                                        <a href="{{ route('admin.pages.edit', $page->id) }}"
                                                           class="text-hover">{{ __('language.admin.interfaces.pages.quick_fix') }}</a>
                                                        <form action="{{ route('admin.pages.delete', $page->id) }}"
                                                              class="formDelete" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="text-hover bt-form btnDelete">{{ __('language.admin.interfaces.pages.delete') }}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="d-flex justify-content-center align-items-center" style="padding: 18rem !important;">
                                    <div>
                                        <h3 class="text-center">{{ request()->name ? __('language.admin.interfaces.pages.notFound') . request()->name : __('language.admin.interfaces.pages.noData') }}</h3>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!--column-->
                        <div class="col-xl-12">
                            <div class="table-pagenation">
                                <nav class="w-100">
                                    {{ $pages->links('pagination::bootstrap-4') }}
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
