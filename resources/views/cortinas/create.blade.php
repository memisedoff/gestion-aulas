@extends('layouts.app')

@section('title', 'Nueva cortina')

@section('content')
<h1 class="page-title">Nueva cortina</h1>

<form action="{{ route('cortinas.store') }}" method="POST" class="form-card">
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
        <label>Estado</label>
        <input type="text" name="estado" value="{{ old('estado') }}" placeholder="Abierta / Cerrada" required>
    </div>
    <div class="form-group">
        <label>Posición (%)</label>
        <input type="number" name="posicion" value="{{ old('posicion') }}" min="0" max="100">
    </div>
    <button class="btn">Guardar</button>
    <a href="{{ route('cortinas.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
