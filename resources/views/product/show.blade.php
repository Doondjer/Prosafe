@extends('layouts.main')

@section('page_title')
    {{ trim($product->meta_title) != "" ? $product->meta_title : $product->name }}
@stop

@section('seo')
    <meta name="description" content="{{ trim($product->meta_description) != "" ? $product->meta_description : \Illuminate\Support\Str::limit(strip_tags($product->description), 120, '') }}"/>

    <meta name="keywords" content="{{ $product->meta_keywords }}"/>

    @if (config('app_settings.values.show_product_rich_snippets'))
        <script type="application/ld+json">
            {!! $product->getRichSnippets() !!}

        </script>
    @endif

    <meta name="twitter:card" content="summary_large_image" />

    <meta name="twitter:title" content="{{ $product->name }}" />

    <meta name="twitter:description" content="{{ $product->description }}" />

    <meta name="twitter:image:alt" content="" />

    <meta name="twitter:image" content="{{ asset(config('imagecache.route') . "/medium/$product->base_image") }}" />

    <meta property="og:type" content="og:product" />

    <meta property="og:title" content="{{ $product->name }}" />

    <meta property="og:image" content="{{ asset(config('imagecache.route') . "/medium/$product->base_image") }}" />

    <meta property="og:description" content="{{ $product->description }}" />

    <meta property="og:url" content="{{ route('products.show', $product->slug) }}" />
@stop

@section('content-wrapper')
    <div class="uk-container">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('homepage') }}" class="uk-text-success uk-text-bold">Početna</a></li>
            <li><a href="{{ route('products.index') }}" class="uk-text-success uk-text-bold">Filter Proizvoda</a></li>
            <li><span>{{ $product->name }}</span></li>
        </ul>
        <div class="uk-grid uk-grid-small">
            <div class="uk-width-auto" uk-lightbox>
                <a href="{{ asset(config('imagecache.route') . "/original/$product->base_image") }}">
                    <img src="{{ asset(config('imagecache.route') . "/large/$product->base_image") }}" alt="Glavna Slika Kabla">
                </a>
                @if($product->images->count() > 0)
                    <ul class="uk-thumbnav uk-margin">
                        @foreach($product->images as $image)
                            <li class="uk-active"><a href="{{ asset(config('imagecache.route') . "/original/$image->filename") }}"><img src="{{ asset(config('imagecache.route') . "/small/$image->filename") }}" alt=""></a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="uk-width-expand">
                <div class="uk-card uk-card-default uk-card-small">
                    <div class="uk-card-header">
                        <h1 class="uk-card-title">{{ $product->name }}</h1>
                        <div class="uk-text-muted">Proizvod #{{ $product->sku }}</div>
                    </div>
                    <div class="uk-card-body">
                        @if( ! $product->special_price || $product->special_price && ! Carbon\Carbon::now()->between($product->special_price_from, $product->special_price_to))
                            <div class="uk-h1 uk-margin-remove">{{ constructPrice($product->price, $product->currency) }}</div>
                        @else
                            <span class="uk-h1 uk-margin-remove">{{ $product->special_price }} {{ $product->currency }}</span><s class="uk-text-meta uk-margin-left uk-text-large">{{ $product->price }} {{ $product->currency }}</s>
                        @endif
                        <div class="uk-text-primary">BESPLATNO SLANJE za Srbiju i porudžbine kablova > 7000 RSD</div>
                            @if($variants->count() > 0)
                                <label for="product_variants">Opcije:</label>
                                <select name="variants" id="product_variants" class="uk-select" onchange="window.open(this.options[this.selectedIndex].value, '_self')">
                                    <option value="">Odaberi Drugu Opciju</option>
                                    @foreach($variants as $slug => $variant)
                                        <option value="{{ route('products.show', [ 'product' => $slug ]) }}"{{ $slug === $product->slug ? ' selected' : '' }}>{{ $variant->implode('value', ' | ') }}</option>
                                    @endforeach
                                </select>
                            @endif
                        <p>{!! $product->short_description !!}</p>
                    </div>
                    <div class="uk-card-footer">
                        <div class="cell medium-5">
                            <p><strong>Brzi Linkovi:</strong></p>
                            <ul class="uk-margin-left uk-list uk-margin-remove-bottom">
                                <li><span uk-icon="icon: link" class="uk-text-success"></span><a class="uk-link uk-text-secondary uk-margin-small-left" href="#related_products">Slični Proizvodi</a></li>
                                @foreach($product->categories as $category)
                                    @foreach($category->pages as $page)
                                        <li><span uk-icon="icon: link" class="uk-text-success"></span><a class="uk-link uk-text-secondary uk-margin-small-left" href="{{ route('pages.show', ['page' => $page->slug]) }}">{{ $page->title }}</a></li>
                                    @endforeach
                                @endforeach
                                <li><span uk-icon="icon: link" class="uk-text-success"></span><a class="uk-link uk-text-secondary uk-margin-small-left" href="{{ route('contact.create') }}">Prijavi Problem</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="uk-card uk-card-default uk-card-small uk-margin">
            <div class="uk-card-body">
                <ul uk-tab>
                    <li class="uk-active"><a href="#">Opis</a></li>
                    <li><a href="#">Specifikacija</a></li>
                    <li><a href="#">Dostava</a></li>
                </ul>
                <div class="uk-switcher">
                    <div>{!! $product->description !!}</div>
                    <ul class="uk-list uk-list-striped">
                        @foreach($product->attributes as $attribute)
                            <li><label for="weight_info">{{ $attribute->title }}:</label><span id="weight_info" class="uk-margin-left">{{ $attribute->pivot->value }}</span></li>
                        @endforeach
                    </ul>
                    <ul class="uk-list uk-list-striped">
                        <li><label for="weight_info">Težina:</label><span id="weight_info" class="uk-margin-left">{{ $product->weight ?? '---' }} kg</span></li>
                        <li><label for="size_info">Dimenzije:</label><span id="size_info" class="uk-margin-left">{{ $product->length ?? '---' }} x {{ $product->width ?? '---' }} x {{ $product->height ?? '---' }} cm</span></li>
                        <li><label for="size_info">Kurirske Službe:</label><span id="size_info" class="uk-margin-left">{{ $product->carriersAsString() ?? '---' }}</span></li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="uk-margin-large-bottom" uk-accordion>
            <div class="uk-open">
                <a class="uk-accordion-title uk-h2 uk-text-large" href="#">Slični proizvodi</a>
                <div class="uk-accordion-content" id="related_products" uk-grid>
                    @foreach($product->crossSeling as $product)
                        <div>
                            <div class="uk-card uk-card-default uk-card-small">
                                <div class="uk-card-media-top">
                                    <img src="{{ asset(config('imagecache.route') . "/medium/$product->base_image") }}" alt="">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title">{{ $product->name }}</h3>
                                    <p><a href="{{ route('products.show', [ 'product' => $product->slug ]) }}" class="uk-button uk-button-success uk-width-1-1">Kupi</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
