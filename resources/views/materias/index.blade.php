@extends('layouts.app')

@section('title', 'Materias')

@section('content')
<h1 class="page-title">Materias</h1>
<p class="page-subtitle">Listado de materias de la facultad.</p>

<div style="margin-bottom:1rem;">
    <a href="{{ route('home') }}" class="btn btn-secondary">⬅ Volver al menú</a>
    <a href="{{ route('materias.create') }}" class="btn">Nueva materia</a>
</div>

<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Código</th>
        <th>Carga horaria</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @forelse($materias as $materia)
        <tr>
            <td>{{ $materia->id }}</td>
            <td>{{ $materia->nombre }}</td>
            <td>{{ $materia->codigo }}</td>
            <td>{{ $materia->carga_horaria }}</td>
            <td class="actions-row">
                <a href="{{ route('materias.edit', $materia) }}" class="btn btn-secondary">Editar</a>
                <form action="{{ route('materias.destroy', $materia) }}" method="POST" onsubmit="return confirm('¿Eliminar materia?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn" style="background:#f43f5e;color:#fff;">Borrar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5">No hay materias.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $materias->links() }}
@endsection
