<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Sector;
use App\Models\ProblemaBarrio;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los horarios con sus sectores
        $horarios = Horario::with('sector')->get();

        // Obtener todos los problemas de barrio
        $problemasBarrio = ProblemaBarrio::all();

        // Obtener todos los horarios con sus inconsistencias de suministro asociadas
        $horarios = Horario::with(['inconsistenciasSuministro' => function ($query) {
            $query->select('id_horario', 'estado', 'fecha');
        }])->get();

        return view('admin.crudHorario.index', compact('horarios', 'problemasBarrio'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los sectores registrados
        $sectores = Sector::all();

        // Devolver la vista de creación de horario
        return view('admin.crudHorario.create', compact('sectores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'id_sector' => 'required|exists:sectors,id',
            'fecha_inicio' => 'required|date',
            'hora_inicio' => 'required',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'hora_fin' => 'required',
        ]);

        // Crear un nuevo horario en la base de datos
        Horario::create([
            'id_sector' => $request->input('id_sector'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'hora_inicio' => $request->input('hora_inicio'),
            'fecha_fin' => $request->input('fecha_fin'),
            'hora_fin' => $request->input('hora_fin'),
        ]);

        // Redirigir a alguna parte de la aplicación, por ejemplo, a la lista de horarios
        return redirect()->route('horario.index')->with('success', 'Horario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener el horario a editar
        $horario = Horario::findOrFail($id);

        // Obtener todos los sectores registrados
        $sectores = Sector::all();

        // Devolver la vista de edición de horario con los datos del horario y los sectores
        return view('admin.crudHorario.edit', compact('horario', 'sectores'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'id_sector' => 'required|exists:sectors,id',
            'fecha_inicio' => 'required|date',
            'hora_inicio' => 'required',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'hora_fin' => 'required',
        ]);

        // Obtener el horario a actualizar
        $horario = Horario::findOrFail($id);

        // Actualizar el horario con los nuevos datos del formulario
        $horario->update([
            'id_sector' => $request->input('id_sector'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'hora_inicio' => $request->input('hora_inicio'),
            'fecha_fin' => $request->input('fecha_fin'),
            'hora_fin' => $request->input('hora_fin'),
        ]);

        // Redirigir a alguna parte de la aplicación, por ejemplo, a la lista de horarios
        return redirect()->route('horario.index')->with('success', 'Horario actualizado exitosamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encuentra el horario por su ID
        $horario = Horario::findOrFail($id);

        // Elimina el horario de la base de datos
        $horario->delete();

        // Redirige de vuelta al índice de horarios con un mensaje de éxito
        return redirect()->route('horario.index')->with('success', 'Horario eliminado exitosamente.');
    }
}
