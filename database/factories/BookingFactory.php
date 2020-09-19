<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'pod_name' => $this->faker->unique()->city,
            'discount_percentage' => $this->faker->randomElement([0.00, 0.10, 0.15, 0.20, 0.25]),
            'pay_amount' => $this->faker->numberBetween(7, 10),
            'transaction_at' => $this->faker->dateTime()
        ];
    }
}
