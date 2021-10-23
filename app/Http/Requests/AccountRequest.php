<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'thumbnail' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'name' => ['required', 'min:5'],
            'username' => ['required', 'min:5', 'max:25', 'alpha_dash'],
            'email' => ['required', 'email']
        ];
    }
}
