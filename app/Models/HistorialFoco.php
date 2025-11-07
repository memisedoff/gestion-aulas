<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Foco;

class HistorialFoco extends Model
{
    protected $table = 'historial_focos';

    protected $fillable = [
        'foco_id',
        'accion',
        'usuario',
        'fecha_hora',
    ];

    public function foco()
    {
        return $this->belongsTo(Foco::class, 'foco_id');
    }
}
