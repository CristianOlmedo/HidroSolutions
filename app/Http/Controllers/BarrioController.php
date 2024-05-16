<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barrio;
use App\Models\Sector;

class BarrioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los barrios de la base de datos, cargando la relación "sector"
        $barrios = Barrio::with('sector')->get();
 
        // Pasar los barrios a la vista y mostrarlos
        return view('admin.crudBarrio.index', compact('barrios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los sectores registrados
        $sectores = Sector::all();

        // Pasar los sectores a la vista de creación
        return view('admin.crudBarrio.create', compact('sectores'));
    }



    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_barrio' => 'required|string',
            'id_sector' => 'required|exists:sectors,id',
        ]);

        // Crear un nuevo barrio en la base de datos
        Barrio::create([
            'nombre_barrio' => $request->input('nombre_barrio'),
            'id_sector' => $request->input('id_sector'),
        ]);

        // Redirigir a alguna parte de la aplicación, por ejemplo, a la lista de barrios
        return redirect()->route('barrio.index')->with('success', 'Barrio creado exitosamente.');
    }



    public function edit($id)
    {
        // Encontrar el barrio por su ID
        $barrio = Barrio::find($id);

        // Obtener todos los sectores registrados
        $sectores = Sector::all();

        // Devolver la vista de edición con el barrio y los sectores encontrados
        return view('admin.crudBarrio.edit', compact('barrio', 'sectores'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_barrio' => 'required|string',
            'id_sector' => 'required|exists:sectors,id', // Cambia 'nombre_sector' por 'id_sector'
        ]);

        // Encontrar el barrio por su ID
        $barrio = Barrio::find($id);

        // Actualizar los datos del barrio con los datos de la request
        $barrio->nombre_barrio = $request->input('nombre_barrio');
        $barrio->id_sector = $request->input('id_sector'); // Cambia 'nombre_sector' por 'id_sector'

        // Guardar los cambios
        $barrio->save();

        // Redirigir a la lista de barrios
        return redirect()->route('barrio.index')->with('success', 'Barrio actualizado exitosamente.');
    }

    public function destroy(Barrio $barrio)
    {
        $barrio->delete();

        return redirect()->route('barrio.index')->with('success', 'Barrio eliminado exitosamente.');
    }
}
