@extends('adminlte::page')

@section('title', 'Registrar')

@section('content_header')
    <h1>Registrar Barrios</h1>
@stop

@section('content')
    <form action="{{ route('barrio.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="barrio" class="form-label">Barrio</label>
            <input id="barrio" name="nombre_barrio" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="sector" class="form-label">Sector</label>
            <select id="sector" name="id_sector" class="form-select" tabindex="2">
                @foreach ($sectores as $sector)
                    <option value="{{ $sector->id }}">{{ $sector->nombre_sector }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
        <a href="{{ route('barrio.index') }}" class="btn btn-secondary" tabindex="6">Cancelar</a>
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
