<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'surname', 'address', 'phone', 'city_id', 'group_id', 'personal_number', 'birth_date', 'gender'];

    protected $dates = ['deleted_at'];

    // Susiejimas su miestu
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public static function genIdNumber($birthdate, $gender): string
    {
        $identification_number = "";
        $byear_ftwo = substr($birthdate, 0, 2);

        if ($byear_ftwo == "19" && $gender == "M") 
            $identification_number .= "3";
        else if ($byear_ftwo  == "19" && $gender == "F")
            $identification_number .= "4";
        else if ($byear_ftwo  == "20" && $gender == "M")
            $identification_number .= "5";
        else if ($byear_ftwo  == "20" && $gender == "F")
            $identification_number .= "6";
        else if ($byear_ftwo == "18" && $gender == "M")
            $identification_number .= "1";
        else if ($byear_ftwo == "18" && $gender == "F")
            $identification_number .= "2";

        $identification_number .= substr($birthdate, 2, -6).substr($birthdate, 5, -3).substr($birthdate, 8).strval(rand(100,999));

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

}
