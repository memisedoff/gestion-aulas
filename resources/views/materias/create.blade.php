@extends('layouts.app')

@section('title', 'Nueva materia')

@section('content')
<h1 class="page-title">Nueva materia</h1>

<form action="{{ route('materias.store') }}" method="POST" class="form-card">
    @csrf
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required>
    </div>
    <div class="form-group">
        <label>Código</label>
        <input type="text" name="codigo" value="{{ old('codigo') }}" required>
    </div>
    <div class="form-group">
        <label>Carga horaria</label>
        <input type="number" name="carga_horaria" value="{{ old('carga_horaria') }}" required>
    </div>
    <button class="btn">Guardar</button>
    <a href="{{ route('materias.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
