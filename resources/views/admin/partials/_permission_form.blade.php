{{--   Naziv Dozvole   --}}
@include('admin.partials.form_group', [
    'required' => true,
    'label' => 'Naziv',
    'tagName' => 'name',
    'placeholder' => 'Unesite Naziv Dozvole...',
    'hint' => 'Pun Naziv Dozvole koji će biti prikazan pri odabiru u listi.',
])

