<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [
        'customer_name' => 'required|string|max:255',
        'service_type' => 'required|string|max:255',
        'location' => 'required|string|max:255', // 👈 Add this
        'appointment_time' => 'required|date',
        'price' => 'nullable|integer',
        'duration' => 'nullable|string',
        'notes' => 'nullable|string|max:500',

    ];
}

}
