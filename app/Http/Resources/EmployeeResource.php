<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "emp_code" => $this->emp_code,
            "last_name" => $this->last_name,
            "first_name" => $this->first_name,
            "middle_name" => $this->middle_name,
            "fullname" => $this->fullname,
            "position" => $this->position,
            "mobile_no" => $this->mobile_no,
            "email" => $this->email,
            "department_id" => $this->department_id,
            "department" => $this->department->department_name,
            "company_id" => $this->company->id,
            "company" => $this->company->company_name,
            "created_at" => date_format($this->created_at,"Y-M-d H:i:s a"),
            "updated_at" => date_format($this->updated_at,"Y-M-d H:i:s a"),
            "status" => $this->deleted_at ? "Deleted" : "Active"
        ];
    }
}
