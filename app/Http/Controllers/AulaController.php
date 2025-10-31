<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function index()
    {
        $aulas = Aula::orderBy('nombre')->paginate(15);
        return view('aulas.index', compact('aulas'));
    }

    public function create()
    {
        return view('aulas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'nullable|integer',
            'ubicacion' => 'nullable|string|max:255',
        ]);

        Aula::create($data);

        return redirect()->route('aulas.index')->with('success', 'Aula creada correctamente.');
    }

    public function edit(Aula $aula)
    {
        return view('aulas.edit', compact('aula'));
    }

    public function update(Request $request, Aula $aula)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'nullable|integer',
            'ubicacion' => 'nullable|string|max:255',
        ]);

        $aula->update($data);

        return redirect()->route('aulas.index')->with('success', 'Aula actualizada.');
    }

    public function destroy(Aula $aula)
    {
        $aula->delete();
        return redirect()->route('aulas.index')->with('success', 'Aula eliminada.');
    }
}
