<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Aula;
use App\Models\Docente;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with(['aula', 'docente'])
            ->orderBy('fecha', 'desc')
            ->orderBy('hora_inicio', 'desc')
            ->paginate(15);

        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $aulas = Aula::orderBy('nombre')->get();
        $docentes = Docente::orderBy('apellido')->orderBy('nombre')->get();

        return view('reservas.create', compact('aulas', 'docentes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'docente_id' => 'required|exists:docentes,id',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'motivo' => 'nullable|string|max:255',
        ]);

        Reserva::create($data);

        return redirect()
            ->route('reservas.index')
            ->with('success', 'Reserva creada.');
    }

    public function edit(Reserva $reserva)
    {
        $aulas = Aula::orderBy('nombre')->get();
        $docentes = Docente::orderBy('apellido')->orderBy('nombre')->get();

        return view('reservas.edit', compact('reserva', 'aulas', 'docentes'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'docente_id' => 'required|exists:docentes,id',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'motivo' => 'nullable|string|max:255',
        ]);

        $reserva->update($data);

        return redirect()
            ->route('reservas.index')
            ->with('success', 'Reserva actualizada.');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()
            ->route('reservas.index')
            ->with('success', 'Reserva eliminada.');
    }
}
