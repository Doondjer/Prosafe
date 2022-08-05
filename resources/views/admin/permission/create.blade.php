@extends('admin.layouts.form.create_edit', [
    'breadcrumbLinks' => ['Dozvole(Permissions)' => route('dozvole.index')],
    'formAction' => route('dozvole.store'),
    'formMethod' => 'POST',
])

@section('form_title', 'Kreiraj Dozvolu')
@section('form_title_action', 'Kreiraj Nove Dozvole')

@section('form_content')
    @include('admin.partials._permission_form')
@endsection
