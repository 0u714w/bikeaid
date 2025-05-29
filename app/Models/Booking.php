<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
    'customer_name',
    'service_type',
    'appointment_time',
    'location',
    'status',
];

}
