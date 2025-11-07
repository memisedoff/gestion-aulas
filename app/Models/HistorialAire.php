<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AireAcondicionado;

class HistorialAire extends Model
{
    protected $table = 'historial_aires';

    protected $fillable = [
        'aire_id',
        'accion',
        'usuario',
        'fecha_hora',
    ];

    public function aire()
    {
        return $this->belongsTo(AireAcondicionado::class, 'aire_id');
    }
}
