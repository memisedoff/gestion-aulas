@extends('layouts.app')

@section('title', 'Editar aula')

@section('content')
<h1 class="page-title">Editar aula</h1>

<form action="{{ route('aulas.update', $aula) }}" method="POST" class="form-card">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $aula->nombre) }}" required>
    </div>
    <div class="form-group">
        <label>Capacidad</label>
        <input type="number" name="capacidad" value="{{ old('capacidad', $aula->capacidad) }}">
    </div>
    <div class="form-group">
        <label>Ubicación</label>
        <input type="text" name="ubicacion" value="{{ old('ubicacion', $aula->ubicacion) }}">
    </div>
    <button class="btn">Actualizar</button>
    <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
