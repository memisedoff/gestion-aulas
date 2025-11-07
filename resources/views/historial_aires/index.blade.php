@extends('layouts.app')

@section('title', 'Historial de Aires')

@section('content')
<h1 class="page-title">Historial de Aires Acondicionados</h1>
<p class="page-subtitle">Registros de uso y acciones sobre los equipos.</p>

<div style="margin-bottom:1rem;">
    <a href="{{ route('home') }}" class="btn btn-secondary">⬅ Volver al menú</a>
    <a href="{{ route('historial-aires.create') }}" class="btn">Nuevo registro</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Aire (ID)</th>
            <th>Acción</th>
            <th>Usuario</th>
            <th>Fecha y hora</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @forelse($historiales as $h)
        <tr>
            <td>
                {{ $h->aire?->aula?->nombre ?? '—' }} 
                ({{ $h->aire?->id }})
            </td>
            <td>{{ $h->accion }}</td>
            <td>{{ $h->usuario ?? '—' }}</td>
            <td>{{ $h->fecha_hora }}</td>
            <td class="actions-row">
                <a href="{{ route('historial-aires.edit', $h) }}" class="btn btn-secondary">Editar</a>
                <form action="{{ route('historial-aires.destroy', $h) }}" method="POST" onsubmit="return confirm('¿Eliminar registro?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn" style="background:#f43f5e;color:#fff;">Borrar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5">No hay registros.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $historiales->links() }}
@endsection
