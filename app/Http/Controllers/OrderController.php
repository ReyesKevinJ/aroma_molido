<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required',

            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',

            'cart' => 'required|string',
        ]);

        $cart = json_decode($request->cart, true);
        $total = 0;

        foreach ($cart as $item) {
            $total +=
                $item['precio']
                * $item['cantidad'];
        }


        $order = Order::create([
            'user_id' => Auth::id(),
            'slug' => Str::uuid(),

            'total_amount' => $total,
            'shipping_cost' => 0,

            'status' => 'pendiente',

            'payment_method' => $request->payment_method,
            'payment_status' => 'unpaid',

            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
        ]);

        foreach ($cart as $item) {
            // Buscar si el producto realmente existe en la DB
            $producto_real = Product::findOrFail($item['id']);

            if ($producto_real) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $producto_real->id,
                    'quantity' => $item['cantidad'],
                    'price' => $producto_real->price,
                ]);
            }
        }

        return redirect()->route('user.my-orders')->with('success', true);
    }

    public function index()
    {
        // Asumiendo que tu modelo User tiene una relación 'orders'
        $pedidos = Auth::user()->orders()->latest()->get();

        return view('user.my-orders', compact('pedidos'));
    }

    // Agrega esto dentro de tu OrderController.php
    public function show($id)
    {
        // Buscamos el pedido por su ID cargando sus ítems y el producto asociado
        $pedido = Order::with('items.product')->findOrFail($id);

        // Retornamos la vista que creamos en el paso anterior
        return view('user.account-details', compact('pedido'));
    }
}
