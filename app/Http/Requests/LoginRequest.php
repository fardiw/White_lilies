<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $rules=[
            "password"=>"required|min:6",
            "email_or_username"=>"required",
        ];
        if(!request()->has("email")){
            unset($rules["email"]);
        }

        return $rules;

    }

    public function messages()
    {
        return [
            "password.required"=>"وارد کردن پسورد الزامی است !",
            "email_or_username.required"=>"وارد کردن ایمیل یا یوزرنام الزامی است !",
        ];
    }
}
