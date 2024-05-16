@extends('adminlte::page')

@section('title', 'Editar Sector')

@section('content_header')
    <h1>Editar Sector</h1>
@stop

@section('content')
    <form action="{{ route('sector.update', $sector->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre_sector" class="form-label">Nombre del Sector</label>
            <input id="nombre_sector" name="nombre_sector" type="text" class="form-control"
                value="{{ $sector->nombre_sector }}" tabindex="1">
        </div>
        <button type="submit" class="btn btn-primary" tabindex="2">Guardar</button>
        <a href="{{ route('sector.index') }}" class="btn btn-secondary" tabindex="3">Cancelar</a>
    </form>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
@stop

@section('js')
    {{-- Add here extra scripts --}}
@stop
