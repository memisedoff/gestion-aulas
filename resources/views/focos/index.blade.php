@extends('layouts.app')

@section('title', 'Focos')

@section('content')
<h1 class="page-title">Focos</h1>
<p class="page-subtitle">Estado y potencia de los focos por aula.</p>

<div style="margin-bottom:1rem;">
    <a href="{{ route('home') }}" class="btn btn-secondary">⬅ Volver al menú</a>
    <a href="{{ route('focos.create') }}" class="btn">Nuevo foco</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Aula</th>
            <th>Estado</th>
            <th>Potencia (W)</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @forelse($focos as $foco)
        <tr>
            <td>{{ $foco->aula?->nombre }}</td>
            <td>{{ $foco->estado }}</td>
            <td>{{ $foco->potencia ?? '-' }}</td>
            <td class="actions-row">
                <a href="{{ route('focos.edit', $foco) }}" class="btn btn-secondary">Editar</a>
                <form action="{{ route('focos.destroy', $foco) }}" method="POST" onsubmit="return confirm('¿Eliminar foco?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn" style="background:#f43f5e;color:#fff;">Borrar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4">No hay focos.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $focos->links() }}
@endsection
