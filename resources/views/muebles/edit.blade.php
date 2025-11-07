@extends('layouts.app')

@section('title', 'Editar mueble')

@section('content')
<h1 class="page-title">Editar mueble</h1>

<form action="{{ route('muebles.update', $mueble) }}" method="POST" class="form-card">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Aula</label>
        <select name="aula_id" required>
            @foreach($aulas as $aula)
                <option value="{{ $aula->id }}" @if($aula->id == $mueble->aula_id) selected @endif>
                    {{ $aula->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Tipo</label>
        <input type="text" name="tipo" value="{{ old('tipo', $mueble->tipo) }}" required>
    </div>
    <div class="form-group">
        <label>Cantidad</label>
        <input type="number" name="cantidad" value="{{ old('cantidad', $mueble->cantidad) }}" required min="1">
    </div>
    <div class="form-group">
        <label>Estado</label>
        <input type="text" name="estado" value="{{ old('estado', $mueble->estado) }}">
    </div>
    <button class="btn">Actualizar</button>
    <a href="{{ route('muebles.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
