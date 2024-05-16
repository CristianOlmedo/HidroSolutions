@extends('adminlte::page')

@section('title', 'Inconsistencias')

@section('content_header')
    <h1>Inconsistencia del Suministro de Agua</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <a href="{{ route('inconsistencia.create') }}" class="btn btn-primary">Nuevo</a>
        </div>
    </div>
    <table class="table table-light table-striped mt-4">
        <thead class="table table-primary">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Descripción</th>
                <th scope="col">Horario</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inconsistencias as $inconsistencia)
                <tr>
                    <td>{{ $inconsistencia->id }}</td>
                    <td>{{ $inconsistencia->descripcion }}</td>
                    <td>{{ $inconsistencia->horario->nombre }}</td>
                    <td>{{ $inconsistencia->fecha }}</td>
                    <td>{{ $inconsistencia->estado }}</td>
                    <td>
                        <a href="{{ route('inconsistencia.edit', $inconsistencia->id) }}"
                            class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('inconsistencia.destroy', $inconsistencia->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('¿Estás seguro de que quieres eliminar esta inconsistencia?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
