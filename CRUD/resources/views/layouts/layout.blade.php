<!DOCTYPE html>
<html lang="lt" data-bs-theme='dark'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="d-flex justify-content-center ms-4 mt-4 gap-5">
        @auth
            <a href="{{ route('students.index') }}">Studentai</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="">Atsijungti</button>
            </form>
        @else
            <a href="{{ route('login') }}">Prisijungti</a>
            <a href="{{ route('register') }}">Registruotis</a>
        @endauth
    </nav>

    <div class="container-fluid mt-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
