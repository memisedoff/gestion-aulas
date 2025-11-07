<?php

namespace App\Http\Controllers;

use App\Models\Foco;
use App\Models\Aula;
use Illuminate\Http\Request;

class FocoController extends Controller
{
    public function index()
    {
        $focos = Foco::with('aula')->orderBy('aula_id')->paginate(15);
        return view('focos.index', compact('focos'));
    }

    public function create()
    {
        $aulas = Aula::orderBy('nombre')->get();
        return view('focos.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'estado' => 'required|string|max:50',
            'potencia' => 'nullable|integer',
        ]);

        Foco::create($data);

        return redirect()->route('focos.index')->with('success', 'Foco creado.');
    }

    public function edit(Foco $foco)
    {
        $aulas = Aula::orderBy('nombre')->get();
        return view('focos.edit', compact('foco', 'aulas'));
    }

    public function update(Request $request, Foco $foco)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'estado' => 'required|string|max:50',
            'potencia' => 'nullable|integer',
        ]);

        $foco->update($data);

        return redirect()->route('focos.index')->with('success', 'Foco actualizado.');
    }

    public function destroy(Foco $foco)
    {
        $foco->delete();
        return redirect()->route('focos.index')->with('success', 'Foco eliminado.');
    }
}
