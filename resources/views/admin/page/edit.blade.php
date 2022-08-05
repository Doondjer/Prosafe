@extends('admin.layouts.form.create_edit', [
    'breadcrumbLinks' => ['Dodatne Stranice' => route('stranice.index')],
    'formAction' => route('stranice.update', ['page' => $model]),
    'formMethod' => 'PATCH',
])

@section('form_title', "Izmeni Stranicu")
@section('form_title_action', "Izmeni Stranicu $model->title")

@section('form_content')
    @include('admin.partials._pages_form')
@endsection

@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
@endsection
