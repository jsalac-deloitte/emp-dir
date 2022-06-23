<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            "companyName" => $this->company_name,
            "address" => $this->address,
            "email" => $this->email,
            "contactPerson" => $this->contact_person,
            "contactNumber" => $this->contact_no,
            "createdAt" => date_format($this->created_at,"Y-M-d H:i:s a"),
            "updatedAt" => date_format($this->updated_at,"Y-M-d H:i:s a"),
            "status" => $this->deleted_at ? "Deleted" : "Active"
        ];
    }
}
