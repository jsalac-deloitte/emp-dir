<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SmsLogRequest extends FormRequest
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
            "mobile_no" => "required",
            "employee_id" => "required|exists:employees,id",
            "error" => "required",
            "message" => "required"
        ];
    }
}
