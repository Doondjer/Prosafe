@extends('admin.layouts.main')

@section('title')@yield('form_title') - {{ config('app_settings.values.app_name') }}@endsection


@section('header-title')
    <h2 class="page-title">
        @yield('form_title')
    </h2>
@endsection

@section('header-actions')
    @if(isset($breadcrumbLinks))
        <ol class="breadcrumb" aria-label="breadcrumbs">
            <li class="breadcrumb-item"><a href="{{ route('admin_homepage') }}">Početna</a></li>
            @foreach($breadcrumbLinks as $name => $link)
                <li class="breadcrumb-item"><a href="{{ $link }}">{{ $name }}</a></li>
            @endforeach
            <li class="breadcrumb-item active" aria-current="page"><a href="#">@yield('form_title')</a></li>
        </ol>
    @endif
@endsection

@section('body-content')
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                @if($cardContent ?? null)
                    @yield('card_content')
                @else
                    <form class="card" action="{{ $formAction }}" method="{{ $formMethod == 'GET' ?: 'POST' }}" {{ $enctype ?? ''}}>

                        @if($formMethod == 'PATCH')
                            @method('PATCH')
                        @endif

                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">@yield('form_title_action')</h4>
                        </div>
                        <div class="card-body" id="accordion_form">

                            @yield('form_content')

                            <div class="form-footer d-grid gap-2">
                                <button type="submit" class="btn btn-green">{{ isset($formMethod) && $formMethod == 'PATCH' ? 'Izmeni' : 'Kreiraj' }}</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
