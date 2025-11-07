<?php

namespace App\Http\Controllers;

use App\Models\AireAcondicionado;
use App\Models\Aula;
use Illuminate\Http\Request;

class AireAcondicionadoController extends Controller
{
    public function index()
    {
        $aires = AireAcondicionado::with('aula')->orderBy('aula_id')->paginate(15);
        return view('aires.index', compact('aires'));
    }

    public function create()
    {
        $aulas = Aula::orderBy('nombre')->get();
        return view('aires.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'modo' => 'required|string|max:50',
            'temperatura' => 'required|integer',
            'estado' => 'required|string|max:50',
        ]);

        AireAcondicionado::create($data);

        return redirect()->route('aires.index')->with('success', 'Aire acondicionado creado.');
    }

    public function edit(AireAcondicionado $aire)
    {
        $aulas = Aula::orderBy('nombre')->get();
        return view('aires.edit', compact('aire', 'aulas'));
    }

    public function update(Request $request, AireAcondicionado $aire)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'modo' => 'required|string|max:50',
            'temperatura' => 'required|integer',
            'estado' => 'required|string|max:50',
        ]);

        $aire->update($data);

        return redirect()->route('aires.index')->with('success', 'Aire acondicionado actualizado.');
    }

    public function destroy(AireAcondicionado $aire)
    {
        $aire->delete();
        return redirect()->route('aires.index')->with('success', 'Aire acondicionado eliminado.');
    }
}
