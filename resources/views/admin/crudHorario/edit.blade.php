@extends('adminlte::page')

@section('title', 'Editar Horario')

@section('content_header')
    <h1>Editar Horario</h1>
@stop

@section('content')
    <form action="{{ route('horario.update', $horario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
            <input id="fecha_inicio" name="fecha_inicio" type="date" class="form-control" value="{{ $horario->fecha_inicio }}"
                tabindex="1">
        </div>
        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora de Inicio</label>
            <input id="hora_inicio" name="hora_inicio" type="time" class="form-control"
                value="{{ $horario->hora_inicio }}" tabindex="2">
        </div>
        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha de Fin</label>
            <input id="fecha_fin" name="fecha_fin" type="date" class="form-control" value="{{ $horario->fecha_fin }}"
                tabindex="3">
        </div>
        <div class="mb-3">
            <label for="hora_fin" class="form-label">Hora de Fin</label>
            <input id="hora_fin" name="hora_fin" type="time" class="form-control" value="{{ $horario->hora_fin }}"
                tabindex="4">
        </div>
        <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
        <a href="{{ route('horario.index') }}" class="btn btn-secondary" tabindex="6">Cancelar</a>
    </form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
@stop

@section('js')
    {{-- Add here extra scripts --}}
@stop
