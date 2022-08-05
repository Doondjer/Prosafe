@extends('admin.layouts.form.create_edit', [
    'breadcrumbLinks' => ['Kategorije' => route('kategorije.index')],
    'formAction' => route('kategorije.update', ['category' => $model]),
    'formMethod' => 'PATCH',
])

@section('form_title', 'Izmeni Kategoriju')
@section('form_title_action', 'Izmeni Postojeću Kategoriju')

@section('form_content')
    @include('admin.partials._category_form')
@endsection
