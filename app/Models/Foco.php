<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aula;

class Foco extends Model
{
    protected $table = 'focos';

    protected $fillable = [
        'aula_id',
        'estado',
        'potencia',
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}

