<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProblemaBarrio;
use App\Models\Barrio;

class ProblemaBarrioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'id_barrio' => 'required|exists:barrios,id' // Asegúrate de que id_barrio sea válido
        ]);

        $problemaBarrio = new ProblemaBarrio();
        $problemaBarrio->descripcion = $request->input('descripcion');
        $problemaBarrio->fecha = $request->input('fecha');
        $problemaBarrio->id_barrio = $request->input('id_barrio'); // Aquí asigna el valor correcto
        $problemaBarrio->estado = 'Pendiente'; // Puedes establecer un valor por defecto para el estado, por ejemplo 'Pendiente'
        $problemaBarrio->save();

        return redirect()->route('client.index')->with('success', 'Problema de barrio registrado exitosamente.');
    }

    public function create()
    {
        // Obtener todos los barrios registrados
        $barrios = Barrio::all();

        // Devolver la vista de creación de problema de barrio
        return view('homeClient', compact('barrios'));
    }
}
