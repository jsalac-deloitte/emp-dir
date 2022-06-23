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
            "password" => "required|max:195",
            "confirm_password" => "required|same:password",
            "company_id"    => "required|exists:companies,id"
        ];
    }
}
