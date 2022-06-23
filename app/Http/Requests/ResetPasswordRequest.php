<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            "email" => "required|email:rfc,dns||exists:users,email",
            "token"   => "required|exists:password_resets,token",
            "password" => "required|max:195|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,}$/",
            "confirm_password" => "required|max:195|same:password"
        ];
    }


    /**
     * error messages
     * @return array
     */
    public function messages() 
    {
        return [
            "email.required" => "Email is required",
            "email.exists"   => "Sorry we cannot find your email. please check it and try again",
            "token.required" => "Token is required to reset your password",
            "token.exists"   => "Invalid token - please check and try again",
            "password.required" => "Password  is required",
            "password.min" => "Password  is atleast 6 characters",
            "password.regex" => "Password should contain Capital letter, small letter and number"
        ];
    }
}
