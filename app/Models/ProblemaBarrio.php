<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProblemaBarrio extends Model
{

    
    protected $fillable = [
        'descripcion',
        'fecha',
        'id_barrio',
        'estado',
    ];

    // Relación con el modelo Barrio
    public function barrio()
    {
        return $this->belongsTo(Barrio::class, 'id_barrio');
    }
}
