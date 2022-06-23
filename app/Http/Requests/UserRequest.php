<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    public function rules($id = null)
    {
        return [
            "email" => "required|max:195|unique:users,email,".$id,
            "name" => "required|max:195",
            "password" => "required|max:195|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,}$/",
            "confirm_password" => "required|same:password",
            "company_id"    => "required|exists:companies,id,deleted_at,NULL"
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
            "name.required" => "User's name is required",
            "password.required" => "Password  is required",
            "password.min" => "Password  is atleast 6 characters",
            "password.regex" => "Password should contain Capital letter, small letter and number",
            "company_id.required" => "Company Id is required",
            "company_id.exists" => "Invalid company Id",
        ];
    }
}
