@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<h1 class="page-title">Panel principal</h1>
<p class="page-subtitle">Elegí un módulo para gestionar.</p>

<div class="card-grid">
    <a href="{{ route('aulas.index') }}" class="card-link">Aulas</a>
    <a href="{{ route('materias.index') }}" class="card-link">Materias</a>
    <a href="{{ route('docentes.index') }}" class="card-link">Docentes</a>
    <a href="{{ route('disponibilidades.index') }}" class="card-link">Disponibilidades</a>
    <a href="{{ route('horarios.index') }}" class="card-link">Horarios</a>
    <a href="{{ route('reservas.index') }}" class="card-link">Reservas</a>
    <a href="{{ route('focos.index') }}" class="card-link">Focos</a>
    <a href="{{ route('cortinas.index') }}" class="card-link">Cortinas</a>
    <a href="{{ route('aire-acondicionados.index') }}" class="card-link">Aires Acondicionados</a>
    <a href="{{ route('historial-aires.index') }}" class="card-link">Historial de Aires</a>
    <a href="{{ route('historial-focos.index') }}" class="card-link">Historial de Focos</a>
    <a href="{{ route('muebles.index') }}" class="card-link">Muebles</a>
</div>
@endsection
