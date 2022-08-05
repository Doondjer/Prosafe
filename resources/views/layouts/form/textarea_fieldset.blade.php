<div class="uk-margin">
    <label class="uk-form-label uk-text-bolder" for="text_{{ $name }}">{{ $label }}</label>
    <div class="uk-form-controls">
        <textarea class="uk-textarea{{ $errors->has($name) ? ' uk-form-danger' : '' }}" id="text_{{ $name }}" name="{{ $name }}" rows="6" placeholder="{{ $placeholder ?? '' }}">{{ old($name, $model->$name ?? '') }}</textarea>
        @error($name)
            <span class="uk-text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
