<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    protected $table = 'barrios';

    protected $fillable = [
        'nombre_barrio', // Agrega 'nombre_barrio' a la lista de atributos fillable
        'id_sector', // Agrega 'id_sector' a la lista de atributos fillable
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'id_sector');
    }
}


