@extends('layouts.app')

@section('title', 'Editar disponibilidad')

@section('content')
<h1 class="page-title">Editar disponibilidad</h1>

<form action="{{ route('disponibilidades.update', $disponibilidad) }}" method="POST" class="form-card">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Docente</label>
        <select name="docente_id" required>
            @foreach($docentes as $docente)
                <option value="{{ $docente->id }}" @if($docente->id == $disponibilidad->docente_id) selected @endif>
                    {{ $docente->apellido }}, {{ $docente->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Día de semana</label>
        <input type="text" name="dia_semana" value="{{ old('dia_semana', $disponibilidad->dia_semana) }}" required>
    </div>
    <div class="form-group">
        <label>Hora inicio</label>
        <input type="time" name="hora_inicio" value="{{ old('hora_inicio', $disponibilidad->hora_inicio) }}" required>
    </div>
    <div class="form-group">
        <label>Hora fin</label>
        <input type="time" name="hora_fin" value="{{ old('hora_fin', $disponibilidad->hora_fin) }}" required>
    </div>
    <button class="btn">Actualizar</button>
    <a href="{{ route('disponibilidades.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
