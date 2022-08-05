<?php

namespace App\Http\Requests;

use App\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PagesRequest extends FormRequest
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
        $unique = Rule::unique('pages');

        if($page = $this->route('page')) {
            $unique->ignore($page->id);
        }

        return [
            'slug' => ['required', 'string', $unique, new Slug],
            'title' => 'required|string|max:100',
            'meta_title' => 'required|string|max:70',
            'meta_keywords' => 'nullable|string|max:200',
            'meta_description' => 'nullable|string|max:300',
            'content' => 'required|string|max:3000000000',
            'size' => 'required|string|in:xsmall,small,large,xlarge,expand'
        ];
    }
}
