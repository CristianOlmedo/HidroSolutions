<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;

class AuthClientController extends Controller
{
    // Método para mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('client.inicioSesion');
    }

    // Método para procesar el inicio de sesión
    public function login(Request $request)
    {
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('client.homeClient');
        }
        return back()->withErrors(['email' => 'Estas credenciales no coinciden con nuestros registros.'])->withInput($request->only('email'));
    }



    // Método para mostrar el formulario de registro

    public function showRegistrationForm()
    {
        return view('client.registrate');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'identification' => 'required|string|max:255|unique:clients',
            'email' => 'required|string|email|max:255|unique:clients',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Client::create([
            'name' => $validatedData['name'],
            'identification' => $validatedData['identification'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        Auth::guard('client')->login($user);

        return redirect('/client/inicioSesion');
    }

    // Método para cerrar sesión
    public function logout(Request $request)
    {
        Auth::guard('client')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
