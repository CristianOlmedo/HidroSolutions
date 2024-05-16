<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Importa la clase Log
use App\Models\Sector;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los sectores de la base de datos
        $sectores = Sector::all();

        // Pasar los barrios a la vista y mostrarlos
        return view('admin.crudSector.index', compact('sectores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crudSector.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_sector' => 'required|string',
        ]);

        // Crear un nuevo sector en la base de datos
        Sector::create([
            'nombre_sector' => $request->input('nombre_sector'), // Cambiar 'sector' por 'nombre_sector'
        ]);

        // Redirigir a alguna parte de la aplicación, por ejemplo, a la lista de sectores
        return redirect()->route('sector.index')->with('success', 'Sector creado exitosamente.');
    }

    public function edit($id)
    {
        // Encontrar el sector por su ID
        $sector = Sector::find($id);

        // Devolver la vista de edición con el sector encontrado
        return view('admin.crudSector.edit', compact('sector'));
    }


    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_sector' => 'required|string',
        ]);

        // Encontrar el sector por su ID
        $sector = Sector::find($id);

        // Actualizar los datos del sector con los datos de la request
        $sector->nombre_sector = $request->get('nombre_sector');

        // Guardar los cambios
        $sector->save();

        // Redirigir a la lista de sectores
        return redirect()->route('sector.index')->with('success', 'Sector actualizado exitosamente.');
    }



    public function destroy(Sector $sector)
    {
        $sector->delete();

        return redirect()->route('sector.index')->with('success', 'Sector eliminado exitosamente.');
    }
}
