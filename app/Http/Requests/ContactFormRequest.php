<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
	        "firstname" => "required|string|alpha_dash|min:4",
	        "lastname"  => "required|string|alpha_dash|min:4",
	        "email"     => "nullable|required_without:phone|email",
	        "phone"     => "nullable|required_without:email|phone:AUTO,RS",
	        "company"   => "nullable|string|max:100",
	        "message"   => "required|string|min:10|max:1000"
        ];
    }
}
