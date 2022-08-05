@extends('admin.layouts.form.create_edit', [
    'breadcrumbLinks' => ['Dodatne Stranice' => route('stranice.index')],
    'formAction' => route('stranice.store'),
    'formMethod' => 'POST',
])

@section('form_title', 'Kreiraj Stranice')
@section('form_title_action', 'Kreiraj Novu Stranicu')

@section('form_content')
    @include('admin.partials._pages_form')
@endsection

@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
@endsection
