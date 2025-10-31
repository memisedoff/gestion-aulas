@extends('layouts.app')

@section('title', 'Docentes')

@section('content')
<h1 class="page-title">Docentes</h1>
<p class="page-subtitle">Listado de docentes registrados.</p>

<div style="margin-bottom:1rem;">
    <a href="{{ route('home') }}" class="btn btn-secondary">⬅ Volver al menú</a>
    <a href="{{ route('docentes.create') }}" class="btn">Nuevo docente</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Apellido</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @forelse($docentes as $docente)
        <tr>
            <td>{{ $docente->apellido }}</td>
            <td>{{ $docente->nombre }}</td>
            <td>{{ $docente->email }}</td>
            <td>{{ $docente->telefono }}</td>
            <td class="actions-row">
                <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-secondary">Editar</a>
                <form action="{{ route('docentes.destroy', $docente) }}" method="POST" onsubmit="return confirm('¿Eliminar docente?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn" style="background:#f43f5e;color:#fff;">Borrar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5">No hay docentes.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $docentes->links() }}
@endsection
