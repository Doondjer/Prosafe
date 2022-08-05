
{{--   Naslov Stranice --}}
@include('admin.partials.form_group', [
    'required' => true,
    'label' => 'Naslov Stranice',
    'tagName' => 'title',
    'placeholder' => 'Unesite Naslov Stranice...',
    'hint' => 'Naslov Stranice.',
])
{{--   Slug Stranice   --}}
@include('admin.partials.form_group', [
    'required' => true,
    'label' => 'Slug Stranice',
    'tagName' => 'slug',
    'placeholder' => 'Unesite Slug Stranice...',
    'hint' => 'Slug Stranice koji će biti prikazan u traci za pretraživanje browsera. Mora biti unikatan.',
])
{{--   Veličina Stranice   --}}
@include('admin.partials.form_group', [
    'required' => true,
    'tagType' => 'selectbox',
    'label' => 'Veličina Kontejnera Stranice',
    'tagName' => 'size',
    'placeholder' => 'Unesite Veličina Kontejnera Stranice...',
    'hint' => 'Veličina Kontejnera Stranice u kojoj će biti prikazan sadržaj.',
    'data' => [
        'xsmall' => 'Xsmall',
        'small' => 'Small',
        'large' => 'Large',
        'xlarge' => 'Xlarge',
        'expand' => 'Expand',
    ]
])
{{--   Sadržaj Stranice   --}}
@include('admin.partials.form_group', [
    'tagType' => 'wysiwyg',
    'required' => true,
    'label' => 'Sadržaj Stranice',
    'tagName' => 'content',
    'placeholder' => 'Unesite Sadržaj Stranice...',
    'hint' => "Unesite sadržaj koji će biti prikazana na stranici. Može se unositi HTML",
])
{{--   Meta Title Stranice   --}}
@include('admin.partials.form_group', [
    'tagType' => 'textarea',
    'required' => true,
    'label' => 'Meta Title Stranice...',
    'tagName' => 'meta_title',
    'placeholder' => 'Unesite Meta Title Za Ovu Stranicu...',
    'hint' => trans('app_settings.site.meta_title'),
])

{{--   Meta Keywords Stranice   --}}
@include('admin.partials.form_group', [
    'tagType' => 'textarea',
    'required' => false,
    'label' => 'Meta Keywords Stranice...',
    'tagName' => 'meta_keywords',
    'placeholder' => 'Unesite Meta Ključne reči Za Ovu Stranicu...',
    'hint' => trans('app_settings.site.meta_keywords'),
])

{{--   Meta Opis Stranice   --}}
@include('admin.partials.form_group', [
    'tagType' => 'textarea',
    'required' => false,
    'label' => 'Meta Opis Stranice...',
    'tagName' => 'meta_description',
    'placeholder' => 'Unesite Meta Opis Za Ovu Stranicu...',
    'hint' => trans('app_settings.site.meta_description'),
])
