@extends('admin.layouts.form.create_edit', [
    'formAction' => route('admin.maintenance.down'),
    'formMethod' => 'POST',
    'cardContent' => app()->isDownForMaintenance()
])

@section('form_title', 'Održavanje Aplikacije')
@section('form_title_action',  ! app()->isDownForMaintenance() ? 'Izađite Iz Moda Održavanja' : 'Postavite Aplikaciju U Mod Održavanja')

@section('form_content')
    {{--   Naziv Kategorije   --}}
    @include('admin.partials.form_group', [
        'required' => false,
        'label' => 'Tajni Kod',
        'tagName' => 'secret',
        'placeholder' => 'Unesite Tajni Kod...',
        'hint' => 'Unesite tajni kod sa kojim je moguće pristupiti aplikaciji iako je modu održavanja ili ostavite prazno da ga sistem generiše.',
    ])
@endsection

@section('card_content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Izađite Iz Moda Održavanja</h4>
        </div>
        <div class="card-body" id="accordion_form">

            <a class="btn btn-danger w-100" href="{{ route('admin.maintenance.up') }}" aria-label="close">Izadji iz moda održavanja</a>

        </div>
    </div>
@endsection
