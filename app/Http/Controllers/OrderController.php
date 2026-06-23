<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        if (empty($cart)) {
            return back()->withErrors(['error' => 'El carrito está vacío.']);
        }

        $total = 0;
        $productos_validados = [];

        foreach ($cart as $item) {
            $producto_real = Product::find($item['id']);

            if (!$producto_real) {
                return back()->withErrors(['error' => 'Uno de los productos del carrito ya no está disponible.']);
            }

            // Verificamos si hay stock suficiente
            if ($producto_real->stock < $item['cantidad']) {
                return back()->withErrors([
                    'error' => "No hay stock suficiente para '{$producto_real->name}'. Quedan {$producto_real->stock} unidades disponibles."
                ]);
            }
            $total += $producto_real->price * $item['cantidad'];
            $productos_validados[] = [
                'producto' => $producto_real,
                'cantidad' => $item['cantidad']
            ];
        }
        try {
            DB::transaction(function () use ($request, $total, $productos_validados) {

                // A. Crear la orden cabecera
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'slug' => Str::uuid(),
                    'total_amount' => $total,
                    'shipping_cost' => 0,
                    'status' => 'pendiente',
                    'payment_method' => $request->payment_method,
                    'payment_status' => 'no pagado',
                    'address' => $request->address,
                    'city' => $request->city,
                    'postal_code' => $request->postal_code,
                ]);

                // B. Crear los items y descontar el stock
                foreach ($productos_validados as $item_validado) {
                    $producto = $item_validado['producto'];
                    $cantidad = $item_validado['cantidad'];

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $producto->id,
                        'quantity' => $cantidad,
                        'price' => $producto->price,
                    ]);

                    // Descontamos el stock de la base de datos
                    $producto->decrement('stock', $cantidad);
                }
            });

            // Si todo salió bien, redirigimos con éxito
            return redirect()->route('user.my-orders')->with('success', true);
        } catch (\Exception $e) {
            // Si ocurre algún error a nivel de base de datos durante la transacción
            return back()->withErrors(['error' => 'Ocurrió un problema al procesar tu pedido. Por favor, inténtalo de nuevo.']);
        }
    }

    public function index()
    {
        $pedidos = Order::where('user_id', Auth::id())->latest()->get();

        return view('user.my-orders', compact('pedidos'));
    }

    // Agrega esto dentro de tu OrderController.php
    public function show(String $id)
    {
        // Buscamos el pedido por su ID cargando sus ítems y el producto asociado
        $pedido = Order::with('items.product')->findOrFail($id);

        // Retornamos la vista que creamos en el paso anterior
        return view('user.account-details', compact('pedido'));
    }
}
