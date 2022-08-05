@extends('admin.layouts.form.create_edit', [
    'breadcrumbLinks' => ['Korisnici' => route('korisnici.index')],
    'formAction' => route('korisnici.update', ['user' => $model]),
    'formMethod' => 'PATCH',
])

@section('form_title', 'Izmeni Korisnika')
@section('form_title_action', 'Izmeni Postojećeg Korisnika')

@section('form_content')
    @include('admin.partials._user_form')
@endsection
