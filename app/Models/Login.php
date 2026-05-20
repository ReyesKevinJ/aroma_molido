<?php


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Model
{
    public function autenticar(Request $request)
    {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect('/admin');
            }

            return redirect()->route('welcome');
        }

        return back()->withErrors([
            'email' => 'Email o contraseña incorrectos'
        ]);
    }
}
