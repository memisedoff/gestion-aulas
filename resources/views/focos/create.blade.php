@extends('layouts.app')

@section('title', 'Nuevo foco')

@section('content')
<h1 class="page-title">Nuevo foco</h1>

<form action="{{ route('focos.store') }}" method="POST" class="form-card">
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
        <input type="text" name="estado" value="{{ old('estado') }}" placeholder="Encendido / Apagado" required>
    </div>
    <div class="form-group">
        <label>Potencia (W)</label>
        <input type="number" name="potencia" value="{{ old('potencia') }}">
    </div>
    <button class="btn">Guardar</button>
    <a href="{{ route('focos.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
