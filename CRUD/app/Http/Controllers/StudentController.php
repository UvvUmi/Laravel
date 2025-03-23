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
            'personal_number' => 'required|string|max:11',
            'birth_date' => 'required|date',
            'gender'=> 'required|string|max:1',
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
        'personal_number' => 'required|string|max:11',
        'birth_date' => 'required|date',
        'gender'=> 'required|string|max:1',
    ]);

    // Atnaujiname studento duomenis
    $student->update($request->only(['name', 'surname', 'address', 'phone', 'city_id', 'group_id', 'personal_number', 'birth_date', 'gender']));

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

