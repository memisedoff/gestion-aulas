@extends('layouts.app')

@section('title', 'Nueva disponibilidad')

@section('content')
<h1 class="page-title">Nueva disponibilidad</h1>

<form action="{{ route('disponibilidades.store') }}" method="POST" class="form-card">
    @csrf
    <div class="form-group">
        <label>Docente</label>
        <select name="docente_id" required>
            <option value="">-- seleccionar --</option>
            @foreach($docentes as $docente)
                <option value="{{ $docente->id }}">{{ $docente->apellido }}, {{ $docente->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Día de semana</label>
        <input type="text" name="dia_semana" value="{{ old('dia_semana') }}" placeholder="Lunes, Martes..." required>
    </div>
    <div class="form-group">
        <label>Hora inicio</label>
        <input type="time" name="hora_inicio" value="{{ old('hora_inicio') }}" required>
    </div>
    <div class="form-group">
        <label>Hora fin</label>
        <input type="time" name="hora_fin" value="{{ old('hora_fin') }}" required>
    </div>
    <button class="btn">Guardar</button>
    <a href="{{ route('disponibilidades.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
