@extends('layouts.app')

@section('title', 'Nuevo aire acondicionado')

@section('content')
<h1 class="page-title">Nuevo aire acondicionado</h1>

<form action="{{ route('aires.store') }}" method="POST" class="form-card">
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
        <label>Modo</label>
        <input type="text" name="modo" value="{{ old('modo') }}" placeholder="Frío / Calor / Ventilación" required>
    </div>
    <div class="form-group">
        <label>Temperatura (°C)</label>
        <input type="number" name="temperatura" value="{{ old('temperatura') }}" required>
    </div>
    <div class="form-group">
        <label>Estado</label>
        <input type="text" name="estado" value="{{ old('estado') }}" placeholder="Encendido / Apagado" required>
    </div>
    <button class="btn">Guardar</button>
    <a href="{{ route('aires.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection

