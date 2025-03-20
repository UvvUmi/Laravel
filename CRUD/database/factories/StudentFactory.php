<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;
use App\Models\Group;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'city_id' => City::inRandomOrder()->first()->id ?? 1,
            'grupe_id' => Group::inRandomOrder()->first()->id ?? 1,
            'asmens_kodas' => intval("{$this->faker->randomNumber(9, true)}{$this->faker->randomNumber(2, true)}"),
            'gimimo_data' => $this->faker->date,
            
        ];
    }
}
