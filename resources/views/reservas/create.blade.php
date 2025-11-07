@extends('layouts.app')

@section('title', 'Nueva reserva')

@section('content')
<h1 class="page-title">Nueva reserva</h1>

<form action="{{ route('reservas.store') }}" method="POST" class="form-card">
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
        <label>Docente</label>
        <select name="docente_id" required>
            <option value="">-- seleccionar --</option>
            @foreach($docentes as $docente)
                <option value="{{ $docente->id }}">{{ $docente->apellido }}, {{ $docente->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Fecha</label>
        <input type="date" name="fecha" value="{{ old('fecha') }}" required>
    </div>
    <div class="form-group">
        <label>Hora inicio</label>
        <input type="time" name="hora_inicio" value="{{ old('hora_inicio') }}" required>
    </div>
    <div class="form-group">
        <label>Hora fin</label>
        <input type="time" name="hora_fin" value="{{ old('hora_fin') }}" required>
    </div>
    <div class="form-group">
        <label>Motivo</label>
        <input type="text" name="motivo" value="{{ old('motivo') }}">
    </div>
    <button class="btn">Guardar</button>
    <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
