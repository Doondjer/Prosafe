@extends('admin.layouts.form.create_edit', [
    'breadcrumbLinks' => ['Proizvodi' => route('proizvodi.index')],
    'formAction' => route('proizvodi.update', ['product' => $model]),
    'formMethod' => 'PATCH',
    'enctype' => 'enctype=multipart/form-data'
])

@section('form_title', 'Izmeni Proizvod')
@section('form_title_action', 'Izmeni Postojeći Proizvod')

@section('form_content')
    @include('admin.partials._product_form')
@endsection

@section('script')
    <script src="{{ asset('js/litepicker.js') }}"></script>
@endsection
