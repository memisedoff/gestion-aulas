@extends('layouts.app')

@section('title', 'Nuevo docente')

@section('content')
<h1 class="page-title">Nuevo docente</h1>

<form action="{{ route('docentes.store') }}" method="POST" class="form-card">
    @csrf
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required>
    </div>
    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="apellido" value="{{ old('apellido') }}" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="telefono" value="{{ old('telefono') }}">
    </div>
    <button class="btn">Guardar</button>
    <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
