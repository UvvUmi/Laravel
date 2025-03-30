@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>Add new student</h2>
    
    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Surname</label>
            <input type="text" name="surname" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">City</label>
            <select name="city_id" class="form-control">
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="group_id" class="form-label">Group</label>
            <select name="group_id" class="form-control">
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}">
                        {{ $group->name }}
                    </option>
                @endforeach
            </select>
        </div>
    
        {{-- <div class="mb-3">
            <label for="personal_number" class="form-label">Personal Number</label>
            <input type="text" name="personal_number" class="form-control" required>
        </div> --}}
    
        <div class="mb-3">
            <label for="birth_date" class="form-label">Birth Date</label>
            <input type="text" name="birth_date" class="form-control" required>
        </div>
    
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" class="form-control">
                @foreach (["M", "F"] as $choice)
                    <option value="{{ $choice }}">
                        {{ $choice == 'M' ? 'Male' : 'Female' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="personal_number" class="form-label">Personal Number</label>
            <input type="text" name="personal_number" class="form-control" required maxlength=11>
            @error('personal_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection

