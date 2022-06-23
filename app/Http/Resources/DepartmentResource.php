<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
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
            "departmentName" => $this->department_name,
            "user" => $this->user->name,
            "companyName" => $this->user->company->company_name,
            "createdAt" => date_format($this->created_at,"Y-M-d H:i:s a"),
            "updatedAt" => date_format($this->updated_at,"Y-M-d H:i:s a"),
            "status" => $this->deleted_at ? "Deleted" : "Active"
        ];
    }
}
