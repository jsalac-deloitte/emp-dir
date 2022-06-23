<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "name" => $this->name,
            "email" => $this->email,
            "user_type" => $this->user_type,
            "company" => $this->company->company_name,
            "company_id" => $this->company_id,
            "created_at" => date_format($this->created_at,"Y-M-d H:i:s a"),
            "updated_at" => date_format($this->updated_at,"Y-M-d H:i:s a"),
            "status" => $this->deleted_at ? "Deleted" : "Active"
        ];
    }
}
