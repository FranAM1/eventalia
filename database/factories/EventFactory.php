<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'start_date' => $this->faker->dateTimeBetween('-1 days', '+1 days'),
            'end_date' => $this->faker->dateTimeBetween('+2 days', '+10 days'),
            'image' => $this->faker->imageUrl(),
            'address' => $this->faker->address,
            'max_participants' => $this->faker->numberBetween(1, 100),
            'city_id' => $this->faker->numberBetween(1, 3),
            'province_id' => $this->faker->numberBetween(1, 5),
            'category_id' => $this->faker->numberBetween(1, 8),
            'user_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
