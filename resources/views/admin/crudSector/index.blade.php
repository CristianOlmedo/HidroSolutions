@extends('adminlte::page')

@section('title', 'Sectores')

@section('content_header')
    <h1>Sectores</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('sector.create') }}" class="btn btn-primary">Nuevo</a>
        </div>
    </div>

    <table class="table table-light table-striped mt-4">
        <thead class="table-primary">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Sector</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sectores as $sector)
                <tr>
                    <td>{{ $sector->id }}</td>
                    <td>{{ $sector->nombre_sector }}</td>
                    <td>
                        <a href="{{ route('sector.edit', $sector->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('sector.destroy', $sector->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('¿Estás seguro de que quieres eliminar este sector?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
