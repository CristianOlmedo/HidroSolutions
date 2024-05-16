@extends('adminlte::page')

@section('title', 'Registrar')

@section('content_header')
    <h1>Registrar Inconsistencia en el Suministro de Agua</h1>
@stop

@section('content')
    <form action="{{ route('inconsistencia.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="horario" class="form-label">Horario</label>
            <select id="horario" name="id_horario" class="form-select" tabindex="2">
                @foreach ($horarios as $horario)
                    <option value="{{ $horario->id }}">{{ $horario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input id="fecha" name="fecha" type="date" class="form-control" tabindex="3">
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select id="estado" name="estado" class="form-select" tabindex="4">
                <option value="Por iniciar">Por Iniciar</option>
                <option value="En Proceso">En Proceso</option>
                <option value="Terminado">Terminado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
        <a href="{{ route('horario.index') }}" class="btn btn-secondary" tabindex="6">Cancelar</a>
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
