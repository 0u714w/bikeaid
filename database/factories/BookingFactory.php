<?php
// filepath: /Users/douglassenas/mobile-bike-repair/database/factories/BookingFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    protected $model = \App\Models\Booking::class;

    public function definition(): array
    {
        return [
            'customer_name' => $this->faker->name(),
            'service_type' => $this->faker->randomElement(['Repair', 'Maintenance', 'Inspection']),
            'appointment_time' => $this->faker->dateTimeBetween('now', '+1 month'),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'completed']),
        ];
    }
}