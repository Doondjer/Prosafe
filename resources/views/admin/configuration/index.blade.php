@extends('admin.layouts.main')

@section('title')Konfiguracija - {{ config('app_settings.values.app_name') }}@endsection


@section('header-title')
    <h2 class="page-title">
        Podešavanje Aplikacije
    </h2>
@endsection

@section('body-content')
    <div class="container-xl">
        <div class="row row-cards">
            @foreach(config('app_settings.field_config') as $section => $settings)
                @include('admin.partials._configuration')
            @endforeach
        </div>
    </div>
@endsection
