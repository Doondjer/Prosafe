<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:100',
            'slug' => 'required|alpha_dash|unique:App\Models\Category,slug|max:150',
            'order' => 'required|integer|numeric',
            'published_at' => 'boolean',
            'description' => 'nullable|string|max:300',
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:200',
            'meta_keywords' => 'nullable|string|max:300',
        ];
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
