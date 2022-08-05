@extends('admin.layouts.form.create_edit', [
    'breadcrumbLinks' => ['Dozvole(Permissions)' => route('dozvole.index')],
    'formAction' => route('dozvole.update', ['permission' => $model]),
    'formMethod' => 'PATCH',
])

@section('form_title', 'Izmeni Dozvolu')
@section('form_title_action', 'Izmeni Postojeću Dozvolu')

@section('form_content')
    @include('admin.partials._permission_form')
@endsection
