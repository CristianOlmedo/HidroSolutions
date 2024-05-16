<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InconsistenciaSuministro; // Asegúrate de importar el modelo adecuado
use App\Models\Horario;

class InconsistenciaSuministroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inconsistencias = InconsistenciaSuministro::with('sector')->get();
        return view('admin.crudInconsistencia.index', compact('inconsistencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todas las inconsistencias para pasarlas a la vista
        $inconsistencias = InconsistenciaSuministro::all();

        // Obtener todos los horarios disponibles
        $horarios = Horario::all();

        return view('admin.crudInconsistencia.create', compact('horarios'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'descripcion' => 'required|string',
            'id_sector' => 'required|exists:sectors,id',
            'fecha' => 'required|date',
            'estado' => 'required|string',
        ]);

        // Crear una nueva inconsistencia en el suministro en la base de datos
        InconsistenciaSuministro::create([
            'descripcion' => $request->input('descripcion'),
            'id_sector' => $request->input('id_sector'),
            'fecha' => $request->input('fecha'),
            'estado' => $request->input('estado'),
        ]);

        // Redirigir a alguna parte de la aplicación, por ejemplo, a la lista de inconsistencias
        return redirect()->route('inconsistencia.index')->with('success', 'Inconsistencia registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    /*public function show($id)
    {
        // Obtener la inconsistencia especificada por su ID y pasarla a la vista de detalle
        $inconsistencia = InconsistenciaSuministro::findOrFail($id);
        return view('adminlte.inconsistencia.show', compact('inconsistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    /*public function edit($id)
    {
        // Obtener la inconsistencia especificada por su ID y pasarla a la vista de edición
        $inconsistencia = InconsistenciaSuministro::findOrFail($id);
        return view('adminlte.inconsistencia.edit', compact('inconsistencia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'descripcion' => 'required|string',
            'id_sector' => 'required|exists:sectors,id',
            'fecha' => 'required|date',
            'estado' => 'required|string',
        ]);

        // Buscar la inconsistencia por su ID y actualizar los datos
        $inconsistencia = InconsistenciaSuministro::findOrFail($id);
        $inconsistencia->update([
            'descripcion' => $request->input('descripcion'),
            'id_sector' => $request->input('id_sector'),
            'fecha' => $request->input('fecha'),
            'estado' => $request->input('estado'),
        ]);

        // Redirigir de vuelta a la vista de índice con un mensaje de éxito
        return redirect()->route('inconsistencia.index')->with('success', 'Inconsistencia actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscar la inconsistencia por su ID y eliminarla
        $inconsistencia = InconsistenciaSuministro::findOrFail($id);
        $inconsistencia->delete();

        // Redirigir de vuelta a la vista de índice con un mensaje de éxito
        return redirect()->route('inconsistencia.index')->with('success', 'Inconsistencia eliminada exitosamente.');
    }

    
}
