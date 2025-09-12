<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserInfoRequest extends FormRequest
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
            "id" => "required",
            "firstname" => "required|string|min:2",
            "middlename" => "string|min:2",
            "lastname" => "required|string|min:2",
            "email" => ["required","email","email:rfc,dns",Rule::unique("users", "email")->ignore($this->id)],
            "username" => [
            "string",
            "min:5",
            Rule::unique('users', 'username')->ignore($this->id),
            ],
            "password" => "string|min:6",
            "usertype" => "integer",
            "prefix" => "string",
            "suffix" => "string"
        ];
    }

    public function messages(){
        return[
            "username.unique" => "Username already exists.",
            "email.unique" => "Email already exists."
        ];
    }
}