@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Klientų sąrašas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Vardas</th>
                <th>Pavarde</th>
                <th>Telefonas</th>
                <th>Paštas</th>
                <th>Adresas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->surname }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
