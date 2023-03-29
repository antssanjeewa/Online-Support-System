<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "ref_number" => $this->ref_number,
            "customer_name" => $this->customer_name,
            "description" => $this->description,
            "email" => $this->email,
            "phone_number" => $this->phone_number,
            "is_opened" => $this->is_opened,
            "status" => $this->status
        ];
    }
}
