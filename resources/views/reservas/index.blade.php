@extends('layouts.app')

@section('title', 'Reservas')

@section('content')
<h1 class="page-title">Reservas</h1>
<p class="page-subtitle">Gestión de reservas de aulas.</p>

<div style="margin-bottom:1rem;">
    <a href="{{ route('home') }}" class="btn btn-secondary">⬅ Volver al menú</a>
    <a href="{{ route('reservas.create') }}" class="btn">Nueva reserva</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Aula</th>
            <th>Docente</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Motivo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @forelse($reservas as $reserva)
        <tr>
            <td>{{ $reserva->fecha }}</td>
            <td>{{ $reserva->aula?->nombre }}</td>
            <td>
                @if($reserva->docente)
                    {{ $reserva->docente->apellido }}, {{ $reserva->docente->nombre }}
                @else
                    -
                @endif
            </td>
            <td>{{ $reserva->hora_inicio }}</td>
            <td>{{ $reserva->hora_fin }}</td>
            <td>{{ $reserva->motivo }}</td>
            <td class="actions-row">
                <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-secondary">Editar</a>
                <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" onsubmit="return confirm('¿Eliminar reserva?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn" style="background:#f43f5e;color:#fff;">Borrar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="7">No hay reservas.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $reservas->links() }}
@endsection
