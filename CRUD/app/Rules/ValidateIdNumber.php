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
            $gender != "F" && intval(substr($value, 0, 1)) % 2 == 0 
            || 
            $gender != "M" && intval(substr($value, 0, 1)) % 2 != 0 
        ) { $fail("First number doesn't match gender"); }

        if (
            substr($birthdate_arr[0], 0, 2) == "18" && !in_array(substr($value, 0, 1), ["1", "2"]) ||
            substr($birthdate_arr[0], 0, 2) == "19" && !in_array(substr($value, 0, 1), ["3", "4"]) ||
            substr($birthdate_arr[0], 0, 2) == "20" && !in_array(substr($value, 0, 1), ["5", "6"])
        ) { $fail("First birthday nums don't match first id number"); };
        
        if (
            substr($birthdate_arr[0], 2, 2) != substr($value, 1, 2) 
            || $birthdate_arr[1] != substr($value, 3, 2) 
            || $birthdate_arr[2] != substr($value, 5, 2))
        { $fail("Birthday doesn't match personal number"); } 
    }
}

