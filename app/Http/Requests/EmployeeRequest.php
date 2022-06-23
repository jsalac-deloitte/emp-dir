<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
    public function rules($id)
    {
        return [
            "company_id" => "required|exists:companies,id",
            "department_id" => "required|exists,departments,id",
            "emp_code" => "required|max:195|unique:employees,emp_code,".$id,
            "first_name" => "required|max:195",
            "last_name" => "required|max:195",
            "position" => "required|max:195"
        ];
    }
}
