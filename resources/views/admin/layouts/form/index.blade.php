@extends('admin.layouts.main')

@section('title'){{ $cardTitle }} - {{ config('app_settings.values.app_name') }}@endsection


@section('header-title')
    <h2 class="page-title">
        {{ $cardTitle }} - Lista
    </h2>
@endsection

@section('header-actions')
    @if(isset($newItemRoute))
        <div class="btn-list">
            <a href="{{ $newItemRoute }}" class="btn btn-green d-none d-sm-inline-block">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Kreiraj Novo
            </a>
        </div>
    @endif
@endsection

@section('body-content')
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $cardTitle }}</h3>
                    </div>
                    <div class="card-body border-bottom py-3">
                        <form method="GET" action="{{ $formAction }}" class="d-flex">
                            <div class="text-muted">
                                Show
                                <div class="mx-2 d-inline-block">
                                    <input type="text" class="form-control form-control-sm" value="{{ $items->perPage() }}" name="per_page" size="3" aria-label="Items per page">
                                </div>
                                entries
                            </div>
                            <div class="ms-auto text-muted">
                                Search:
                                <div class="ms-2 d-inline-block input-icon">
                                    <input type="text" class="form-control" value="{{ $query }}" name="q" aria-label="Search items">
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
                                @yield('table-header')
                            </tr>
                            </thead>
                            <tbody>
                                @if($items->total())
                                    @yield('table-content')
                                @else
                                    <tr>
                                        <td colspan="8">


                                            <div class="empty">
                                                <div class="empty-icon"><!-- Download SVG icon from http://tabler-icons.io/i/mood-sad -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><line x1="9" y1="10" x2="9.01" y2="10"></line><line x1="15" y1="10" x2="15.01" y2="10"></line><path d="M9.5 15.25a3.5 3.5 0 0 1 5 0"></path></svg>
                                                </div>
                                                <p class="empty-title">Nište nije pronađeno!</p>
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
                    @if($items->total())
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-muted">Prikazano <span>{{ $items->firstItem() }}</span> do <span>{{ $items->lastItem() }}</span> od <span>{{ $items->total() }}</span> stavki</p>
                            {{ $items->withQueryString()->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
