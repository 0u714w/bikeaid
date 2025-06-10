<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    public function toArray($request): array
{
    return [
        'id' => $this->id,
        'customer_name' => $this->customer_name,
        'service_type' => $this->service_type,
        'appointment_time' => $this->appointment_time,
        'location' => $this->location,
        'notes' => $this->notes,
        'price' => $this->price,
        'duration' => $this->duration,
        'status' => $this->status,
        'created_at' => $this->created_at->toDateTimeString(),
    ];
}

}