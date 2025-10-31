@extends('layouts.app')

@section('title', 'Aulas')

@section('content')
<h1 class="page-title">Aulas</h1>
<p class="page-subtitle">Listado de aulas registradas.</p>

<div style="margin-bottom:1rem;">
    <a href="{{ route('home') }}" class="btn btn-secondary">⬅ Volver al menú</a>
    <a href="{{ route('aulas.create') }}" class="btn">Nueva aula</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Capacidad</th>
            <th>Ubicación</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @forelse ($aulas as $aula)
        <tr>
            <td>{{ $aula->id }}</td>
            <td>{{ $aula->nombre }}</td>
            <td>{{ $aula->capacidad }}</td>
            <td>{{ $aula->ubicacion }}</td>
            <td class="actions-row">
                <a href="{{ route('aulas.edit', $aula) }}" class="btn btn-secondary">Editar</a>
                <form action="{{ route('aulas.destroy', $aula) }}" method="POST" onsubmit="return confirm('¿Eliminar aula?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn" style="background:#f43f5e;color:#fff;">Borrar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5">No hay aulas.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $aulas->links() }}
@endsection

