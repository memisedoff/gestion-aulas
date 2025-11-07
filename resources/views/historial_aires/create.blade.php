@extends('layouts.app')

@section('title', 'Nuevo registro de historial')

@section('content')
<h1 class="page-title">Nuevo registro de historial</h1>

<form action="{{ route('historial-aires.store') }}" method="POST" class="form-card">
    @csrf
    <div class="form-group">
        <label>Aire acondicionado</label>
        <select name="aire_id" required>
            <option value="">-- seleccionar --</option>
            @foreach($aires as $aire)
                <option value="{{ $aire->id }}">
                    Aire #{{ $aire->id }} — Aula: {{ $aire->aula?->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Acción</label>
        <input type="text" name="accion" value="{{ old('accion') }}" placeholder="Encender, Apagar..." required>
    </div>
    <div class="form-group">
        <label>Usuario</label>
        <input type="text" name="usuario" value="{{ old('usuario') }}">
    </div>
    <div class="form-group">
        <label>Fecha y hora</label>
        <input type="datetime-local" name="fecha_hora" value="{{ old('fecha_hora') }}" required>
    </div>
    <button class="btn">Guardar</button>
    <a href="{{ route('historial-aires.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
