<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class valid_id_number implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Validator::extend('valid_id_number', function ($attribute, $value, $parameters, $validator) {
        //     $birth_year = strval($parameters[0]);
        //     $gender = $parameters[1];

        //     $birthdate_arr = explode("-", $birth_year);
            
        //     if (
        //         substr($birthdate_arr[0], 0, 2) == "18" && $gender == "M" && substr($value, 0, 1) != "1" ||
        //         substr($birthdate_arr[0], 0, 2) == "18" && $gender == "F" && substr($value, 0, 1) != "2" ||
        //         substr($birthdate_arr[0], 0, 2) == "19" && $gender == "M" && substr($value, 0, 1) != "3" ||
        //         substr($birthdate_arr[0], 0, 2) == "19" && $gender == "F" && substr($value, 0, 1) != "4" ||
        //         substr($birthdate_arr[0], 0, 2) == "20" && $gender == "M" && substr($value, 0, 1) != "5" ||
        //         substr($birthdate_arr[0], 0, 2) == "20" && $gender == "F" && substr($value, 0, 1) != "6" ||
        //         substr($birthdate_arr[0], 2, 2) != substr($value, 1, 2) ||
        //         $birthdate_arr[1] != substr($value, 3, 2) ||
        //         $birthdate_arr[2] != substr($value, 5, 2)
        //     ) return false;
            
            
        //     return true;
        // }, 'Asmens kodas neatitinka gimimo datos!');
    }
}
