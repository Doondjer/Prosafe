<div class="uk-section uk-section-muted uk-width-1-1 uk-padding-remove-bottom uk-light uk-background-cover" data-src="{{ asset(config('imagecache.route') . "/original/image-000.jpg") }}" uk-img >
    <div class="uk-container">
        <div class="uk-hidden@m uk-text-center">
            <ul class="uk-list">
                <li><a class="uk-link uk-text-success" href="{{ route('pages.show', ['page' => 'o-nama']) }}">{{ config('app_settings.values.app_name') }} Ukratko</a></li>
                <li><a class="uk-link uk-text-success" href="{{ route('contact.create') }}">Kontaktiraj {{ config('app_settings.values.app_name') }}</a></li>
                <li>
                    <a href="{{ route('homepage') }}" class="uk-logo">
                        <img data-src="{{ config('app_settings.values.logo_url') }}" uk-img height="50" class="uk-margin-small-right" alt="{{ config('app_settings.values.app_name') }}">
                    </a>
                </li>
                <li>{{ config('app_settings.values.business_name') }} <br>
                    {{ config('app_settings.values.street_address') }} <br>
                    {{ config('app_settings.values.city_address') }} <br>
                </li>
                <li><a class="uk-text-success uk-link uk-text-nowrap" href="tel:{{ config('app_settings.values.sales_phone') }}"> <span uk-icon="icon: phone"></span> <span class="uk-text-bold">Prodaja</span> {{ config('app_settings.values.sales_phone') }}</a></li>
                <li><a class="uk-text-success uk-link uk-text-nowrap" href="tel:{{ config('app_settings.values.customer_service_phone') }}"> <span uk-icon="icon: phone"></span> <span class="uk-text-bold">Podrška</span> {{ config('app_settings.values.customer_service_phone') }}</a></li>
                <li>
                    <label class="uk-h5 uk-text-bold" for="social_footer">Pratite nas</label>
                    <div>
                        <a href="#" class="uk-link" uk-icon="icon: facebook; ratio: 1.5" aria-label="Facebook"></a>
                        <a href="#" class="uk-link" uk-icon="icon: twitter; ratio: 1.5" aria-label="Twitter"></a>
                        <a href="#" class="uk-link" uk-icon="icon: instagram; ratio: 1.5" aria-label="Instagram"></a>
                        <a href="#" class="uk-link" uk-icon="icon: linkedin; ratio: 1.5" aria-label="Linkedin"></a>
                    </div>

                </li>
            </ul>
        </div>
        <div class="uk-grid uk-grid-small uk-child-width-1-4 uk-visible@m">
            <div>
                <h5 class="uk-h5 uk-text-bold">O Nama</h5>
                <ul class="uk-list">
                    <li><a class="uk-link uk-text-success" href="{{ route('contact.create') }}">Kontaktiraj {{ config('app_settings.values.app_name') }}</a></li>
                    <li><a class="uk-link uk-text-success" href="{{ route('pages.show', ['page' => 'o-nama']) }}">{{ config('app_settings.values.app_name') }} Ukratko</a></li>
                    <li><a class="uk-link uk-text-success" href="{{ route('pages.show', ['page' => 'o-nasim-produznim-kablovima']) }}">O {{ config('app_settings.values.app_name') }} Produžnim Kablovima</a></li>
                    <li>
                        <label class="uk-h5 uk-text-bold" for="social_footer">Pratite nas</label>
                        <div>
                            <a href="#" class="uk-link" uk-icon="icon: facebook; ratio: 1.5" aria-label="Facebook"></a>
                            <a href="#" class="uk-link" uk-icon="icon: twitter; ratio: 1.5" aria-label="Twitter"></a>
                            <a href="#" class="uk-link" uk-icon="icon: instagram; ratio: 1.5" aria-label="Instagram"></a>
                            <a href="#" class="uk-link" uk-icon="icon: linkedin; ratio: 1.5" aria-label="Linkedin"></a>
                        </div>

                    </li>
                    <li>
                        <a href="{{ route('homepage') }}" class="uk-logo">
                            <img data-src="{{ config('app_settings.values.logo_url') }}" width="275" height="50" class="uk-margin-small-right" alt="{{ config('app_settings.values.app_name') }}" uk-img>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <h5 class="uk-h5 uk-text-bold">Proizvodi</h5>
                <uk class="uk-list">
                    @foreach($categories as $category)
                        <li><a class="uk-text-success" href="{{ route('products.index', ['category' => $category->slug ]) }}">{{ $category->name }}</a></li>
                    @endforeach
                </uk>
            </div>
            <div>
                <h5 class="uk-h5 uk-text-bold">Podrska Kupcima</h5>
                <ul class="uk-list">
                    <li><a class="uk-link uk-text-success" href="{{ route('pages.show', ['page' => 'slanje-i-vracanje']) }}">Isporuka & Vraćanje</a></li>
                    <li><a class="uk-link uk-text-success" href="#" uk-toggle="target: #custom_cable" >Specijalne Porudžbine</a></li>
                    <li><a class="uk-link uk-text-success" href="{{ route('pages.show', ['page' => 'poslovna-politika-i-odnos-prema-klijentima']) }}">Poslovna Politika</a></li>

                </ul>
            </div>
            <div>
                <h5 class="uk-h5 uk-text-bold">Kontakt</h5>
                <ul class="uk-list">
                    <li>{{ config('app_settings.values.business_name') }} <br>
                        {{ config('app_settings.values.street_address') }} <br>
                        {{ config('app_settings.values.city_address') }} <br>
                    </li>
                    <li><a class="uk-text-success uk-link uk-text-nowrap" href="tel:{{ config('app_settings.values.sales_phone') }}"> <span uk-icon="icon: phone"></span> <span class="uk-text-bold">Prodaja</span> {{ config('app_settings.values.sales_phone') }}</a></li>
                    <li><a class="uk-text-success uk-link uk-text-nowrap" href="tel:{{ config('app_settings.values.customer_service_phone') }}"> <span uk-icon="icon: phone"></span> <span class="uk-text-bold">Podrška</span> {{ config('app_settings.values.customer_service_phone') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="uk-text-right uk-background-secondary uk-padding uk-visible@s">
        <ul class="uk-breadcrumb">
            <li><a href="#" class="uk-text-success uk-text-bold">Uslovi Koriscenja</a></li>
            <li><a href="#" class="uk-text-success uk-text-bold">Privatnost</a></li>
            <li><span>@ {{ \Carbon\Carbon::now()->year }} {{ config('app_settings.values.app_name') }} Sva Prava Zadrzana</span></li>
        </ul>
    </div>
    <div class="uk-text-center uk-background-secondary uk-padding uk-hidden@s">
        <ul class="uk-breadcrumb">
            <li><a href="#" class="uk-text-success uk-text-bold">Uslovi Koriscenja</a></li>
            <li><a href="#" class="uk-text-success uk-text-bold">Privatnost</a></li>
        </ul>
    </div>

</div>
<div id="custom_cable" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-body">
            <div class="uk-text-center">
                <h2 class="uk-text-bold">Specijalni Kablovi</h2>
                <h3 class="uk-h3 uk-margin-remove uk-text-success uk-text-bold">Kreiraj Kabal Samo Za Sebe</h3>
                <div class="uk-text-meta"><span class="uk-text-bold">INFO: </span>Neke komponente se ne mogu implementirati u određene modele produžnih kablova!</div>
            </div>

            <progress id="js-progressbar" class="uk-progress" value="25" max="100"></progress>

            <div class="">
                <h3 class="uk-h3">Korak 1: Detalji Produžnog Kabla</h3>
                <div>
                    <p class="uk-text-bold">Odaberi Dužinu (U Metrima):</p>
                    <div class="uk-text-center" uk-switcher="animation: uk-animation-fade; toggle: > *">
                        <button class="uk-button uk-button-default uk-button-large" type="button">25</button>
                        <button class="uk-button uk-button-default uk-button-large" type="button">50</button>
                        <button class="uk-button uk-button-default uk-button-large" type="button">75</button>
                        <button class="uk-button uk-button-default uk-button-large" type="button">100</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-modal-footer uk-background-muted">
            <span uk-icon="icon: alert"></span> Ovo Treba Završiti Kada Se Vidi Gde Šta Može Da Ide!!!!
        </div>
    </div>
</div>
