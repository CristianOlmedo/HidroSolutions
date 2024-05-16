@extends('adminlte::page')

@section('title', 'Registrar')

@section('content_header')
    <h1>Registrar Sectores</h1>
@stop

@section('content')
    <form action="{{ route('sector.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre_sector" class="form-label">Sector</label>
            <input id="nombre_sector" name="nombre_sector" type="text" class="form-control" tabindex="1">
        </div>
        <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
        <a href="{{ route('sector.index') }}" class="btn btn-secondary" tabindex="6">Cancelar</a>
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
