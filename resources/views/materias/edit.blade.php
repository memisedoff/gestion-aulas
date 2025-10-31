@extends('layouts.app')

@section('title', 'Editar materia')

@section('content')
<h1 class="page-title">Editar materia</h1>

<form action="{{ route('materias.update', $materia) }}" method="POST" class="form-card">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $materia->nombre) }}" required>
    </div>
    <div class="form-group">
        <label>Código</label>
        <input type="text" name="codigo" value="{{ old('codigo', $materia->codigo) }}" required>
    </div>
    <div class="form-group">
        <label>Carga horaria</label>
        <input type="number" name="carga_horaria" value="{{ old('carga_horaria', $materia->carga_horaria) }}" required>
    </div>
    <button class="btn">Actualizar</button>
    <a href="{{ route('materias.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
