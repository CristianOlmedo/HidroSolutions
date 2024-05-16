@extends('adminlte::page')

@section('title', 'Horarios')

@section('content_header')
    <h1>Horarios</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <a href="{{ route('horario.create') }}" class="btn btn-primary">Nuevo</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-light table-striped mt-4">
            <thead class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Sector</th>
                    <th scope="col">Fecha de Inicio</th>
                    <th scope="col">Hora de Inicio</th>
                    <th scope="col">Fecha de Fin</th>
                    <th scope="col">Hora de Fin</th>
                    <th scope="col">Inconsistencia</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Problema Barrio</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Barrio</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horarios as $horario)
                    <tr>
                        <td>{{ $horario->id }}</td>
                        <td>{{ $horario->sector->nombre_sector }}</td>
                        <td>{{ \Carbon\Carbon::parse($horario->fecha_inicio)->format('d/m/Y') }}</td>
                        <td>{{ $horario->hora_inicio }}</td>
                        <td>{{ \Carbon\Carbon::parse($horario->fecha_fin)->format('d/m/Y') }}</td>
                        <td>{{ $horario->hora_fin }}</td>
                        <td>
                            @foreach ($horario->inconsistenciasSuministro as $inconsistencia)
                                {{ $inconsistencia->descripcion }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($horario->inconsistenciasSuministro as $inconsistencia)
                                {{ $inconsistencia->estado }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($problemasBarrio as $problema)
                                @if ($problema->id_barrio == $horario->id_barrio)
                                    {{ $problema->descripcion }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($problemasBarrio as $problema)
                                @if ($problema->id_barrio == $horario->id_barrio)
                                    {{ $problema->fecha }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $horario->nombre_barrio }}</td>
                        <td>
                            @foreach ($problemasBarrio as $problema)
                                @if ($problema->id_barrio == $horario->id_barrio)
                                    {{ $problema->estado }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('horario.edit', $horario->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('horario.destroy', $horario->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Estás seguro de que quieres eliminar este horario?')">Eliminar</button>
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
