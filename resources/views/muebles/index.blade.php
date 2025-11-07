@extends('layouts.app')

@section('title', 'Muebles')

@section('content')
<h1 class="page-title">Muebles</h1>
<p class="page-subtitle">Listado de mobiliario en cada aula.</p>

<div style="margin-bottom:1rem;">
    <a href="{{ route('home') }}" class="btn btn-secondary">⬅ Volver al menú</a>
    <a href="{{ route('muebles.create') }}" class="btn">Nuevo mueble</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Aula</th>
            <th>Tipo</th>
            <th>Cantidad</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @forelse($muebles as $mueble)
        <tr>
            <td>{{ $mueble->aula?->nombre }}</td>
            <td>{{ $mueble->tipo }}</td>
            <td>{{ $mueble->cantidad }}</td>
            <td>{{ $mueble->estado ?? '—' }}</td>
            <td class="actions-row">
                <a href="{{ route('muebles.edit', $mueble) }}" class="btn btn-secondary">Editar</a>
                <form action="{{ route('muebles.destroy', $mueble) }}" method="POST" onsubmit="return confirm('¿Eliminar mueble?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn" style="background:#f43f5e;color:#fff;">Borrar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5">No hay muebles registrados.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $muebles->links() }}
@endsection
