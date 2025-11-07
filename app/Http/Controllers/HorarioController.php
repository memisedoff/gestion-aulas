<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Aula;
use App\Models\Materia;
use App\Models\Docente;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::with(['aula', 'materia', 'docente'])
            ->orderBy('dia_semana')
            ->orderBy('hora_inicio')
            ->paginate(15);

        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        $aulas = Aula::orderBy('nombre')->get();
        $materias = Materia::orderBy('nombre')->get();
        $docentes = Docente::orderBy('apellido')->orderBy('nombre')->get();

        return view('horarios.create', compact('aulas', 'materias', 'docentes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'materia_id' => 'required|exists:materias,id',
            'docente_id' => 'required|exists:docentes,id',
            'dia_semana' => 'required|string|max:20',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        Horario::create($data);

        return redirect()
            ->route('horarios.index')
            ->with('success', 'Horario creado.');
    }

    public function edit(Horario $horario)
    {
        $aulas = Aula::orderBy('nombre')->get();
        $materias = Materia::orderBy('nombre')->get();
        $docentes = Docente::orderBy('apellido')->orderBy('nombre')->get();

        return view('horarios.edit', compact('horario', 'aulas', 'materias', 'docentes'));
    }

    public function update(Request $request, Horario $horario)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'materia_id' => 'required|exists:materias,id',
            'docente_id' => 'required|exists:docentes,id',
            'dia_semana' => 'required|string|max:20',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        $horario->update($data);

        return redirect()
            ->route('horarios.index')
            ->with('success', 'Horario actualizado.');
    }

    public function destroy(Horario $horario)
    {
        $horario->delete();

        return redirect()
            ->route('horarios.index')
            ->with('success', 'Horario eliminado.');
    }
}
