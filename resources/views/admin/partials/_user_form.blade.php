{{--   Ime Korisnika   --}}
@include('admin.partials.form_group', [
    'required' => true,
    'label' => 'Ime Korisnika',
    'tagName' => 'name',
    'placeholder' => 'Unesite Ime Korisnika...',
    'hint' => 'Unesite puno Ime i Prezime Korisnika.',
])
{{--   Email Korisnika   --}}
@include('admin.partials.form_group', [
    'required' => true,
    'label' => 'Email Korisnika',
    'tagName' => 'email',
    'placeholder' => 'Unesite Email Korisnika...',
    'hint' => 'Unesite email pomoću koga će se korisnik i logovati i koji će moći da proveri.',
])
{{--   Lozinka Korisnika   --}}
@include('admin.partials.form_group', [
    'required' => true,
    'tagType' => 'password',
    'label' => 'Lozinka',
    'tagName' => 'password',
    'placeholder' => 'Unesite Lozinku Korisnika...',
    'hint' => 'Unesite lozinku pomoću koje će se korisnik i logovati. Minimum 6 karaktera.',
])
{{--   Potvrda Lozinke Korisnika   --}}
@include('admin.partials.form_group', [
    'required' => true,
    'tagType' => 'password',
    'label' => 'Potvrda Lozinke',
    'tagName' => 'password_confirmation',
    'placeholder' => 'Potvrdite Lozinku Korisnika...',
    'hint' => 'Unesite ponovo istu lozinku, radi provere.',
])

<div class="form-group mb-3">
    <label class="form-label">Uloga</label>
    <div class="ms-4{{ $errors->has('roles') ? ' is-invalid' : '' }}">
        @foreach($roles as $role)
            <label class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->name }}"{{ in_array($role->name, old('roles', isset($model) && $model->roles ? $model->roles->pluck('name')->toArray() : [])) ? ' checked' : '' }}>
                <span class="form-check-label">{{ $role->name }}</span>
            </label>
        @endforeach
    </div>

    @error('roles')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <small class="form-hint">Odaberite Uloge koje će biti dodeljene ovom Korisniku</small>
</div>
<div class="form-group mb-3">
    <label class="form-label">Dodeljene dozvole pristupa</label>
    @if(isset($model) && $permissions = $model->getAllPermissions())
        <div class="ms-4">
            @foreach($permissions as $permission)
                <span class="badge bg-red-lt">{{ $permission->name }}</span>
            @endforeach
        </div>
    @endif
</div>
