<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aula;
use App\Models\Materia;
use App\Models\Docente;

class Horario extends Model
{
    protected $table = 'horarios';

    protected $fillable = [
        'aula_id',
        'materia_id',
        'docente_id',
        'dia_semana',
        'hora_inicio',
        'hora_fin',
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
}
