@extends('admin.layouts.main')

@section('title')Konfiguracija - {{ config('app_settings.values.app_name') }}@endsection


@section('header-title')
    <h2 class="page-title">
        Podešavanje Aplikacije
    </h2>
@endsection

@section('body-content')
    <div class="container-xl">
        <div class="row row-cards justify-content-center d-flex">
            @include('admin.partials._configuration')
        </div>
    </div>
@endsection
