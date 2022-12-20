<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" =>  $this->name,
            "email" =>  $this->email,
            "phone" =>  $this->phone,
            "role" =>  $this->role,
            "status" =>  $this->status,
            "avatar" =>  $this->avatar,
            'address' => $this->customer_info->address,
            'user_type' => $this->customer_info->type
        ];
    }
}
