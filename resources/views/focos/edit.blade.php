@extends('layouts.app')

@section('title', 'Editar foco')

@section('content')
<h1 class="page-title">Editar foco</h1>

<form action="{{ route('focos.update', $foco) }}" method="POST" class="form-card">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Aula</label>
        <select name="aula_id" required>
            @foreach($aulas as $aula)
                <option value="{{ $aula->id }}" @if($aula->id == $foco->aula_id) selected @endif>
                    {{ $aula->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Estado</label>
        <input type="text" name="estado" value="{{ old('estado', $foco->estado) }}" required>
    </div>
    <div class="form-group">
        <label>Potencia (W)</label>
        <input type="number" name="potencia" value="{{ old('potencia', $foco->potencia) }}">
    </div>
    <button class="btn">Actualizar</button>
    <a href="{{ route('focos.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Ir al menú</a>
</form>
@endsection
