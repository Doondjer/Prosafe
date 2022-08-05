@extends('admin.layouts.form.create_edit', [
    'breadcrumbLinks' => ['Korisnici' => route('korisnici.index')],
    'formAction' => route('korisnici.store'),
    'formMethod' => 'POST',
])

@section('form_title', 'Kreiraj Korisnika')
@section('form_title_action', 'Kreiraj Novog Korisnika')

@section('form_content')
    @include('admin.partials._user_form')
@endsection
