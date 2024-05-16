<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - HidroSolutions</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-f0RHmZYI0QL7y8ENokQN2cdtbHJzxTwWwu6CvzTQTKpvh9j/3K+Y+QDMUZnIuTR3+K7+IFG/Yti5B7PW+Uf64Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        @keyframes subeBaja {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
                /* Altura máxima de subida */
            }

            100% {
                transform: translateY(0);
            }
        }

        .section-float {
            animation: subeBaja 2s infinite;
            /* Duración y repetición de la animación */
        }

        .navbar-brand {
            margin-right: auto;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <a class="navbar-brand" href="#top"><b>Hidro</b>Solutions</a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home"><b>Home</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sectors"><b>Sectores y Barrios</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#schedules"><b>Horarios</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#report"><b>Notificar Problemas</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact"><b>Contactos</b></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    @auth('client')
                        <li class="nav-item">
                            <span class="nav-link">{{ auth()->guard('client')->user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('client.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Cerrar sesión</button>
                            </form>
                        </li>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>


    <section id="home" class="section section-float"
        style="display: flex; justify-content: center; align-items: center; position: relative; width: 100%; height: 100vh; overflow: hidden;">
        <div class="container" style="position: absolute; top: 5%; left: 8%; width: 100%; height: 100%;">
            <div class="jumbotron text-center"
                style="background-image: url('/images/aqua.jpg'); background-size: cover; background-position: center; width: 100%; height: 100%;">
                <div
                    style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%;">
                    <h1 class="display-4" style="color: rgb(0, 4, 247)"><b>Bienvenido a HidroSolutions</b></h1>
                    <p class="lead" style="color: rgb(255, 255, 255)">Este software es para gestionar el suministro de Agua Potable.</p>
                    <a class="btn btn-primary btn-lg" href="#sectors" role="button">
                        <i class="fas fa-arrow-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <hr>



    <section id="sectors" class="section mb-5 " class="section" style="background-color: rgb(13, 110, 253)">
        <div class="container">
            <h2 class="text-center">Sectores y Barrios</h2>
            <p>En esta sección encontrarás información detallada sobre los diversos sectores y barrios que forman parte
                de nuestra comunidad. Explora la lista de sectores y sus respectivos barrios para conocer más sobre su
                ubicación, características y servicios disponibles. ¡Descubre cómo estamos conectando comunidades y
                proporcionando soluciones para el suministro de agua potable!</p>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">Nombre del Sector</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sectores as $sector)
                                        <tr>
                                            <td>{{ $sector->nombre_sector }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">Nombre del Barrio</th>
                                        <th class="text-center">Sector</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barrios as $barrio)
                                        <tr>
                                            <td>{{ $barrio->nombre_barrio }}</td>
                                            <td>{{ $barrio->sector->nombre_sector }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </section>
    <hr>

    <section id="schedules" class="section mb-5" class="section" style="background-color: rgb(255, 255, 255)">
        <div class="container">
            <h2 class="text-center">Horarios</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="search">Buscar por Sector:</label>
                        <input type="text" class="form-control" id="search"
                            placeholder="Ingrese el nombre del barrio">
                    </div>
                    <div class="col-sm-auto align-self-center">
                        <button type="button" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>Sector</th>
                                <th>Fecha de Inicio</th>
                                <th>Hora de Inicio</th>
                                <th>Fecha de Fin</th>
                                <th>Hora de Fin</th>
                                <th>Inconsistencia</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($horarios as $horario)
                                <tr>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
    <hr>

    <section id="report" class="section mb-5" class="section" style="background-color: rgb(13, 110, 253)">
        <div class="container">
            <h2 class="text-center">Notificar Problemas</h2>
            <form action="{{ route('client.reportProblem.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <textarea class="form-control" id="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="date">Fecha:</label>
                    <input type="date" class="form-control col-3" id="date">
                </div>
                <div class="form-group">
                    <label for="neighborhood">Barrio:</label>
                    <select class="form-control col-3" id="id_barrio" name="id_barrio" required>
                        <option value="">Seleccionar Barrio</option>
                        @foreach ($barrios as $barrio)
                            <option value="{{ $barrio->id }}">{{ $barrio->nombre_barrio }}</option>
                        @endforeach
                    </select>
                    <!-- Agrega un mensaje de error para el barrio -->
                    @error('id_barrio')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary">Cancelar</button>
            </form>
        </div>
        <br>
    </section>
    <hr>

    <section id="contact" class="section mb-5" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center">Contactos</h2>
                            <p class="card-text">Correo electrónico: info@hidrosolutions.com</p>
                            <p class="card-text">Teléfono: +1234567890</p>
                            <p class="card-text">Dirección: Calle Principal #123</p>
                            <p class="card-text">Horarios de atención: Lunes a Viernes de 9am a 5pm - Sábados de 8:30am
                                a 12:00pm</p>
                            <div class="social-links text-center">
                                <a href="https://www.facebook.com/AguasTumacoSAESP" class="btn btn-primary"
                                    target="_blank">Facebook</a>
                                <a href="https://www.instagram.com/hidrosolutions" class="btn btn-danger"
                                    target="_blank">Instagram</a>
                                <a href="https://twitter.com/hidrosolutions" class="btn btn-info"
                                    target="_blank">Twitter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>

    <footer style="background-color: rgb(13, 110, 253); padding: 20px 0;">
        <div class="container">
            <p class="text-center">Copyrigth &copy; Todos los derechos reservados - Creado por: InnovateTech Solutions
                - 2024</p>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
        < /> <
        script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" >
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
