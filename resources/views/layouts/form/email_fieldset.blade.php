<div class="uk-margin">
    <label class="uk-form-label uk-text-bolder" for="text_{{ $name }}">{{ $label }}</label>
    <div class="uk-form-controls">
        <input class="uk-input{{ $errors->has($name) ? ' uk-form-danger' : '' }}" id="text_{{ $name }}" type="email" name="{{ $name }}" value="{{ old($name, $model->$name ?? '') }}" placeholder="{{ $placeholder ?? '' }}">
        @error($name)
            <span class="uk-text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
