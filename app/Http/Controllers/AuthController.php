<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function formularioRegistro(){
        return view('backend.usuarios.register');
    }

    public function formularioLogin(){
        return view('backend.usuarios.login');
    }
}
