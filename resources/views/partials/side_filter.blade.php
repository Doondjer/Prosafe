
    <div class="uk-card uk-card-default uk-card-small">
        <div class="uk-card-header">Filteri</div>

        <form method="GET" action="{{ route('products.index') }}">
            <div class="uk-card-header">
                <label for="kategorija_side_selectbox" class="uk-text-small uk-text-bold">Kategorija:</label>
                <select id="kategorija_side_selectbox" name="kategorija" class="uk-select">
                    <option value="">Kategorija...</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}"{{ request()->get('category') == $category->slug ? ' selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @foreach($filters as $label => $filter)
                <div class="uk-card-header">
                    <label for="type_{{ strtolower(str_replace('', '_', $label)) }}_side_checkboxes" class="uk-text-small uk-text-bold">{{ $label }}:</label>
                    <ul id="type_{{ strtolower(str_replace('', '_', $label)) }}_side_checkboxes" class="uk-nav">
                        @foreach($filter as $index => $option)
                            <li>
                                <input type="checkbox" name="{{ $option->slug }}[]" id="{{ $option->slug }}_{{ $index }}_side_row_checkbox" class="uk-checkbox uk-margin-small-right" value="{{ $option->value }}">
                                <label for="{{ $option->slug }}_{{ $index }}_side_row_checkbox">{{ $option->value }}</label> {{--<span>({{ $option->nb_products }})</span>--}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
            <div class="uk-card-header">
                <button type="submit" class="uk-button uk-button-success uk-width-1-1">Filtriraj</button>
            </div>
        </form>
    </div>
