@extends('layouts.app')

@section('title', 'Editar historial de aire')

@section('content')
<h1 class="page-title">Editar historial</h1>

<form action="{{ route('historial-aires.update', $historial_aire) }}" method="POST" class="form-card">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Aire acondicionado</label>
        <select name="aire_id" required>
            @foreach($aires as $aire)
                <option value="{{ $aire->id }}" @if($aire->id == $historial_aire->aire_id) selected @endif>
                    Aire #{{ $aire->id }} — Aula: {{ $aire->aula?->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Acción</label>
        <input type="text" name="accion" value="{{ old('accion', $historial_aire->accion) }}" required>
    </div>
    <div class="form-group">
        <label>Usuario</label>
        <input type="text" name="usuario" value="{{ old('usuario', $historial_aire->usuario) }}">
    </div>
    <div class="form-group">
        <label>Fecha y hora</label>
        <input type="datetime-local" name="fecha_hora" value="{{ old('fecha_hora', $historial_aire->fecha_hora) }}" required>
    </div>
    <button class="btn">Actualizar</button>
    <a href="{{ route('historial-aires.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
