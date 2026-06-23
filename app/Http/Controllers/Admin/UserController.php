<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // 1. Filtro por búsqueda (Nombre o Email)
        $query->when($request->filled('search'), function ($q) use ($request) {
            $searchTerm = '%' . $request->search . '%';
            $q->where(function ($subQuery) use ($searchTerm) {
                $subQuery->where('name', 'like', $searchTerm)
                    ->orWhere('email', 'like', $searchTerm);
            });
        });

        // 2. Filtro por Rol (admin o customer)
        $query->when($request->filled('role'), function ($q) use ($request) {
            $q->where('role', $request->role);
        });

        // 3. Ejecutar y paginar
        $users = $query->latest('id')->paginate(10)->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit(String $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, String $id)
    {
        $user = User::findOrFail($id);
        $validator = $request->validate([
            'role' => 'required|in:admin,customer',
        ]);
        if (!$validator) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user->update([
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado exitosamente.');
    }
}
