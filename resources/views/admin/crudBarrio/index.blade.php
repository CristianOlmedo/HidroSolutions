@extends('adminlte::page')

@section('title', 'Barrios')

@section('content_header')
    <h1>Barrios</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <a href="{{ route('barrio.create') }}" class="btn btn-primary">Nuevo</a>
        </div>
    </div>
        <table class="table table-light table-striped mt-4">
            <thead class="table table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Barrio</th>
                    <th scope="col">Sector</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barrios as $barrio)
                    <tr>
                        <td>{{ $barrio->id }}</td>
                        <td>{{ $barrio->nombre_barrio }}</td>
                        <td>{{ $barrio->sector ? $barrio->sector->nombre_sector : 'Sin sector asignado' }}
                        </td>
                        <td>
                            <a href="{{ route('barrio.edit', $barrio->id) }}"
                                class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('barrio.destroy', $barrio->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Estás seguro de que quieres eliminar este barrio?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
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
