@extends('layouts.layout')

@section('title', 'Removed Student list')

@section('content')
<a href={{ url('/') }}>Go back</a>
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
                <form action="{{ route('students.restore', $student->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Resurrect</button>
                </form>
            </td>
            <td>
                <form action="{{ route('students.forceDelete', $student->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Remove forever</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $students->links() }} <!-- Pagination -->
@endsection
