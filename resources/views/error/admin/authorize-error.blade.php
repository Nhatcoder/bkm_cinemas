@extends('error.admin.layouts.main')

@section('title', __('language.errors.name'))

@section('css')
@endsection

@section('content')
    <div class="col-md-6">
        <div class="form-input-content text-center error-page">
            <h1 class="error-text  font-weight-bold">403</h1>
            <h4><i class="fa fa-times-circle text-danger"></i> {{ __('language.errors.authorizeTitle') }}</h4>
            <p>{{ __('language.errors.authorizeMessage') }}</p>
            <div>
                <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">{{ __('language.errors.back') }}</a>
            </div>
        </div>
    </div>
@endSection

@section('js')
@endsection
