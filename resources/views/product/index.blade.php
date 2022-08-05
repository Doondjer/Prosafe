@extends('layouts.main')

@section('page_title')
    {{ $category && trim($category->meta_title) != "" ? $category->meta_title : config('app_settings.values.meta_title') }}
@stop

@section('seo')
        <meta name="description" content="{{ $category && trim($category->meta_description) != "" ? $category->meta_description : config('app_settings.values.meta_description') }}"/>

        <meta name="keywords" content="{{ $category && trim($category->meta_keywords) != "" ? $category->meta_keywords : config('app_settings.values.meta_keywords') }}"/>

        @if ($category && config('app_settings.values.show_categories_rich_snippets'))
            <script type="application/ld+json">
                {!! $category->getCategoryJsonLd() !!}
            </script>
        @endif
@stop

@section('content-wrapper')
    <div class="uk-container">
        <div class="uk-grid-small" uk-grid>
            <div class="filter-container uk-display-block uk-visible@l uk-first-column">
                <div class="uk-card uk-card-default uk-card-small">
                    <div class="uk-card-header">Filteri</div>
                    <form method="GET" action="{{ route('products.index') }}">
                        <div class="uk-card-header">
                            <label for="kategorija_selectbox" class="uk-text-small uk-text-bold">Kategorija:</label>
                            <select id="kategorija_selectbox" name="category" class="uk-select">
                                <option value="">Kategorija...</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->slug }}"{{ request()->get('category') == $category->slug ? ' selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @foreach($filters as $label => $filter)
                            <div class="uk-card-header">
                                <label for="type_{{ strtolower(str_replace('', '_', $label)) }}_checkboxes" class="uk-text-small uk-text-bold">{{ $label }}:</label>
                                <ul id="type_{{ strtolower(str_replace('', '_', $label)) }}_checkboxes" class="uk-nav">
                                    @foreach($filter as $index => $option)
                                    <li>
                                        <input type="checkbox" name="{{ $option->slug }}[]" id="{{ $option->slug }}_{{ $index }}_row_checkbox" class="uk-checkbox uk-margin-small-right"{{ request()->has($option->slug) && in_array($option->value, request($option->slug, []) ) ? ' checked' : '' }} value="{{ $option->value }}">
                                        <label for="{{ $option->slug }}_{{ $index }}_row_checkbox">{{ $option->value }}</label> {{--<span>({{ $option->nb_products }})</span>--}}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                        <div class="uk-card-header">
                            <button type="submit" class="uk-button uk-button-success uk-width-1-1">Filtriraj</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="uk-width-expand uk-margin-large-bottom">
                <div class="card-container">
                    <div class="uk-card uk-card-default uk-card-small">
                        <div class="uk-card-body">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-inline uk-margin uk-width-1-1">
                                    <h1 class="uk-h3">ProSafe Produzni Kablovi</h1>
                                    <div class="">
                                        <p>Svi produžni kablovi i strujne letve
                                            sadrže jedinstveno KERAMIČKO JEZGRO

                                            i izradjeni su u kućištu od čvrstog

                                            ALUMINIJUMA otpornog na mehaničke

                                            udarce i oštećenja. Dodatni izolacioni

                                            kanal od SAMOGASIVE TERMO-OTPORNE

                                            PLASTIKE koji pored same keramike

                                            obezbeđuje dodatnu zaštitu zbog čega

                                            smo u sertifikatu dobili znak uredjaja

                                            sa duplom zaštitom.</p>
                                    </div>
                                    <ul uk-accordion>
                                        <li>
                                            <a class="uk-accordion-title uk-link" href="#">Pročitaj Vise</a>
                                            <div class="uk-accordion-content">
                                                <p>
                                                    Sami bakarni

                                                    kontakti su izuzetno visokog kvaliteta

                                                    što dozvoljava opterećenje od 4000W.

                                                    Svi elementi su nezapaljivi do T=550C.

                                                    Podržana jačina struje 16A i napon

                                                    “220-250V / 50-60 Hz. Poklopci utičnica

                                                    izradjeni od galanteriske ABS PLASTIKE

                                                    i zakrenuti su za 45%. Proizvodi su

                                                    sertifikovani i atestirani od strane

                                                    Elektrotehničkog instituta

                                                    “Nikola Tesla” Beograd i instituta Vinča.
                                                    Naš proizvod je otporan na mehanička

                                                    oštećenja.
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="uk-width-1-1">
                                    <button class="uk-button uk-button-default uk-button-small uk-width-1-1 icon-button uk-border-rounded uk-hidden@l" uk-toggle="target: #side_filter">
                                        <span uk-icon="filter" class="uk-icon"></span> Filteri
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="uk-width-expand uk-h4 uk-margin-top uk-text-center">{{ trans_choice('default.Pronadjen :nb_products proizvod za tebe', $products->total(), ['nb_products' => $products->total()]) }}</h1>

                {{--<div class="uk-grid-small uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1 uk-position-relative uk-flex-top uk-flex-wrap-top" uk-grid>--}}
                <div class="uk-grid-small uk-child-width-auto uk-position-relative uk-flex-top uk-flex-center uk-flex-wrap-top" uk-grid>
                    @foreach($products as $product)
                        @include('partials._product_card')
                    @endforeach
                </div>
                @if($products->hasPages())
                    <div class="uk-card uk-card-default uk-margin uk-margin-large-bottom uk-border-rounded uk-padding-small">
                            {{ $products->links('vendor.pagination.uikit') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="filter-container uk-modal-full uk-padding-remove" id="side_filter" uk-modal>
        <button class="uk-modal-close-default" type="button" uk-close></button>
        @include('partials.side_filter')
    </div>
@endsection

@push('scripts')

@endpush
