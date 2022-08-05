@extends('admin.layouts.form.create_edit', [
    'breadcrumbLinks' => ['Uloga(Role)' => route('uloge.index')],
    'formAction' => route('uloge.store'),
    'formMethod' => 'POST',
])

@section('form_title', 'Kreiraj Ulogu')
@section('form_title_action', 'Kreiraj Novu Ulogu')

@section('form_content')
    @include('admin.partials._role_form')
@endsection
