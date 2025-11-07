<?php

namespace App\Http\Controllers;

use App\Models\HistorialFoco;
use App\Models\Foco;
use Illuminate\Http\Request;

class HistorialFocoController extends Controller
{
    public function index()
    {
        $historiales = HistorialFoco::with('foco')
            ->orderBy('fecha_hora', 'desc')
            ->paginate(15);

        return view('historial_focos.index', compact('historiales'));
    }

    public function create()
    {
        $focos = Foco::with('aula')->orderBy('id')->get();
        return view('historial_focos.create', compact('focos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'foco_id' => 'required|exists:focos,id',
            'accion' => 'required|string|max:100',
            'usuario' => 'nullable|string|max:100',
            'fecha_hora' => 'required|date',
        ]);

        HistorialFoco::create($data);

        return redirect()->route('historial-focos.index')->with('success', 'Registro agregado.');
    }

    public function edit(HistorialFoco $historial_foco)
    {
        $focos = Foco::with('aula')->orderBy('id')->get();
        return view('historial_focos.edit', compact('historial_foco', 'focos'));
    }

    public function update(Request $request, HistorialFoco $historial_foco)
    {
        $data = $request->validate([
            'foco_id' => 'required|exists:focos,id',
            'accion' => 'required|string|max:100',
            'usuario' => 'nullable|string|max:100',
            'fecha_hora' => 'required|date',
        ]);

        $historial_foco->update($data);

        return redirect()->route('historial-focos.index')->with('success', 'Registro actualizado.');
    }

    public function destroy(HistorialFoco $historial_foco)
    {
        $historial_foco->delete();
        return redirect()->route('historial-focos.index')->with('success', 'Registro eliminado.');
    }
}
