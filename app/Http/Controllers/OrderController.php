<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
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

            'status' => 'pending',

            'payment_method' => $request->payment_method,
            'payment_status' => 'unpaid',

            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
        ]);

        foreach ($cart as $item) {

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['cantidad'],
                'price' => $item['precio']
            ]);
        }

        return response()->json([
            'success' => true
        ]);
    }
}
