@extends('layouts.app')

@section('title', 'Editar reserva')

@section('content')
<h1 class="page-title">Editar reserva</h1>

<form action="{{ route('reservas.update', $reserva) }}" method="POST" class="form-card">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Aula</label>
        <select name="aula_id" required>
            @foreach($aulas as $aula)
                <option value="{{ $aula->id }}" @if($aula->id == $reserva->aula_id) selected @endif>
                    {{ $aula->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Docente</label>
        <select name="docente_id" required>
            @foreach($docentes as $docente)
                <option value="{{ $docente->id }}" @if($docente->id == $reserva->docente_id) selected @endif>
                    {{ $docente->apellido }}, {{ $docente->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Fecha</label>
        <input type="date" name="fecha" value="{{ old('fecha', $reserva->fecha) }}" required>
    </div>
    <div class="form-group">
        <label>Hora inicio</label>
        <input type="time" name="hora_inicio" value="{{ old('hora_inicio', $reserva->hora_inicio) }}" required>
    </div>
    <div class="form-group">
        <label>Hora fin</label>
        <input type="time" name="hora_fin" value="{{ old('hora_fin', $reserva->hora_fin) }}" required>
    </div>
    <div class="form-group">
        <label>Motivo</label>
        <input type="text" name="motivo" value="{{ old('motivo', $reserva->motivo) }}">
    </div>
    <button class="btn">Actualizar</button>
    <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
