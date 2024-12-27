@extends('admin.layouts.main')

@section('title', 'Sửa đồ ăn')

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-titles">
                            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                @include('admin.components.breadcrumbs', [
                                    'breadcrumbs' => $breadcrumbs,
                                ])
                            </nav>
                        </div>
                    </div>
                </div>
                @include('admin.components.foodCombos.form', [])
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script src=" {{ asset('/js/admin/ajaxs/food.js') }} "></script>
@endsection
