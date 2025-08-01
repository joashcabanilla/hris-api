<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserCredentialRequest extends FormRequest
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
            "id" => "required|string",
            "username" => [
            "required",
            "string",
            "min:5",
            Rule::unique('users', 'username')->ignore($this->id),
            ],
            "password" => "required|string|min:6",
        ];
    }

    public function messages(){
        return[
            "username.unique" => "Username already exists."
        ];
    }
}