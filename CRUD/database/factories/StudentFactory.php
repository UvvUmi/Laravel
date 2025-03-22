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
    public function genIdNumber($birthdate, $gender): string
    {
        $identification_number = "";
        $birth_year = intval(substr($birthdate, 0, -6));

        if ($birth_year < 2000 && $gender == "M") 
            $identification_number .= "3";
        else if ($birth_year < 2000 && $gender == "F")
            $identification_number .= "4";
        else if ($birth_year >= 2000 && $gender == "M")
            $identification_number .= "5";
        else if ($birth_year >= 2000 && $gender == "F")
            $identification_number .= "6";

        $identification_number .= substr($birthdate, 2, -6).substr($birthdate, 5, -3).substr($birthdate, 8).strval($this->faker->randomNumber(3, true));

        $sum = 0;
        for ($i = 0; $i < strlen($identification_number) - 1; $i++) {
            $sum += intval($identification_number[$i]) * ($i + 1);
        }
        $sum += intval($identification_number[9]);

        $control_num = $sum % 11;
        if ($control_num != 10)
            $identification_number .= strval($control_num);
        
        else {
            $sum = 0;
            for ($i = 0; $i < strlen($identification_number) - 3; $i++) {
                $sum += intval($identification_number[$i]) * ($i + 3);
            }
            $sum += intval($identification_number[7]) + (intval($identification_number[8]) * 2) + (intval($identification_number[9]) * 3);

            $control_num = $sum % 11;
            if ($control_num != 10)
                $identification_number .= strval($control_num);
            else $identification_number .= "0";
        }
        return $identification_number;
    }
    
    
    public function definition(): array
    {
        $func_birth_date = $this->faker->date;
        $func_gender = $this->faker->randomElement(['M', "F"]);
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'city_id' => City::inRandomOrder()->first()->id ?? 1, // Priskiria atsitiktinį miestą
            'group_id' => Group::inRandomOrder()->first()->id ?? 1,
            'birth_date' => $func_birth_date,
            'gender'=> $func_gender,
            'personal_number' => $this->genIdNumber($func_birth_date, $func_gender),
        ];

    }

}
