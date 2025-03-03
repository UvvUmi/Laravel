@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kompanijų sąrašas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pavadinimas</th>
                <th>Paštas</th>
                <th>Adresas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
