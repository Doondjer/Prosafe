<?php

namespace App\Http\Requests;

use App\Rules\Decimal;
use App\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        $unique = Rule::unique('products');

        if($product = $this->route('product')) {
            $unique->ignore($product->id);
        }

        return [
            'sku' => ['required', $unique, new Slug],
            'name' => 'required|string|max:100',
            'slug' => ['required', 'string', $unique, new Slug],
            'new_at' => 'nullable|boolean',
            'featured_at' => 'nullable|boolean',
            'published_at' => 'nullable|boolean',
            'short_description' => 'nullable|string|min:10|max:200',
            'description' => 'required|string|min:10',
            'meta_title' => 'nullable|string|max:70',
            'meta_keywords' => 'nullable|string|max:200',
            'meta_description' => 'nullable|string|max:300',
            'price' => 'required|numeric|min:0',
            'cost' => 'nullable|numeric|min:0',
            'special_price' => 'nullable|required_with:special_price_from,special_price_to|numeric|lt:price|min:0',
            'special_price_from' => 'nullable|required_with:special_price|date',
            'special_price_to' => 'nullable|required_with:special_price|date|after_or_equal:special_price_from',
            'length' => ['nullable', new Decimal],
            'width' => ['nullable', new Decimal],
            'height' => ['nullable', new Decimal],
            'weight' => ['nullable', new Decimal],
            'categories' => 'array|required|min:1',
            'categories.*' => 'exists:App\Models\Category,slug',
            'product_image' => $product && $product->images->count() === 0 ? 'array|required|min:1' : 'array',
            'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    protected function prepareForValidation()
    {
        if( ! $this->request->get('new_at')){
            $this->merge([
                'new_at' => false
            ]);
        }
        if( ! $this->request->get('featured_at')){
            $this->merge([
                'featured_at' => false
            ]);
        }
        if( ! $this->request->get('published_at')){
            $this->merge([
                'published_at' => false
            ]);
        }

        $this->merge([
            'price' => str_replace(',','.', $this->request->get('price'))
        ]);
        if($this->request->get('cost')) {
            $this->merge([
                'cost' => str_replace(',', '.', $this->request->get('cost'))
            ]);
        }
        if($this->request->get('special_price')) {
            $this->merge([
                'special_price' => str_replace(',', '.', $this->request->get('special_price'))
            ]);
        }

        parent::getValidatorInstance();
    }
}
