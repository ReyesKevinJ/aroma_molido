<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function client()
    {
        return view('backend.user.client');
    }
}
