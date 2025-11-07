@extends('layouts.app')

@section('title', 'Editar horario')

@section('content')
<h1 class="page-title">Editar horario</h1>

<form action="{{ route('horarios.update', $horario) }}" method="POST" class="form-card">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Aula</label>
        <select name="aula_id" required>
            @foreach($aulas as $aula)
                <option value="{{ $aula->id }}" @if($aula->id == $horario->aula_id) selected @endif>
                    {{ $aula->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Materia</label>
        <select name="materia_id" required>
            @foreach($materias as $materia)
                <option value="{{ $materia->id }}" @if($materia->id == $horario->materia_id) selected @endif>
                    {{ $materia->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Docente</label>
        <select name="docente_id" required>
            @foreach($docentes as $docente)
                <option value="{{ $docente->id }}" @if($docente->id == $horario->docente_id) selected @endif>
                    {{ $docente->apellido }}, {{ $docente->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Día de semana</label>
        <input type="text" name="dia_semana" value="{{ old('dia_semana', $horario->dia_semana) }}" required>
    </div>
    <div class="form-group">
        <label>Hora inicio</label>
        <input type="time" name="hora_inicio" value="{{ old('hora_inicio', $horario->hora_inicio) }}" required>
    </div>
    <div class="form-group">
        <label>Hora fin</label>
        <input type="time" name="hora_fin" value="{{ old('hora_fin', $horario->hora_fin) }}" required>
    </div>
    <button class="btn">Actualizar</button>
    <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
