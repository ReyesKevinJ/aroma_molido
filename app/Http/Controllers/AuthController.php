<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function formularioRegistro()
    {
        return view('backend.user.register');
    }

    public function register(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el nuevo usuario
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Iniciar sesión automáticamente después del registro
        auth()->login($user);

        // Redirigir al usuario a la página de inicio o a donde desees
        return redirect()->route('welcome');
    }

    public function formularioLogin()
    {
        return view('backend.user.login');
    }
}
