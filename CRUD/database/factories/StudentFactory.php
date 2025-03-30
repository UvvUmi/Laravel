<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;
use App\Models\Group;
use App\Http\Controllers\StudentController;

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
        $row_birth_date = $this->faker->date;
        $row_gender = $this->faker->randomElement(['M', "F"]);
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'city_id' => City::inRandomOrder()->first()->id ?? 1, // Priskiria atsitiktinį miestą
            'group_id' => Group::inRandomOrder()->first()->id ?? 1,
            'birth_date' => $row_birth_date,
            'gender'=> $row_gender,
            'personal_number' => StudentController::genIdNumber($row_birth_date, $row_gender),
        ];
    }

}
