@extends('layouts.main')

@section('content-wrapper')
    <div class="uk-align-center uk-width-large">
        <div class="uk-card-default uk-card-small">
            <div class="uk-card-header">
                <h2 class="uk-h5 uk-text-bold">Prijavite se na {{ config('app_settings.values.business_name') }}</h2>
            </div>
            <div class="uk-card-body">
                <button class="uk-button uk-button-default social-button facebook-button uk-button-large uk-width-1-1 uk-margin-small-top">
                    <span uk-icon="icon: facebook; ratio: 1.7" class="uk-icon-button uk-margin-right uk-icon"></span>
                    Prijava putem Facebook-a
                </button>
                <button class="uk-button uk-button-default social-button google-button uk-button-large uk-width-1-1 uk-margin-small-top">
                    <span uk-icon="icon: google; ratio: 1.7" class="uk-icon uk-margin-right"></span>
                    Prijava putem Googla
                </button>
                <button class="uk-button uk-button-default social-button uk-button-large uk-width-1-1 uk-margin-small-top uk-text-muted">
                    <span uk-icon="icon: phone; ratio: 1.7" class="uk-icon uk-margin-right"></span>
                    Prijava putem telefona
                </button>

                <hr class="uk-divider-icon">

                <form action="/login" method="POST">

                    @csrf

                    <div class="uk-margin">
                        <div class="uk-inline uk-width-1-1">
                            <span uk-icon="icon: mail" class="uk-form-icon uk-icon"></span>
                            <input type="email" name="email" autocomplete="email" placeholder="Email ..." class="uk-input uk-form-large modified-input{{ $errors->has('email') ? ' uk-form-danger' : '' }}">
                            @error('email')
                                <span class="uk-text-danger uk-text-left">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-inline uk-width-1-1">
                            <span uk-icon="icon: lock" class="uk-form-icon uk-icon"></span>
                            <input type="password" name="password" placeholder="Lozinka ..." class="uk-input uk-form-large modified-input{{ $errors->has('password') ? ' uk-form-danger' : '' }}">
                            @error('password')
                                <span class="uk-text-danger uk-text-left">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="uk-margin uk-text-right@s uk-text-center uk-text-small">
                        <a href="/forgot-password" class="">Zaboravljena lozinka?</a>
                    </div>
                    <div class="uk-margin uk-light">
                        <button class="uk-button uk-button-success uk-button-large uk-width-1-1">Prijavite se</button>
                    </div>
                    <div class="uk-text-small uk-text-center uk-margin">
                        Niste Registrovani? <a href="/register" class="">Kreirajte nalog</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
