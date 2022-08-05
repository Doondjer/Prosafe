<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>

        <title>@yield('page_title')</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <link rel="icon" sizes="16x16" href="{{ config('app_settings.values.favicon_url') }}" />

        @yield('head')

        @section('seo')
            {{--!!!!!!! Ovo ispod Proveriti !!!!!!!!!--}}
            @if (! request()->is('/'))
                <meta name="description" content="{{ config('app_settings.values.meta_description') }}"/>
            @endif
        @show

        @stack('css')

        @if(config('app_settings.values.custom_css'))
            <style>
                {!! config('app_settings.values.custom_css') !!}
            </style>
        @endif
    </head>


    <body>

        <div id="app">
            <flash-wrapper ref='flashes'></flash-wrapper>
                @if(session('success'))
                    <div class="uk-notification uk-notification-bottom-right uk-display-block">
                        <div class="uk-notification-message uk-notification-message-success" style="opacity: 1;">
                          {{--  <a href="#" class="uk-notification-close uk-icon uk-close" data-uk-close="">
                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg>
                            </a>--}}
                            <div>{{ session('success') }}</div>
                        </div>
                    </div>
                @endif

                @include('layouts.header.header')

                @yield('slider')

                @yield('content-wrapper')

                @include('layouts.footer.footer')

        </div>

        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

        @stack('scripts')

        <div class="modal-overlay"></div>

        @include('layouts.navigation.offcanvas')

        @if(config('app_settings.values.custom_javascript'))
            <script>
                {!! config('app_settings.values.custom_javascript') !!}
            </script>
        @endif
    </body>
</html>
