@extends('layouts.main')

@section('page_title')
    {{ $page->page_title }}
@endsection

@section('head')
    @isset($page->meta_title)
        <meta name="title" content="{{ $page->meta_title }}" />
    @endisset

    @isset($page->meta_description)
        <meta name="description" content="{{ $page->meta_description }}" />
    @endisset

    @isset($page->meta_keywords)
        <meta name="keywords" content="{{ $page->meta_keywords }}" />
    @endisset
@endsection

@section('content-wrapper')
    <div class="uk-container uk-margin-large{{ $page->size ? " uk-container-$page->size" : '' }}">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header">
                <h1 class="uk-card-title uk-text-center">{{ $page->title }}</h1>
            </div>
            <div class="uk-card-body">
                {!! html_entity_decode($page->content) !!}
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
