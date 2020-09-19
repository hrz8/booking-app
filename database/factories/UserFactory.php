<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $atuh = [
            'id' => $this->faker->uuid,
            'name' => $this->faker->name,
            'username' => $this->faker
                               ->unique()
                               ->userName,
            'password' => Hash::make('12345678')
        ];
        return $atuh;
    }
}
