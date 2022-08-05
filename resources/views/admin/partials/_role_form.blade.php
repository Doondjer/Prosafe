{{--   Naziv Dozvole   --}}
@include('admin.partials.form_group', [
    'required' => true,
    'label' => 'Naziv',
    'tagName' => 'name',
    'placeholder' => 'Unesite Naziv Uloge...',
    'hint' => 'Pun Naziv Uloge koji će biti prikazan pri odabiru u listi.',
])
<div class="ms-4{{ $errors->has('permission') ? ' is-invalid' : '' }}">
    @foreach($permissions as $permission)
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->name }}"{{ in_array($permission->name, old('permission', isset($model) && $model->permissions ? $model->permissions->pluck('name')->toArray() : [])) ? ' checked' : '' }}>
            <span class="form-check-label">{{ $permission->name }}</span>
        </label>
    @endforeach
</div>
@error('permission')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
<small class="form-hint">Odaberite Dozvole koje će biti dodeljene ovoj ulozi</small>


