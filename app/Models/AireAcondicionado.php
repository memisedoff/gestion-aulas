<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aula;

class AireAcondicionado extends Model
{
    protected $table = 'aire_acondicionados';

    protected $fillable = [
        'aula_id',
        'modo',
        'temperatura',
        'estado',
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
