<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Register extends Model
{
    public function registrar(Request $request)
    {
        $datos = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        ]);

        User::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => Hash::make($datos['password']), //Encripta la contraseña.
            'role' => 'cliente'
        ]);

        return redirect('/login');
    }
}
