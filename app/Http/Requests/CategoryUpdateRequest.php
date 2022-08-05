<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $category = $this->route('category');

        return array_merge(
            (new CategoryRequest())->rules(),
            [
                'slug' => ['required', 'alpha_dash', Rule::unique('categories')->ignore($category->id),'max:150'],
            ]
        );
    }

    /**
     * Mutate is_visible boolean to false if unchecked on page
     */
    protected function prepareForValidation()
    {
        if( ! $this->request->get('published_at')){
            $this->merge([
               'published_at' => false
            ]);
        }

        parent::getValidatorInstance();
    }
}
