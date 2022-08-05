@extends(Str::startsWith(request()->getRequestUri(), '/admin') && Auth::user() && Auth::user()->can('access-admin-area') ? 'admin.layouts.main' : 'layouts.main')

@section('content-wrapper')
    <div class="uk-cover-container" uk-height-viewport='offset-top: true;'>
        <div class="uk-position-cover uk-flex-center uk-flex uk-flex-middle">
            <div class="uk-width-1-1 uk-text-center">
                <ul class="uk-breadcrumb uk-text-large uk-text-muted uk-text-uppercase">
                    <li>@yield('code')</li>
                    <li>@yield('message')</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('body-content')
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="empty">
                <div class="empty-header">@yield('code')</div>
                <p class="empty-title">Oops… You just found an error page</p>
                <p class="empty-subtitle text-muted">
                    @yield('message')
                </p>
            </div>
        </div>
    </div>
@endsection
