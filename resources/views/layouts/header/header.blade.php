
<div class="uk-navbar-container uk-light uk-background-secondary uk-navbar-transparent uk-grid uk-grid-small slim-navbar">
    <div class="uk-width-expand narrow">
        <ul class="uk-breadcrumb uk-text-center uk-margin-remove">
            <li class="uk-text-primary">BESPLATNO SLANJE za Srbiju i porudžbine kablova > 7000 RSD</li>
            <li><span class="uk-text-success uk-text-bold uk-text-nowrap"><a href="tel:{{ config('app_settings.values.sales_phone') }}" uk-icon="icon: phone" aria-label="Telefon-Prodaja"></a><a class="uk-text-success uk-link uk-text-nowrap" href="tel:{{ config('app_settings.values.sales_phone') }}"> Prodaja {{ config('app_settings.values.sales_phone') }}</a></span></li>
            <li><span class="uk-text-success uk-text-bold uk-text-nowrap"><a href="tel:{{ config('app_settings.values.customer_service_phone') }}" uk-icon="icon: phone" aria-label="Telefon_Podrska"></a> <a class="uk-text-success uk-link uk-text-nowrap" href="tel:{{ config('app_settings.values.customer_service_phone') }}"> Podrska Kupcima {{ config('app_settings.values.customer_service_phone') }}</a></span></li>
        </ul>
    </div>

    <div class="uk-width-auto narrow uk-visible@l">
        <ul class="uk-breadcrumb uk-margin-remove">
            @if(Auth::user())
                <li>
                    <a href="#" class=" uk-text-bold">{{ Auth::user()->name }} <span uk-icon="chevron-down"></span></a>
                    <div uk-drop="mode: click">
                        <div class="uk-card uk-card-small uk-card-secondary">
                            <div class="uk-card-header uk-margin-small-top"></div>
                            <div class="uk-card-body">
                                <ul class="uk-nav-default uk-nav-center uk-dropdown-nav" uk-nav>
                                    @if(Auth::user()->can('access-admin-area'))
                                        <li><a href="{{ route('admin_homepage') }}">Administratorski Deo</a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="uk-card-footer uk-text-center">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="uk-button uk-button-link">Odjavi se</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            @else
                {{--<li><a href="/register">Registracija</a></li>--}}
                <li><a href="/login">Prijavi se</a></li>
            @endif
            <li><a href="#"><span class="uk-text-success uk-text-bold" uk-icon="icon: shopping-cart"></span>(0)</a></li>
        </ul>
    </div>
</div>
<nav class="uk-navbar-container uk-light uk-background-secondary uk-navbar-transparent" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li><a href="#" class="uk-hidden@l uk-button uk-button-default" uk-icon="icon: bars; ratio: 1.5" uk-toggle="target: #nav_side_menu" aria-label="Meni"></a></li>
        </ul>
    </div>
    <div class="uk-navbar-brand">
        <a href="{{ route('homepage') }}" class="uk-navbar-item uk-logo">
            <img src="{{ config('app_settings.values.logo_url') }}" class="uk-margin-small-right" alt="{{ config('app_settings.values.app_name') }}">
        </a>
    </div>
    <ul class="uk-navbar-nav uk-visible@l">
        @foreach($categories as $category)
            <li class=""><a href="{{ route('products.index', ['category' => $category->slug ]) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
    <div class="uk-navbar-right">

        <ul class="uk-navbar-nav uk-visible@l">
            <li><a href="#">Lista Želja</a></li>
            <li><a href="#">Uporedi</a></li>
        </ul>
        <ul class="uk-navbar-nav uk-hidden@l">
            <li><a href="#" uk-icon="icon: shopping-cart; ratio: 1.5" aria-label="Korpa"></a></li>
        </ul>
    </div>
</nav>


