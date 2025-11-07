@extends('layouts.app')

@section('title', 'Editar historial de foco')

@section('content')
<h1 class="page-title">Editar historial de foco</h1>

<form action="{{ route('historial-focos.update', $historial_foco) }}" method="POST" class="form-card">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Foco</label>
        <select name="foco_id" required>
            @foreach($focos as $foco)
                <option value="{{ $foco->id }}" @if($foco->id == $historial_foco->foco_id) selected @endif>
                    Foco #{{ $foco->id }} — Aula: {{ $foco->aula?->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Acción</label>
        <input type="text" name="accion" value="{{ old('accion', $historial_foco->accion) }}" required>
    </div>
    <div class="form-group">
        <label>Usuario</label>
        <input type="text" name="usuario" value="{{ old('usuario', $historial_foco->usuario) }}">
    </div>
    <div class="form-group">
        <label>Fecha y hora</label>
        <input type="datetime-local" name="fecha_hora" value="{{ old('fecha_hora', $historial_foco->fecha_hora) }}" required>
    </div>
    <button class="btn">Actualizar</button>
    <a href="{{ route('historial-focos.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
