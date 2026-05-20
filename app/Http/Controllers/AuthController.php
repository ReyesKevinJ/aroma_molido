<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            // 'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Crear el nuevo usuario
        $user = User::create([
            'name' => $request->name ?? $request->email, // Si no se proporciona un nombre, usar el email como nombre
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        // Iniciar sesión automáticamente después del registro
        Auth::login($user);

        // Redirigir al usuario a la página de inicio o a donde desees
        return redirect()->route('welcome');
    }

    public function formularioLogin()
    {
        return view('backend.user.login');
    }

    public function autenticar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        // Intentar autenticar al usuario
        if (Auth::attempt($request->only('email', 'password'))) {
            // Si la autenticación es exitosa, redirigir al usuario a la página de inicio o a donde desees
            return redirect()->route('welcome');
        }

        // Si la autenticación falla, redirigir de vuelta al formulario de login con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ])->withInput();
    }
}
