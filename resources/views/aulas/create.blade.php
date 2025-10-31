@extends('layouts.app')

@section('title', 'Nueva aula')

@section('content')
<h1 class="page-title">Nueva aula</h1>

<form action="{{ route('aulas.store') }}" method="POST" class="form-card">
    @csrf
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required>
    </div>
    <div class="form-group">
        <label>Capacidad</label>
        <input type="number" name="capacidad" value="{{ old('capacidad') }}">
    </div>
    <div class="form-group">
        <label>Ubicación</label>
        <input type="text" name="ubicacion" value="{{ old('ubicacion') }}">
    </div>
    <button class="btn">Guardar</button>
    <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection

