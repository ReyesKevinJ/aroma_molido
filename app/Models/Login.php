<?php


use Illuminate\Support\Facades\Auth;

public function autenticar(Request $request)
{
    $credenciales = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if(Auth::attempt($credenciales))
    {
        $request->session()->regenerate();

        if(Auth::user()->role === 'admin')
        {
            return redirect('/admin');
        }

        return redirect('/cliente');
    }

    return back()->withErrors([
        'email' => 'Email o contraseña incorrectos'
    ]);
}