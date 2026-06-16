<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    // Muestra el formulario con los datos actuales
    public function edit()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    // Procesa la actualización de los datos
    public function update(Request $request)
    {
        $user = Auth::user();


        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'dni' => 'nullable|string|max:20',
            // El email es obligatorio, pero ignoramos el ID del usuario actual para que no tire error de "ya existe"
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            // La contraseña es opcional; si la escribe, debe tener mínimo 8 caracteres y confirmarse
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Actualizamos los datos básicos
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->dni = $request->dni;
        $user->email = $request->email;

        // Si el usuario escribió una nueva contraseña, la encriptamos y la guardamos
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Redireccionamos de vuelta con un mensaje de éxito masivo
        return redirect()->back()->with('success', '¡Perfil actualizado correctamente!');
    }
}
