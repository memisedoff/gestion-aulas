@extends('layouts.app')

@section('title', 'Disponibilidades')

@section('content')
<h1 class="page-title">Disponibilidades</h1>
<p class="page-subtitle">Disponibilidad horaria de cada docente.</p>

<div style="margin-bottom:1rem;">
    <a href="{{ route('home') }}" class="btn btn-secondary">⬅ Volver al menú</a>
    <a href="{{ route('disponibilidades.create') }}" class="btn">Nueva disponibilidad</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Docente</th>
            <th>Día</th>
            <th>Hora inicio</th>
            <th>Hora fin</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @forelse($disponibilidades as $disp)
        <tr>
            <td>{{ $disp->docente ? $disp->docente->apellido . ', ' . $disp->docente->nombre : '-' }}</td>
            <td>{{ $disp->dia_semana }}</td>
            <td>{{ $disp->hora_inicio }}</td>
            <td>{{ $disp->hora_fin }}</td>
            <td class="actions-row">
                <a href="{{ route('disponibilidades.edit', $disp) }}" class="btn btn-secondary">Editar</a>
                <form action="{{ route('disponibilidades.destroy', $disp) }}" method="POST" onsubmit="return confirm('¿Eliminar disponibilidad?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn" style="background:#f43f5e;color:#fff;">Borrar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5">No hay disponibilidades.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $disponibilidades->links() }}
@endsection

