<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{

    protected $dates = ['fecha_inicio', 'fecha_fin'];

    public function inconsistenciasSuministro()
    {
        return $this->hasMany(InconsistenciaSuministro::class, 'id_horario');
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'id_sector');
    }

    protected $fillable = [
        'id_sector',
        'fecha_inicio',
        'hora_inicio',
        'fecha_fin',
        'hora_fin',
        'inconsistencia',
    ];
}
