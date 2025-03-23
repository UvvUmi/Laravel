@extends('layouts.layout')

@section('title', 'Redaguoti studentą')

@section('content')
    <div class="container">
        <h2>Redaguoti studentą</h2>

        <form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="surname" class="form-label">Surname</label>
        <input type="text" name="surname" class="form-control" value="{{ old('surname', $student->surname) }}" required>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" value="{{ old('address', $student->address) }}" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $student->phone) }}" required>
    </div>

    <div class="mb-3">
        <label for="city_id" class="form-label">City</label>
        <select name="city_id" class="form-control">
            @foreach ($cities as $city)
                <option value="{{ $city->id }}" {{ old('city_id', $student->city_id) == $city->id ? 'selected' : '' }}>
                    {{ $city->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="group_id" class="form-label">Group</label>
        <select name="group_id" class="form-control">
            @foreach ($groups as $group)
                <option value="{{ $group->id }}" {{ old('group', $student->group_id) == $group->id ? 'selected' : '' }}>
                    {{ $group->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- <div class="mb-3">
        <label for="personal_number" class="form-label">Personal Number</label>
        <input type="text" name="personal_number" class="form-control" value="{{ old('personal_number', $student->personal_number) }}" required>
    </div> --}}

    <div class="mb-3">
        <label for="birth_date" class="form-label">Birth Date</label>
        <input type="text" name="birth_date" class="form-control" value="{{ old('birth_date', $student->birth_date) }}" required>
    </div>

    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select name="gender" class="form-control">
            @foreach (["M", "F"] as $choice)
                <option value="{{ $choice }}" {{ old('gender', $student->gender) == $choice ? 'selected' : '' }}>
                    {{ $choice == 'M' ? 'Male' : 'Female' }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>
@endsection
