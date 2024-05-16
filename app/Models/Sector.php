<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_sector', // Agrega 'sector' a la lista de atributos fillable
    ];

    // Relación uno a muchos
    public function barrios()
    {
        return $this->hasMany('App\Models\Barrio');
    }
}
