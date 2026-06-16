<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // 1. Iniciamos la consulta cargando la relación con el usuario
        $query = Order::query()->with('user');

        // 2. Buscador general (Busca por ID de orden o por nombre/email del usuario)
        $query->when($request->filled('search'), function ($q) use ($request) {
            $searchTerm = '%' . $request->search . '%';
            $q->where('id', 'like', $searchTerm)
                ->orWhereHas('user', function ($userQuery) use ($searchTerm) {
                    $userQuery->where('name', 'like', $searchTerm)
                        ->orWhere('email', 'like', $searchTerm);
                });
        });

        // 3. Filtro exacto por ID de Usuario (Si usas un select)
        $query->when($request->filled('user_id'), function ($q) use ($request) {
            $q->where('user_id', $request->user_id);
        });

        // 4. Filtro por Estado
        $query->when($request->filled('status'), function ($q) use ($request) {
            $q->where('status', $request->status);
        });

        // 5. Filtro por Método de Pago
        $query->when($request->filled('payment_method'), function ($q) use ($request) {
            $q->where('payment_method', $request->payment_method);
        });

        // 6. Filtro por Fecha de Creación (date)
        $query->when($request->filled('date'), function ($q) use ($request) {
            // whereDate ignora la hora (H:i:s) y busca solo por el día (Y-m-d)
            $q->whereDate('created_at', $request->date);
        });

        // 7. Filtro por Fecha de Envío (shipped_at)
        $query->when($request->filled('shipped_at'), function ($q) use ($request) {
            $q->whereDate('shipped_at', $request->shipped_at);
        });

        // 8. Ejecutar consulta
        $orders = $query->latest('id')->paginate(15)->withQueryString();

        // Obtenemos los usuarios para llenar el <select> de clientes
        $users = User::select('id', 'name')->orderBy('name')->get();

        return view('admin.orders.index', compact('orders', 'users'));
    }
    public function edit(String $id)
    {
        $order = Order::findOrFail($id);
        // Cargamos la relación del usuario para poder mostrar sus datos en la vista
        $order->load('user');

        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, String $id)
    {
        $order = Order::findOrFail($id);
        // 1. Validamos solo los campos que se pueden editar
        $request->validate([
            'status' => 'required|string|in:pending,processing,shipped,completed,cancelled',
            'shipped_at' => 'nullable|date',
        ]);

        // 2. Actualizamos la orden
        $order->update([
            'status' => $request->status,
            'shipped_at' => $request->shipped_at,
        ]);

        // 3. Redirigimos de vuelta con un mensaje de éxito
        return redirect()->route('admin.orders.index')
            ->with('success', 'La orden #' . $order->id . ' ha sido actualizada correctamente.');
    }
}