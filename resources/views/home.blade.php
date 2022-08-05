@extends('layouts.main')

@section('page_title')
    {{ config('app_settings.values.meta_title', '') }}
@stop

@section('head')
    @if(config('app_settings.values.meta_title', ''))
        <meta name="title" content="{{ config('app_settings.values.meta_title', '') }}" />
    @endif

    @if(config('app_settings.values.meta_description', ''))
        <meta name="meta_description" content="{{ config('app_settings.values.meta_description', '') }}" />
    @endif

    @if(config('app_settings.values.meta_keywords', ''))
        <meta name="meta_keywords" content="{{ config('app_settings.values.meta_keywords', '') }}" />
    @endif
@stop

@section('slider')
    <div class="uk-cover-container" uk-height-viewport='offset-top: true; min-height: 720;'>

        <img width="830" height="831" data-src="{{ asset(config('imagecache.route') . "/original/image-000.jpg") }}" alt="" uk-cover uk-img>

        <div class="uk-position-cover uk-flex-center uk-flex uk-flex-middle uk-light">
            <div class="uk-width-1-1 uk-text-center">
                <div class="uk-grid uk-container uk-text-center uk-flex-middle uk-margin-auto">
                    <div class="uk-width-expand@l uk-width-1-1@m">
                        <h1 class="uk-h1">ProSafe <span class="uk-text-nowrap">Produžni Kablovi</span></h1>
                        <div>
                            Svi produžni kablovi i strujne letve
                            sadrže jedinstveno KERAMIČKO JEZGRO

                            i izradjeni su u kućištu od čvrstog

                            ALUMINIJUMA otpornog na mehaničke

                            udarce i oštećenja. <a href="{{ route('pages.show', ['page' => 'o-nasim-produznim-kablovima']) }}" class="uk-text-success uk-margin-left">Detaljnije</a>
                        </div>
                    </div>
                    <div class="uk-width-auto uk-flex-right uk-margin-auto uk-margin-top">
                        <a href="#" uk-toggle="target: #custom_cable" class="uk-inline">
                            <img class="uk-border-rounded" data-src="{{ asset(config('imagecache.route') . "/original/napravi_sam.jpg") }}" width="380" height="151" alt="" uk-img>
                            <div
                                class="uk-text-large uk-link uk-text-bold uk-text-center uk-position-cover uk-text-success uk-border-rounded uk-flex uk-flex-center uk-flex-middle uk-button-default uk-button-large">
                                Kreiraj Svoj Kabal
                            </div>
                        </a>
                    </div>
                </div>
                <hr class="uk-divider-icon">
                <div class="uk-text-center">
                    <h2 class="uk-h2 uk-margin-small-bottom">Pronadji Produžni Kabal</h2>
                    <div class="uk-text-muted">Odaberite bar jedno polje</div>

                    <form class="uk-grid uk-flex-center" method="GET" action="{{ route('products.index') }}">
                        @foreach($searchOptions as $name => $options)
                            <div class="uk-width-auto uk-margin-small-top">
                                <select name="{{ $name }}" class="uk-select">
                                    @foreach($options as $slug => $option)
                                        <option value="{{ $slug }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                        <div class="uk-width-auto uk-margin-small-top">
                            <button class="uk-button uk-button-success" type="submit">Pretraži</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-section">
        <div class="uk-container">
            <p class="uk-h2 uk-text-large">Najprodavaniji Modeli Produžnih Kablova</p>
            <div class="uk-slider-container-offset" uk-slider>

                <div class="uk-position-relative uk-visible-toggle uk-dark" tabindex="-1">

                    <ul class="uk-slider-items uk-grid">
                        @foreach($popularProducts as $product)
                            <li>
                                @include('partials._product_card')
                            </li>
                        @endforeach
                    </ul>

                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous" aria-label="Prethodni"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next" aria-label="Sledeći"></a>

                </div>

                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

            </div>
        </div>
    </div>

    <div class="uk-section uk-section-default">
        <div class="uk-container">
            <p class="uk-h2 uk-text-large">Najposećenije Kategorije</p>
            <div class="uk-slider-container-offset" uk-slider>

                <div class="uk-position-relative uk-visible-toggle uk-dark" tabindex="-1">

                    <ul class="uk-slider-items uk-grid">
                        @foreach($popularCategories as $category)
                            <li>
                                <div>
                                    <div class="uk-card uk-card-default uk-card-small">
                                        <div class="uk-card-media-top">
                                            <a href="{{ route('products.index', [ 'category' => $category->slug ]) }}" class="modified-link">
                                                <img data-src="{{ asset(config('imagecache.route') . "/card/$category->image") }}" alt="{{ $category->name }}" width="300" height="300" uk-img>
                                                <div class="uk-overlay uk-position-bottom uk-overlay-primary modified-link uk-text-bold uk-text-center">{{ $category->name }}</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous" aria-label="Prethodni"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next" aria-label="Sledeći"></a>

                </div>

                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

            </div>

        </div>
    </div>

    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid uk-flex-middle uk-flex-center uk-text-center">
                <div class="uk-width-1-4@l">
                    <a href="{{ route('pdf.catalog') }}" target="_blank" class="uk-inline uk-margin uk-link">
                        <img class="uk-border-rounded" data-src="{{ asset(config('imagecache.route') . "/original/catalog_slim_blured.jpg") }}" alt="" uk-img>
                        <div class="uk-text-large uk-text-bold uk-link uk-text-center uk-position-bottom uk-overlay uk-text-success uk-overlay-primary">
                            <span uk-icon="icon: pdf; ratio: 1.5"></span> Katalog
                        </div>
                    </a>
                    <a href="{{ route('pdf.pricing') }}" target="_blank" class="uk-inline uk-link">
                        <img class="uk-border-rounded" data-src="{{ asset(config('imagecache.route') . "/original/pricing_blured.jpg") }}" alt="" uk-img>
                        <div class="uk-text-large uk-text-bold uk-link uk-text-center uk-position-bottom uk-overlay uk-text-success uk-overlay-primary">
                            <span uk-icon="icon: pdf; ratio: 1.5"></span> Cenovnik
                        </div>
                    </a>
                </div>
                <div class="uk-width-3-4@l uk-margin-top">
                    <div class="video-container">
                        <iframe class="uk-width-1-1" src="https://www.youtube.com/embed/DIDLfslz-6Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-section uk-background-cover" data-src="{{ asset(config('imagecache.route') . '/original/brusilica.jpg') }}" uk-img>
        <div class="uk-light">
            <div class="uk-container">
                <h3 class="uk-h2 uk-text-center">Zašto su <span class="uk-success">Prosafe</span> produžni kablovi bolji od ostalih</h3>
                <div class="uk-grid-match uk-flex-middle"  uk-grid>
                    <div class="uk-width-1-2 uk-width-1-3@s">
                        <div class="uk-text-center">
                            <div class="uk-text-large uk-text-bold footer-icon-container">4000 W</div>
                            <p class="uk-text-bold">Dozvoljeno Opterećenje</p>
                        </div>
                    </div>
                    <div class="uk-width-1-2 uk-width-1-3@s">
                        <div class="uk-text-center">
                            <div class="footer-icon-container">
                                <img data-src="{{ asset(config('imagecache.route') . '/original/uv.png') }}" width="72" height="72" uk-img alt="">
                            </div>
                            <p class="uk-text-bold">Uv i Ozon Otporni</p>
                        </div>
                    </div>
                    <div class="uk-width-1-2 uk-width-1-3@s">
                        <div class="uk-text-center">
                            <div class="footer-icon-container">
                                <img data-src="{{ asset(config('imagecache.route') . '/original/umbrella.png') }}" width="72" height="72" uk-img alt="">
                            </div>
                            <p class="uk-text-bold">VlagoOtporni</p>
                        </div>
                    </div>
                    <div class="uk-width-1-2 uk-width-1-3@s">
                        <div class="uk-text-center">
                            <div class="footer-icon-container">
                                <img data-src="{{ asset(config('imagecache.route') . '/original/plus_minus.png') }}" width="72" height="72" uk-img alt="">
                            </div>
                            <p class="uk-text-bold">Superirorni Kontakti</p>
                        </div>
                    </div>
                    <div class="uk-width-1-2 uk-width-1-3@s">
                        <div class="uk-text-center">
                            <div class="footer-icon-container">
                                <img data-src="{{ asset(config('imagecache.route') . '/original/flame.png') }}" width="72" height="72" uk-img alt="">
                            </div>
                            <p class="uk-text-bold">Samogasivi Materijali</p>
                        </div>
                    </div>
                    <div class="uk-width-1-2 uk-width-1-3@s">
                        <div class="uk-text-center">
                            <div class="footer-icon-container">
                                <img data-src="{{ asset(config('imagecache.route') . '/original/conector.png') }}" width="72" height="72" uk-img alt="">
                            </div>
                            <p class="uk-text-bold">Predimenzionisani Izliveni Konektori</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')

@endpush
