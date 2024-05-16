<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barrio;
use App\Models\Sector;
use App\Models\Horario; // Asegúrate de importar el modelo Horario

class HomeClientController extends Controller
{
    public function index()
    {
        // Obtener todos los barrios de la base de datos, cargando la relación "sector"
        $barrios = Barrio::with('sector')->get();

        // Obtener todos los sectores de la base de datos
        $sectores = Sector::all();

        // Obtener los horarios de todos los sectores
        $horarios = Horario::all();

        // Pasar los barrios, los sectores y los horarios a la vista
        return view('client.homeClient', compact('barrios', 'sectores', 'horarios'));
    }
}
