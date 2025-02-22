<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CollatzController extends Controller
{
    public function input(int $number)
    {
        return $this->calculate($number);
    }

    public function calculate(int $number) 
    {
        if($number < 1) { return "<span style='color: red'>Skaičius privalo būti didesnis už 0!</span>"; }
        
        else {
            $sequence_arr = array($number);
            while($number > 1) {
                if ($number % 2 == 0) {
                    $number /= 2;
                }
                else {
                    $number = 3 * $number + 1;
                }
                $sequence_arr[] = $number;
            }

            return $this->show($sequence_arr);
        }
    }

    public function show($sequence): View
    {
        $arr_count = count($sequence);
        return view("collatz", compact('sequence', 'arr_count'));
    }

}
