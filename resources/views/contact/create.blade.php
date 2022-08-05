@extends('layouts.main')

@section('page_title')
    Kontaktiraj {{ config('app_settings.values.app_name') }}
@endsection

@section('head')
    @if(config('app_settings.values.contact_us_meta_title'))
        <meta name="title" content="{{ config('app_settings.values.contact_us_meta_title') }}" />
    @else
        <meta name="title" content="Kontaktiraj {{ config('app_settings.values.app_name') }}" />
    @endisset

    @if(config('app_settings.values.contact_us_meta_description'))
        <meta name="description" content="{{ config('app_settings.values.contact_us_meta_description') }}" />
    @endif

    @if(config('app_settings.values.contact_us_meta_keywords'))
        <meta name="keywords" content="{{ config('app_settings.values.contact_us_meta_keywords') }}" />
    @endif
@endsection

@section('content-wrapper')
    <div class="uk-container uk-margin-large uk-container-small">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header">
                <h1 class="uk-card-title uk-text-center">Kontaktiraj {{ config('app_settings.values.app_name') }}</h1>
            </div>
            <form action="{{ route('contact.send') }}" class="uk-form-stacked" method="POST">
                @csrf
                <div class="uk-card-body">
                    <p class="uk-text-lead">
                        Takođe nas možete kontaktirati telefonom na <a href="tel:{{ config('app_settings.values.customer_service_phone') }}" class="uk-text-success">{{ config('app_settings.values.customer_service_phone') }}</a> ili poštom na:
                    </p>
                    <div class="uk-text-italic">
                        {{ config('app_settings.values.business_name') }} <br>
                        {{ config('app_settings.values.street_address') }} <br>
                        {{ config('app_settings.values.city_address') }} <br>
                    </div>

                    @include('layouts.form.text_fieldset',[
                        'label' => 'Ime',
                        'name' => 'firstname',
                        'placeholder' => 'Unesite vaše ime...'
                    ])

                    @include('layouts.form.text_fieldset',[
                        'label' => 'Prezime',
                        'name' => 'lastname',
                        'placeholder' => 'Unesite vaše prezime...'
                    ])

                    @include('layouts.form.email_fieldset',[
                        'label' => 'Email',
                        'name' => 'email',
                        'placeholder' => 'Unesite vaš email za kontakt...'
                    ])

                    @include('layouts.form.text_fieldset',[
                        'label' => 'Telefon',
                        'name' => 'phone',
                        'placeholder' => 'Unesite vaš kontakt telefon...'
                    ])

                    @include('layouts.form.text_fieldset',[
                        'label' => 'Kompanija',
                        'name' => 'company',
                        'placeholder' => 'Unesite vaše poslovno ime...'
                    ])

                    @include('layouts.form.textarea_fieldset',[
                        'label' => 'Poruka',
                        'name' => 'message',
                        'placeholder' => 'Unesite text poruke...'
                    ])
                </div>
                <div class="uk-card-footer">
                    <button class="uk-button uk-button-success uk-width-1-1" type="submit">Pošalji</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
