<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InconsistenciaSuministro extends Model
{
    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario');
    }

    // Definir la relación con el modelo Sector
    public function sector()
    {
        return $this->belongsTo(Sector::class, 'id_sector');
    }

    protected $fillable = [
        'id_horario',
        'descripcion',
        'fecha',
        'estado',
    ];
}
