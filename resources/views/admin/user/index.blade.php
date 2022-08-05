@extends('admin.layouts.form.index', [
    'cardTitle' => 'Korisnici',
    'newItemRoute' => route('korisnici.create'),
    'formAction' => route('korisnici.index'),
    'items' => $users
])

@section('table-header')
    <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all categories"></th>
    <th class="w-1">ID <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="6 15 12 9 18 15"></polyline></svg>
    </th>
    <th>Naziv</th>
    <th>Email</th>
    <th>Uloge</th>
    <th>Akcija</th>
    <th></th>
@endsection

@section('table-content')
    @foreach($users as $user)
        <tr>
            <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select category"></td>
            <td><span class="text-muted">{{ $user->id }}</span></td>
            <td class="td-truncate">
                <div class="text-truncate">{{ $user->name }}</div>
            </td>
            <td>
                {{ $user->email }}
            </td>
            <td>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $val)
                        <label class="badge badge-green">{{ $val }}</label>
                    @endforeach
                @endif
            </td>
            <td>
                <div class="btn-list flex-nowrap">
                    <a class="btn btn-white" href="{{ route('korisnici.show',$user->id) }}">Pogledaj</a>
                    @if( ! $user->hasRole('super_admin'))
                        @can('user-edit')
                            <a href="{{ route('korisnici.edit', $user->id) }}" class="btn btn-white">
                                Izmeni
                            </a>
                        @endcan
                        @can('user-delete')
                            <form action="{{ route('korisnici.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-white" type="submit">Obriši</button>
                            </form>
                        @endcan
                    @endif
                </div>
            </td>
        </tr>
    @endforeach
@endsection
{{--

@extends('admin.layouts.main')

@section('title')Kategorije - {{ config('app_settings.values.app_name') }}@endsection


@section('header-title')
    <h2 class="page-title">
        Lista Kategorija
    </h2>
@endsection

@section('header-actions')
    <div class="btn-list">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-green d-none d-sm-inline-block">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Kreiraj Novu Kategoriju
        </a>
    </div>
@endsection

@section('body-content')
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kategorije</h3>
                    </div>
                    <div class="card-body border-bottom py-3">
                        <form method="GET" action="{{ route('admin.categories.index') }}" class="d-flex">
                            <div class="text-muted">
                                Show
                                <div class="mx-2 d-inline-block">
                                    <input type="text" class="form-control form-control-sm" value="{{ $categories->perPage() }}" name="per_page" size="3" aria-label="Categories per page">
                                </div>
                                entries
                            </div>
                            <div class="ms-auto text-muted">
                                Search:
                                <div class="ms-2 d-inline-block input-icon">
                                    <input type="text" class="form-control" value="{{ $query }}" name="q" aria-label="Search categories">
                                </div>
                                <button type="submit" class="btn btn-green btn-icon" aria-label="Button">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="21" y1="21" x2="15" y2="15"></line></svg>

                                    <!-- SVG icon code -->
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <thead>
                            <tr>
                                <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all categories"></th>
                                <th class="w-1">ID <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="6 15 12 9 18 15"></polyline></svg>
                                </th>
                                <th>Naziv</th>
                                <th>Pozicija</th>
                                <th>Br. Proizvoda</th>
                                <th>Status</th>
                                <th>Akcija</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($categories->total())
                                    @foreach($categories as $category)
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select category"></td>
                                            <td><span class="text-muted">{{ $category->id }}</span></td>
                                            <td class="td-truncate">
                                                <div class="text-truncate">{{ $category->name }}</div>
                                            </td>
                                            <td>
                                                {{ $category->order }}
                                            </td>
                                            <td>
                                                25
                                            </td>
                                            <td>
                                                <span class="badge bg-{{ $category->is_visible ? 'success' : 'warning' }} me-1"></span>
                                                {{ $category->is_visible ? 'aktivna' : 'neaktivna' }}
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="{{ route('admin.categories.edit', ['category' => $category->slug]) }}" class="btn btn-white">
                                                        Izmeni
                                                    </a>
                                                    <a href="#" class="btn btn-white">
                                                        Obriši
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">


                                            <div class="empty">
                                                <div class="empty-icon"><!-- Download SVG icon from http://tabler-icons.io/i/mood-sad -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><line x1="9" y1="10" x2="9.01" y2="10"></line><line x1="15" y1="10" x2="15.01" y2="10"></line><path d="M9.5 15.25a3.5 3.5 0 0 1 5 0"></path></svg>
                                                </div>
                                                <p class="empty-title">Nema pronadjenih kategorija</p>
                                                <p class="empty-subtitle text-muted">
                                                    Pokušaj da prilagodiš pretragu ili filtere za ono što tražiš.
                                                </p>
                                            </div>


                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @if($categories->total())
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-muted">Prikazano <span>{{ $categories->firstItem() }}</span> do <span>{{ $categories->lastItem() }}</span> od <span>{{ $categories->total() }}</span> kategorija</p>
                            {{ $categories->withQueryString()->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
--}}
