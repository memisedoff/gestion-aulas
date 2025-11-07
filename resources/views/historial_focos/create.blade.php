@extends('layouts.app')

@section('title', 'Nuevo registro de foco')

@section('content')
<h1 class="page-title">Nuevo registro de foco</h1>

<form action="{{ route('historial-focos.store') }}" method="POST" class="form-card">
    @csrf
    <div class="form-group">
        <label>Foco</label>
        <select name="foco_id" required>
            <option value="">-- seleccionar --</option>
            @foreach($focos as $foco)
                <option value="{{ $foco->id }}">
                    Foco #{{ $foco->id }} — Aula: {{ $foco->aula?->nombre }}
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
    <a href="{{ route('historial-focos.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
