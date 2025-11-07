<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aula;

class Mueble extends Model
{
    protected $table = 'muebles';

    protected $fillable = [
        'aula_id',
        'tipo',
        'cantidad',
        'estado',
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
