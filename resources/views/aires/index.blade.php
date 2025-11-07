@extends('layouts.app')

@section('title', 'Aires acondicionados')

@section('content')
<h1 class="page-title">Aires acondicionados</h1>
<p class="page-subtitle">Control de modo, temperatura y estado de cada aula.</p>

<div style="margin-bottom:1rem;">
    <a href="{{ route('home') }}" class="btn btn-secondary">⬅ Volver al menú</a>
    <a href="{{ route('aires.create') }}" class="btn">Nuevo aire</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Aula</th>
            <th>Modo</th>
            <th>Temperatura (°C)</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @forelse($aires as $aire)
        <tr>
            <td>{{ $aire->aula?->nombre }}</td>
            <td>{{ $aire->modo }}</td>
            <td>{{ $aire->temperatura }}</td>
            <td>{{ $aire->estado }}</td>
            <td class="actions-row">
                <a href="{{ route('aires.edit', $aire) }}" class="btn btn-secondary">Editar</a>
                <form action="{{ route('aires.destroy', $aire) }}" method="POST" onsubmit="return confirm('¿Eliminar aire?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn" style="background:#f43f5e;color:#fff;">Borrar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5">No hay aires acondicionados.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $aires->links() }}
@endsection
