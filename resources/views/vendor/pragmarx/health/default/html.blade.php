@extends('admin.layouts.main')

@section('addl-head')
    <script>
        window.laravel = @json($laravel)
    </script>
{{--
    <link rel="stylesheet" href="{{ asset('css/health/app.css') }}">
--}}
@stop

@section('body-content')
    @include('pragmarx/health::default.partials.style')

    @yield('html.header')

    @yield('html.body')

    @yield('html.footer')

    <script>
        {!! file_get_contents(config('health.dist_path').'/js/app.js')  !!}
    </script>

    @if (config('app.env') == 'local')
        <script src="http://localhost:35729/livereload.js"></script>
    @endif
@stop
