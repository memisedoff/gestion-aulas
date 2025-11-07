@extends('layouts.app')

@section('title', 'Editar cortina')

@section('content')
<h1 class="page-title">Editar cortina</h1>

<form action="{{ route('cortinas.update', $cortina) }}" method="POST" class="form-card">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Aula</label>
        <select name="aula_id" required>
            @foreach($aulas as $aula)
                <option value="{{ $aula->id }}" @if($aula->id == $cortina->aula_id) selected @endif>
                    {{ $aula->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Estado</label>
        <input type="text" name="estado" value="{{ old('estado', $cortina->estado) }}" required>
    </div>
    <div class="form-group">
        <label>Posición (%)</label>
        <input type="number" name="posicion" value="{{ old('posicion', $cortina->posicion) }}" min="0" max="100">
    </div>
    <button class="btn">Actualizar</button>
    <a href="{{ route('cortinas.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
