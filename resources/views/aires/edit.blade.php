@extends('layouts.app')

@section('title', 'Editar aire acondicionado')

@section('content')
<h1 class="page-title">Editar aire acondicionado</h1>

<form action="{{ route('aires.update', $aire) }}" method="POST" class="form-card">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Aula</label>
        <select name="aula_id" required>
            @foreach($aulas as $aula)
                <option value="{{ $aula->id }}" @if($aula->id == $aire->aula_id) selected @endif>
                    {{ $aula->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Modo</label>
        <input type="text" name="modo" value="{{ old('modo', $aire->modo) }}" required>
    </div>
    <div class="form-group">
        <label>Temperatura (°C)</label>
        <input type="number" name="temperatura" value="{{ old('temperatura', $aire->temperatura) }}" required>
    </div>
    <div class="form-group">
        <label>Estado</label>
        <input type="text" name="estado" value="{{ old('estado', $aire->estado) }}" required>
    </div>
    <button class="btn">Actualizar</button>
    <a href="{{ route('aires.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
