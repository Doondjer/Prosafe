<div>
    <div class="uk-card uk-card-default uk-card-small uk-width-medium">
        <div class="uk-card-media-top uk-cover-container">
            <a href="{{ route('products.show', [ 'product' => $product->slug ]) }}">
                <img data-src="{{ asset(config('imagecache.route') . "/card/$product->base_image") }}"
                     class="uk-width-1-1" width="300" height="300" alt="Slika_{{ $product->name }}_proizvoda" uk-img>
            </a>
        </div>
        <div class="uk-card-body">
            <a href="{{ route('products.show', [ 'product' => $product->slug ]) }}" class="">
                <h2 class="uk-card-title uk-margin-remove">
                    {{ $product->name }} <span
                            class="uk-h4">{{ $product->linkedAattributes->implode('pivot.value', ' | ') ?? '' }}</span>
                </h2>
            </a>
            <div class="uk-text-capitalize uk-text-small uk-text-muted uk-margin-left">ID #{{ $product->sku }}</div>
            <div class="uk-margin-small">
                @if( ! $product->special_price || $product->special_price && ! Carbon\Carbon::now()->between($product->special_price_from, $product->special_price_to))
                    <div class="uk-h3 uk-text-bold uk-margin-remove">{{ constructPrice($product->price, $product->currency) }}</div>
                @else
                    <span class="uk-h3 uk-text-bold uk-margin-remove">{{ $product->special_price }} {{ $product->currency }}</span>
                    <s class="uk-text-meta uk-margin-left uk-text-large">{{ $product->price }} {{ $product->currency }}</s>
                @endif
            </div>
        </div>
        <div class="uk-card-footer">
            <a href="{{ route('products.show', [ 'product' => $product->slug ]) }}"
               class="uk-button uk-button-success uk-width-1-1">Detaljnije</a>
        </div>
    </div>
</div>
