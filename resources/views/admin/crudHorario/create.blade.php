@extends('adminlte::page')

@section('title', 'Registrar')

@section('content_header')
    <h1>Registrar Horario</h1>
@stop

@section('content')
    <form action="{{ route('horario.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="sector" class="form-label">Sector</label>
            <select id="sector" name="id_sector" class="form-select" tabindex="1">
                @foreach ($sectores as $sector)
                    <option value="{{ $sector->id }}">{{ $sector->nombre_sector }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
            <input id="fecha_inicio" name="fecha_inicio" type="date" class="form-control" tabindex="2">
        </div>
        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora de Inicio</label>
            <input id="hora_inicio" name="hora_inicio" type="time" class="form-control" tabindex="3">
        </div>
        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha de Fin</label>
            <input id="fecha_fin" name="fecha_fin" type="date" class="form-control" tabindex="4">
        </div>
        <div class="mb-3">
            <label for="hora_fin" class="form-label">Hora de Fin</label>
            <input id="hora_fin" name="hora_fin" type="time" class="form-control" tabindex="5">
        </div>
        <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
        <a href="{{ route('horario.index') }}" class="btn btn-secondary" tabindex="8">Cancelar</a>
    </form>


@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
