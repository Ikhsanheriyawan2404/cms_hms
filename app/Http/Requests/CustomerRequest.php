<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'company' => 'required|max:2048',
            'phone_number' => 'required',
            'address' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048'
        ];
    }
}
