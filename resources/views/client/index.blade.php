@extends('layouts.appClient')

@section('title', 'HidroSolutions')

@section('content')
    <header>
        <nav class="navbar">
            <div class="navbar-brand">
                <img src="{{ asset('images/logo1.jpg') }}" alt="HidroSolutions Logo">
            </div>
            <ul class="navbar-menu">
                    <li><a href="{{ route('client.inicioSesion') }}">Iniciar Sesión</a></li>
                    <li><a href="{{ route('client.registrate') }}">Registrarse</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="image-section">
            <img src="{{ asset('images/tumaco.jpeg') }}" alt="Image">
        </section>
    </main>

    @section('footer')
    <div class="footer-content">
        <p>&copy; {{ date('Y') }} All rights reserved. Created by InnovateTech Solutions 2024.</p>
    </div>
    @endsection
@endsection
