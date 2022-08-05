{{--   Naziv Kategorije   --}}
@include('admin.partials.form_group', [
    'required' => true,
    'label' => 'Naziv',
    'tagName' => 'name',
    'placeholder' => 'Unesite Naziv Kategorije...',
    'hint' => 'Pun Naziv Kategorije koji će biti prikazan u listi.',
])
{{--   Slug Kategorije   --}}
@include('admin.partials.form_group', [
    'required' => true,
    'label' => 'Slug Kategorije',
    'tagName' => 'slug',
    'placeholder' => 'Unesite Slug Kategorije...',
    'hint' => 'Slug Kategorije koji će biti prikazan u traci za pretraživanje browsera. Mora biti unikatan.',
])
{{--   Pozicija Kategorije   --}}
@include('admin.partials.form_group', [
    'required' => true,
    'label' => 'Pozicija Kategorije',
    'tagName' => 'order',
    'placeholder' => 'Unesite Poziciju Kategorije...',
    'hint' => 'Redosled po kojem će kategorija biti prikazana u listi.',
])
{{--   Opis Kategorije   --}}
@include('admin.partials.form_group', [
    'tagType' => 'textarea',
    'required' => false,
    'label' => 'Opis Kategorije',
    'tagName' => 'description',
    'placeholder' => 'Opis Kategorije...',
    'hint' => 'Da li ce uopste biti korisceno negde!!? Bice prikazan i HTML tagovi.',
])
{{--   Meta Title Kategorije   --}}
@include('admin.partials.form_group', [
    'required' => false,
    'label' => 'Meta Title Kategorije',
    'tagName' => 'meta_title',
    'placeholder' => 'Unesite Meta Title...',
    'hint' => trans('app_settings.site.meta_title'),
])
{{--   Meta Description Kategorije   --}}
@include('admin.partials.form_group', [
    'tagType' => 'textarea',
    'required' => false,
    'label' => 'Meta Description Kategorije',
    'tagName' => 'meta_description',
    'placeholder' => 'Unesite Meta Opis...',
    'hint' => trans('app_settings.site.meta_description'),
])
{{--   Meta Keywords Kategorije   --}}
@include('admin.partials.form_group', [
    'tagType' => 'textarea',
    'required' => false,
    'label' => 'Meta Keywords Kategorije',
    'tagName' => 'meta_keywords',
    'placeholder' => 'Unesite Meta Ključne reči...',
    'hint' => trans('app_settings.site.meta_keywords'),
])
{{--   Vidljivost Kategorije U Listi --}}
@include('admin.partials.form_group', [
    'tagType' => 'radio',
    'tagClass' => 'col-md-5',
    'label' => 'Vidljivost u listi',
    'tagName' => 'published_at',
 //   'checked' => true,
    'placeholder' => 'Da Li Je Kategorija Aktivna?',
    'hint' => 'Uključite ili isključite prikazivanje kategorije u listi?',
])
