<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aula;

class Cortina extends Model
{
    protected $table = 'cortinas';

    protected $fillable = [
        'aula_id',
        'estado',
        'posicion',
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}

