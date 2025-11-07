<?php

namespace App\Http\Controllers;

use App\Models\Cortina;
use App\Models\Aula;
use Illuminate\Http\Request;

class CortinaController extends Controller
{
    public function index()
    {
        $cortinas = Cortina::with('aula')->orderBy('aula_id')->paginate(15);
        return view('cortinas.index', compact('cortinas'));
    }

    public function create()
    {
        $aulas = Aula::orderBy('nombre')->get();
        return view('cortinas.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'estado' => 'required|string|max:50',
            'posicion' => 'nullable|integer',
        ]);

        Cortina::create($data);

        return redirect()->route('cortinas.index')->with('success', 'Cortina creada.');
    }

    public function edit(Cortina $cortina)
    {
        $aulas = Aula::orderBy('nombre')->get();
        return view('cortinas.edit', compact('cortina', 'aulas'));
    }

    public function update(Request $request, Cortina $cortina)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'estado' => 'required|string|max:50',
            'posicion' => 'nullable|integer',
        ]);

        $cortina->update($data);

        return redirect()->route('cortinas.index')->with('success', 'Cortina actualizada.');
    }

    public function destroy(Cortina $cortina)
    {
        $cortina->delete();
        return redirect()->route('cortinas.index')->with('success', 'Cortina eliminada.');
    }
}
