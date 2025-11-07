<?php

namespace App\Http\Controllers;

use App\Models\Mueble;
use App\Models\Aula;
use Illuminate\Http\Request;

class MuebleController extends Controller
{
    public function index()
    {
        $muebles = Mueble::with('aula')->orderBy('aula_id')->paginate(15);
        return view('muebles.index', compact('muebles'));
    }

    public function create()
    {
        $aulas = Aula::orderBy('nombre')->get();
        return view('muebles.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'tipo' => 'required|string|max:100',
            'cantidad' => 'required|integer|min:1',
            'estado' => 'nullable|string|max:100',
        ]);

        Mueble::create($data);

        return redirect()->route('muebles.index')->with('success', 'Mueble agregado.');
    }

    public function edit(Mueble $mueble)
    {
        $aulas = Aula::orderBy('nombre')->get();
        return view('muebles.edit', compact('mueble', 'aulas'));
    }

    public function update(Request $request, Mueble $mueble)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'tipo' => 'required|string|max:100',
            'cantidad' => 'required|integer|min:1',
            'estado' => 'nullable|string|max:100',
        ]);

        $mueble->update($data);

        return redirect()->route('muebles.index')->with('success', 'Mueble actualizado.');
    }

    public function destroy(Mueble $mueble)
    {
        $mueble->delete();
        return redirect()->route('muebles.index')->with('success', 'Mueble eliminado.');
    }
}

