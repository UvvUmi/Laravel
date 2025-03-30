<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\City;
use App\Models\Group;
//use App\Http\Requests\StudentRequest;
use App\Rules\ValidateIdNumber;

class StudentController extends Controller
{
    // Rodyti visus studentus su miestais (index)

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


    public function index()
    {
        $students = Student::with(['city', 'group'])->paginate(20);
        return view('students.index', compact('students'));
    }

    public function trashed()
    {
        $students = Student::onlyTrashed()->paginate(20);
        return view('students.trashed', compact('students'));
    }

    public function restore($id)
    {
        Student::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('students.trashed')->with('success', 'Studentas atkurtas!');
    }

    // Formos rodymas naujam studentui sukurti
    public function create()
    {
        $cities = City::all();
        $groups = Group::all();
        return view('students.create', compact('cities', 'groups'));
    }

    // Naujo studento įrašymas
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'city_id' => 'required|exists:cities,id',
            'group_id' => 'required|exists:groups,id',
            'birth_date' => 'required|date',
            'gender'=> 'required|string|max:1',
            'personal_number' => ['required', new ValidateIdNumber($request->birth_date, $request->gender)]
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Studentas pridėtas!');
    }


    // Redagavimo forma
    public function edit(Student $student)
    {
        $cities = City::all();
        $groups = Group::all();
        return view('students.edit', compact('student', 'cities', 'groups'));
    }

    // Atnaujinti studento duomenis
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'city_id' => 'required|exists:cities,id',
            'group_id' => 'required|exists:groups,id',
            'birth_date' => 'required|date',
            'gender'=> 'required|string|max:1',
            'personal_number' => ['required', new ValidateIdNumber($request->birth_date, $request->gender)]
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Studentas atnaujintas!');
    }


    // Ištrinti studentą
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Studentas buvo pazymetas kaip ištrintas!');
    }

    public function forceDelete($id)
    {
        Student::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('students.trashed')->with('success', 'Studentas pilnai istrintas!');
    }
}

