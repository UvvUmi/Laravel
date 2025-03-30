<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateIdNumber implements ValidationRule
{
    public $birth_date;
    public $gender;

    public function __construct($birth_date, $gender) {
        $this->birth_date = $birth_date;
        $this->gender = $gender;
    }
    public function get_values() {
        return [$this->birth_date, $this->gender];
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $birth_year = strval($this->get_values()[0]);
        $gender = $this->get_values()[1];
        
        $birthdate_arr = explode("-", $birth_year);

        if (
            substr($birthdate_arr[0], 0, 2) == "18" && $gender == "M" && substr($value, 0, 1) != "1" ||
            substr($birthdate_arr[0], 0, 2) == "18" && $gender == "F" && substr($value, 0, 1) != "2" ||
            substr($birthdate_arr[0], 0, 2) == "19" && $gender == "M" && substr($value, 0, 1) != "3" ||
            substr($birthdate_arr[0], 0, 2) == "19" && $gender == "F" && substr($value, 0, 1) != "4" ||
            substr($birthdate_arr[0], 0, 2) == "20" && $gender == "M" && substr($value, 0, 1) != "5" ||
            substr($birthdate_arr[0], 0, 2) == "20" && $gender == "F" && substr($value, 0, 1) != "6" ||
            substr($birthdate_arr[0], 2, 2) != substr($value, 1, 2) ||
            $birthdate_arr[1] != substr($value, 3, 2) ||
            $birthdate_arr[2] != substr($value, 5, 2)
        ) { 
            $fail('Asmens kodas neteisingas!'); 
        };
 
    }
}

