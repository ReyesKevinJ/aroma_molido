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
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {


            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('welcome');
            }

            return redirect()->route('welcome');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
            'password' => 'La contraseña es incorrecta.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}
