<div class="form-group mb-3">
    <label class="form-label{{ isset($required) && $required ? ' required' : '' }}">{{ $label }}</label>
    <div class="{{ isset($tagClass) && $tagClass ? $tagClass : '' }}">
        @if(isset($tagType) && $tagType == 'radio')
            <label class="row{{ $errors->has($tagName) ? ' is-invalid' : '' }}">
                <span class="col-auto">
                    <label class="form-check form-check-single form-switch">
                        <input class="form-check-input{{ $errors->has($tagName) ? ' is-invalid' : '' }}" type="checkbox" name="{{ $tagName }}" aria-describedby="{{ str_replace(' ', '', $label) }}" value="{{ $tagValue ?? true }}"{{ old($tagName, $model->$tagName ?? '') ? ' checked' : '' }}>
                        </label>
                </span>
                <span class="col">{{ $placeholder }}</span>
            </label>
        @elseif(isset($tagType) && $tagType == 'datepicker')
            <div class="input-icon mb-2{{ $errors->has($tagName) ? ' is-invalid' : '' }}">
                <input class="form-control{{ $errors->has($tagName) ? ' is-invalid' : '' }}" type="text" name="{{ $tagName }}" placeholder="{{ $placeholder }}" id="datepicker-{{ $tagName }}" value="{{ old($tagName, $model->$tagName ?? '') }}">
                <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="4" y="5" width="16" height="16" rx="2"></rect><line x1="16" y1="3" x2="16" y2="7"></line><line x1="8" y1="3" x2="8" y2="7"></line><line x1="4" y1="11" x2="20" y2="11"></line><line x1="11" y1="15" x2="12" y2="15"></line><line x1="12" y1="15" x2="12" y2="18"></line></svg>
                              </span>
            </div>
            @push('javascript-stack')
                <script>
                    // @formatter:off
                    document.addEventListener("DOMContentLoaded", function () {
                        window.Litepicker && (new Litepicker({
                            element: document.getElementById('datepicker-{{ $tagName }}'),
                            autoApply: true,
                            autoRefresh: true,
                            buttonText: {
                                previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>`,
                                nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>`,
                            },
                        }));
                    });
                    // @formatter:on
                </script>
            @endpush
        @elseif(isset($tagType) && $tagType == 'wysiwyg')

             <textarea id="wysiwyg-{{ $tagName }}" class="form-control{{ $errors->has($tagName) ? ' is-invalid' : '' }}" rows="{{ $rows ?? '16' }}" name="{{ $tagName }}" placeholder="{{ $placeholder }}">{{ old($tagName, $model->$tagName ?? '') }}</textarea>
             @push('javascript-stack')
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#wysiwyg-{{ $tagName }}' ), {
                            toolbar: [ 'heading','|', 'undo', 'redo', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                            heading: {
                                options: [
                                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                                ]
                            }
                        } )
                        .catch( error => {
                            console.log( error );
                        } );
                </script>
            @endpush
        @elseif(isset($tagType) && $tagType == 'multi_checkbox')
            <div class="ms-4{{ $errors->has($tagName) ? ' is-invalid' : '' }}">
                @foreach($data as $key => $name)
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox" name="{{ $tagName }}[]" value="{{ $key }}"{{ in_array($key, old($tagName, isset($model) && $model->$tagName ? $model->{$tagName}->pluck($modelKey ?? 'slug')->toArray() : [])) ? ' checked' : '' }}>
                        <span class="form-check-label">{{ $name }}</span>
                    </label>
                @endforeach
            </div>
        @elseif(isset($tagType) && $tagType == 'upload')
            <input type="file" class="form-control{{ $errors->has($tagName) ? ' is-invalid' : '' }}" name="{{ $tagName }}[]" multiple>
        @elseif(isset($tagType) && $tagType == 'password')
            <input type="password" class="form-control{{ $errors->has($tagName) ? ' is-invalid' : '' }}" name="{{ $tagName }}" value="{{ old($tagName) }}" aria-describedby="{{ str_replace(' ', '', $label) }}" placeholder="{{ $placeholder }}">
        @elseif(isset($tagType) && $tagType == 'selectbox')
            <select name="{{ $tagName }}" id="selectbox-{{ $tagName }}" class="form-select">
                @foreach($data as $key => $name)
                    <option value="{{ $key }}"{{ old($tagName, $model->$tagName ?? '') ==  $key  ? ' selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
       @elseif(isset($tagType) && $tagType == 'textarea')
            <textarea class="form-control{{ $errors->has($tagName) ? ' is-invalid' : '' }}" rows="{{ $rows ?? '6' }}" name="{{ $tagName }}" placeholder="{{ $placeholder }}">{{ old($tagName, $model->$tagName ?? '') }}</textarea>
        @else
            <input type="text" class="form-control{{ $errors->has($tagName) ? ' is-invalid' : '' }}" name="{{ $tagName }}" value="{{ old($tagName, $model->$tagName ?? '') }}" aria-describedby="{{ str_replace(' ', '', $label) }}" placeholder="{{ $placeholder }}">
        @endif
        @error($tagName)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <small class="form-hint">{{ $hint }}</small>
    </div>
</div>
