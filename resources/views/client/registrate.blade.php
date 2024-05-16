@extends('layouts.registro')

@section('title', 'Regístrate - HidroSolutions')

@section('content')
    <div class="register-container">
        <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="HidroSolutions Logo">
        </div>

        <div class="register-form">
            <h2>Regístrate</h2>
            <form action="{{ route('client.registrate.submit') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input type="text" id="name" name="name" placeholder="Nombres" required>
                </div>
                
                <div class="form-group">
                    <input type="text" id="identification" name="identification" placeholder="Identificación" required>
                </div>
                
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Correo Electrónico" required>
                </div>
                
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Contraseña" required>
                </div>
                
                <div class="form-group">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña" required>
                </div>

                <div class="form-group">
                    <button type="submit">Registrarse</button>
                </div>
            </form>
            <p>¿Ya tienes una cuenta? <a href="{{ route('client.inicioSesion') }}">¡Inicia sesión aquí!</a></p>
        </div>
    </div>
@endsection

@section('footer')
    <div class="footer-content">
        <p>&copy; {{ date('Y') }} All rights reserved. Created by InnovateTech Solutions 2024.</p>
    </div>
@endsection
