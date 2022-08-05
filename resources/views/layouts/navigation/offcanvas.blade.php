<div id="nav_side_menu" uk-offcanvas="overlay: true" class="uk-hidden@m">
    <div class="uk-offcanvas-bar uk-padding-remove">

        <div uk-toggle="target: #nav_side_menu">
            @if( ! Auth::user())
                <div class="uk-button-group uk-width-expand">
                    <a href="#" class="uk-button uk-button-success uk-width-1-2 uk-text-bold"><span itemprop="register" class="uk-text-capitalize">Registracija</span></a>
                    <a href="/login" class="uk-button uk-button-default uk-width-1-2 uk-text-bold"><span itemprop="login" class="uk-text-capitalize">Prijava</span></a>
                </div>
            @else
                <div class="uk-button-group uk-width-expand">
                    <a href="{{ route('admin_homepage') }}" class="uk-button uk-button-success uk-width-1-2 uk-text-bold"><span itemprop="admin" class="uk-text-capitalize">Admin</span></a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="uk-button uk-button-success uk-width-1-2 uk-text-bold"><span itemprop="logout" class="uk-text-capitalize">Odjava</span></button>
                    </form>
                </div>
            @endif
        </div>

        <div class="uk-panel uk-margin-large-bottom" uk-toggle="target: #nav_side_menu">
            <ul class="uk-nav uk-nav-default">
                <li class="uk-nav-item">
                    <a href="#"><span uk-icon="icon: heart"></span> Lista želja</a>
                </li>
                <li class="uk-nav-item">
                    <a href="#"><span uk-icon="icon: compare"></span> Uporedi</a>
                </li>
                <li class="uk-nav-item">
                    <a href="#"><span uk-icon="icon: shopping-cart"></span> Korpa</a>
                </li>
            </ul>

            <ul class="uk-nav uk-nav-default">
                <li class="uk-nav-item">
                    <div class="uk-navbar-item">Kategorije</div>
                </li>
                @foreach($categories as $category)
                    <li class="uk-nav-item">
                        <a href="{{ route('products.index', [ 'category' => $category->slug ]) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
