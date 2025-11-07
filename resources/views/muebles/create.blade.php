@extends('layouts.app')

@section('title', 'Nuevo mueble')

@section('content')
<h1 class="page-title">Nuevo mueble</h1>

<form action="{{ route('muebles.store') }}" method="POST" class="form-card">
    @csrf
    <div class="form-group">
        <label>Aula</label>
        <select name="aula_id" required>
            <option value="">-- seleccionar --</option>
            @foreach($aulas as $aula)
                <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Tipo</label>
        <input type="text" name="tipo" value="{{ old('tipo') }}" placeholder="Ej. Escritorio, Silla, Armario..." required>
    </div>
    <div class="form-group">
        <label>Cantidad</label>
        <input type="number" name="cantidad" value="{{ old('cantidad') }}" required min="1">
    </div>
    <div class="form-group">
        <label>Estado</label>
        <input type="text" name="estado" value="{{ old('estado') }}" placeholder="Bueno, Dañado, etc.">
    </div>
    <button class="btn">Guardar</button>
    <a href="{{ route('muebles.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
