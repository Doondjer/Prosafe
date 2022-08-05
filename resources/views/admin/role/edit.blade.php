@extends('admin.layouts.form.create_edit', [
    'breadcrumbLinks' => ['Uloga(Role)' => route('uloge.index')],
    'formAction' => route('uloge.update', ['role' => $model]),
    'formMethod' => 'PATCH',
])

@section('form_title', 'Izmeni Ulogu')
@section('form_title_action', 'Izmeni Postojeću Ulogu')

@section('form_content')
    @include('admin.partials._role_form')
@endsection
