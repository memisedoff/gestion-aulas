<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Gestión de Aulas')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <header class="topbar">
        <div class="logo">
            <a href="{{ route('home') }}">Gestión de Aulas</a>
        </div>
        <nav class="topnav">
            <a href="{{ route('aulas.index') }}">Aulas</a>
            <a href="{{ route('materias.index') }}">Materias</a>
            <a href="{{ route('docentes.index') }}">Docentes</a>
            <a href="{{ route('horarios.index') }}">Horarios</a>
            <a href="{{ route('reservas.index') }}">Reservas</a>
        </nav>
    </header>

    <main class="container">
        @include('partials.flash')
        @yield('content')
    </main>

    <footer class="footer">
        <p>Facultad · Sistema de Gestión de Aulas · {{ date('Y') }}</p>
    </footer>
</body>
</html>
