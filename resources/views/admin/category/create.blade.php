@extends('admin.layouts.form.create_edit', [
    'breadcrumbLinks' => ['Kategorije' => route('kategorije.index')],
    'formAction' => route('kategorije.store'),
    'formMethod' => 'POST',
])

@section('form_title', 'Kreiraj Kategoriju')
@section('form_title_action', 'Kreiraj Novu Kategoriju')

@section('form_content')
    @include('admin.partials._category_form')
@endsection
