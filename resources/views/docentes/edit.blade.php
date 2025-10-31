@extends('layouts.app')

@section('title', 'Editar docente')

@section('content')
<h1 class="page-title">Editar docente</h1>

<form action="{{ route('docentes.update', $docente) }}" method="POST" class="form-card">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $docente->nombre) }}" required>
    </div>
    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="apellido" value="{{ old('apellido', $docente->apellido) }}" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $docente->email) }}" required>
    </div>
    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="telefono" value="{{ old('telefono', $docente->telefono) }}">
    </div>
    <button class="btn">Actualizar</button>
    <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
