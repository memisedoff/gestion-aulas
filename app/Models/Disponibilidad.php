<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Docente;

class Disponibilidad extends Model
{
    protected $table = 'disponibilidades';

    protected $fillable = [
        'docente_id',
        'dia_semana',
        'hora_inicio',
        'hora_fin',
    ];

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
}
