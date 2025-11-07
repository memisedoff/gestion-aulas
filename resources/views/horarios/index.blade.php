@extends('layouts.app')

@section('title', 'Horarios')

@section('content')
<h1 class="page-title">Horarios</h1>
<p class="page-subtitle">Asignación de materias y docentes en cada aula.</p>

<div style="margin-bottom:1rem;">
    <a href="{{ route('home') }}" class="btn btn-secondary">⬅ Volver al menú</a>
    <a href="{{ route('horarios.create') }}" class="btn">Nuevo horario</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Aula</th>
            <th>Materia</th>
            <th>Docente</th>
            <th>Día</th>
            <th>Hora inicio</th>
            <th>Hora fin</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @forelse($horarios as $horario)
        <tr>
            <td>{{ $horario->aula?->nombre }}</td>
            <td>{{ $horario->materia?->nombre }}</td>
            <td>
                @if($horario->docente)
                    {{ $horario->docente->apellido }}, {{ $horario->docente->nombre }}
                @else
                    -
                @endif
            </td>
            <td>{{ $horario->dia_semana }}</td>
            <td>{{ $horario->hora_inicio }}</td>
            <td>{{ $horario->hora_fin }}</td>
            <td class="actions-row">
                <a href="{{ route('horarios.edit', $horario) }}" class="btn btn-secondary">Editar</a>
                <form action="{{ route('horarios.destroy', $horario) }}" method="POST" onsubmit="return confirm('¿Eliminar horario?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn" style="background:#f43f5e;color:#fff;">Borrar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="7">No hay horarios.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $horarios->links() }}
@endsection
