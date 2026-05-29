<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Weight;

class WeightController extends Controller
{
    public function index()
    {
        $weights = Weight::withTrashed()->get();
        return view('admin.weights.index', compact('weights'));
    }

    public function create()
    {
        return view('admin.weights.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|unique:weights,name',
        ]);
        if (!$validator) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Weight::create($request->all());

        return redirect()->route('admin.weights.index')->with('success', 'Peso creado exitosamente.');
    }

    public function edit(Weight $weight)
    {
        return view('admin.weights.edit', compact('weight'));
    }

    public function update(Request $request, Weight $weight)
    {
        $request->validate([
            'name' => 'required|unique:weights,name,' . $weight->id,
        ]);

        $weight->update($request->all());

        return redirect()->route('admin.weights.index')->with('success', 'Peso actualizado exitosamente.');
    }

    public function destroy(String $id)
    {
        $weight = Weight::findOrFail($id);
        $weight->delete();
        return redirect()->route('admin.weights.index')->with('success', 'Peso eliminado exitosamente.');
    }

    public function restore(String $id)
    {
        $weight = Weight::withTrashed()->findOrFail($id);
        $weight->restore();
        return redirect()->route('admin.weights.index')->with('success', 'Peso restaurado exitosamente.');
    }
}
