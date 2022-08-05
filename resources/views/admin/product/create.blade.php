@extends('admin.layouts.form.create_edit', [
    'breadcrumbLinks' => ['proizvodi' => route('proizvodi.index')],
    'formAction' => route('proizvodi.store'),
    'formMethod' => 'POST',
    'enctype' => 'enctype=multipart/form-data'
])

@section('form_title', 'Kreiraj Proizvod')
@section('form_title_action', 'Kreiraj Nov Proizvod')

@section('form_content')
    @include('admin.partials._product_form')
@endsection

@section('script')
    <script src="{{ asset('js/litepicker.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
@endsection
