@extends('layouts.app')

@section('title', 'Cortinas')

@section('content')
<h1 class="page-title">Cortinas</h1>
<p class="page-subtitle">Estado y posición de las cortinas por aula.</p>

<div style="margin-bottom:1rem;">
    <a href="{{ route('home') }}" class="btn btn-secondary">⬅ Volver al menú</a>
    <a href="{{ route('cortinas.create') }}" class="btn">Nueva cortina</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Aula</th>
            <th>Estado</th>
            <th>Posición (%)</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @forelse($cortinas as $cortina)
        <tr>
            <td>{{ $cortina->aula?->nombre }}</td>
            <td>{{ $cortina->estado }}</td>
            <td>{{ $cortina->posicion ?? '-' }}</td>
            <td class="actions-row">
                <a href="{{ route('cortinas.edit', $cortina) }}" class="btn btn-secondary">Editar</a>
                <form action="{{ route('cortinas.destroy', $cortina) }}" method="POST" onsubmit="return confirm('¿Eliminar cortina?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn" style="background:#f43f5e;color:#fff;">Borrar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4">No hay cortinas.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $cortinas->links() }}
@endsection
