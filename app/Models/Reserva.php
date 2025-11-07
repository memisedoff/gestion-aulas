<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aula;
use App\Models\Docente;

class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable = [
        'aula_id',
        'docente_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'motivo',
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
}
