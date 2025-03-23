@extends('layouts.layout')

@section('title', 'Student list')

@section('content')
    <a href={{ url('students/trashed') }}>View trashed</a>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Student list</h2>
        <a href="{{ route('students.create') }}" class="btn btn-success">Add student</a>
    </div>

    <table class="table table-striped table-hover table-dark">
        <thead>
            <tr>
            <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Address</th>
                <th>City</th>
                <th>Group</th>
                <th>Birth date</th>
                <th>ID Number</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->surname }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->city->name }}</td>
                    <td>{{ $student->group->name }}</td>
                    <td>{{ $student->birth_date }}</td>
                    <td>{{ $student->personal_number }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>
                        <div class="d-flex gap-3">
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $students->links() }} <!-- Pagination -->
@endsection
