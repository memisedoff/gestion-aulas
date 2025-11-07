<?php

namespace App\Http\Controllers;

use App\Models\Disponibilidad;
use App\Models\Docente;
use Illuminate\Http\Request;

class DisponibilidadController extends Controller
{
    public function index()
    {
        $disponibilidades = Disponibilidad::with('docente')->orderBy('dia_semana')->paginate(15);
        return view('disponibilidades.index', compact('disponibilidades'));
    }

    public function create()
    {
        $docentes = Docente::orderBy('apellido')->get();
        return view('disponibilidades.create', compact('docentes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'docente_id' => 'required|exists:docentes,id',
            'dia_semana' => 'required|string|max:20',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        Disponibilidad::create($data);

        return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad creada.');
    }

    public function edit(Disponibilidad $disponibilidad)
    {
        $docentes = Docente::orderBy('apellido')->get();
        return view('disponibilidades.edit', compact('disponibilidad', 'docentes'));
    }

    public function update(Request $request, Disponibilidad $disponibilidad)
    {
        $data = $request->validate([
            'docente_id' => 'required|exists:docentes,id',
            'dia_semana' => 'required|string|max:20',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        $disponibilidad->update($data);

        return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad actualizada.');
    }

    public function destroy(Disponibilidad $disponibilidad)
    {
        $disponibilidad->delete();
        return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad eliminada.');
    }
}
