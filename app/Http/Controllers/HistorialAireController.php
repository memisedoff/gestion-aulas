<?php

namespace App\Http\Controllers;

use App\Models\HistorialAire;
use App\Models\AireAcondicionado;
use Illuminate\Http\Request;

class HistorialAireController extends Controller
{
    public function index()
    {
        $historiales = HistorialAire::with('aire')
            ->orderBy('fecha_hora', 'desc')
            ->paginate(15);

        return view('historial_aires.index', compact('historiales'));
    }

    public function create()
    {
        $aires = AireAcondicionado::with('aula')->orderBy('id')->get();
        return view('historial_aires.create', compact('aires'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'aire_id' => 'required|exists:aire_acondicionados,id',
            'accion' => 'required|string|max:100',
            'usuario' => 'nullable|string|max:100',
            'fecha_hora' => 'required|date',
        ]);

        HistorialAire::create($data);

        return redirect()->route('historial-aires.index')->with('success', 'Registro agregado.');
    }

    public function edit(HistorialAire $historial_aire)
    {
        $aires = AireAcondicionado::with('aula')->orderBy('id')->get();
        return view('historial_aires.edit', compact('historial_aire', 'aires'));
    }

    public function update(Request $request, HistorialAire $historial_aire)
    {
        $data = $request->validate([
            'aire_id' => 'required|exists:aire_acondicionados,id',
            'accion' => 'required|string|max:100',
            'usuario' => 'nullable|string|max:100',
            'fecha_hora' => 'required|date',
        ]);

        $historial_aire->update($data);

        return redirect()->route('historial-aires.index')->with('success', 'Registro actualizado.');
    }

    public function destroy(HistorialAire $historial_aire)
    {
        $historial_aire->delete();
        return redirect()->route('historial-aires.index')->with('success', 'Registro eliminado.');
    }
}
