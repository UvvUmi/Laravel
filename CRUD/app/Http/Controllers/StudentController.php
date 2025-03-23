<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\City;
use App\Models\Group;

class StudentController extends Controller
{
    // Rodyti visus studentus su miestais (index)
    public function index()
    {
        $students = Student::with(['city', 'group'])->paginate(20);
        return view('students.index', compact('students'));
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
        ]);

        Student::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'address' => $request->address,
            'phone' => $request->phone,
            'city_id' => $request->city_id,
            'group_id' => $request->group_id,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'personal_number' => Student::genIdNumber($request->birth_date, $request->gender),

        ]);

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
    ]);

    // Atnaujiname studento duomenis
    $request_array = $request->only(['name', 'surname', 'address', 'phone', 'city_id', 'group_id', 'birth_date', 'gender']);
    if ($request_array != $student->only(['name', 'surname', 'address', 'phone', 'city_id', 'group_id', 'birth_date', 'gender'])) {
        $student->update($request_array);
        $student->update(['personal_number' => Student::genIdNumber($request->birth_date, $request->gender)]);
    }
    // Peradresavimas į studentų sąrašą
    return redirect()->route('students.index')->with('success', 'Studentas atnaujintas!');
}

    // Ištrinti studentą
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Studentas ištrintas!');
    }
}

