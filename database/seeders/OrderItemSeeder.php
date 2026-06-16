<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtenemos todas las órdenes y productos existentes
        $orders = Order::all();
        $products = Product::all();

        // Verificación de seguridad
        if ($orders->isEmpty() || $products->isEmpty()) {
            $this->command->warn('Debes tener Órdenes y Productos creados antes de ejecutar este seeder.');
            return;
        }

        foreach ($orders as $order) {
            // Seleccionamos aleatoriamente entre 1 y 4 productos distintos para esta orden
            // Usamos ->random() de la colección de Laravel para no repetir el mismo producto en la misma orden
            $randomProducts = $products->random(rand(1, 4));

            $subtotalProducts = 0;

            foreach ($randomProducts as $product) {
                $quantity = rand(1, 3); // Compra entre 1 y 3 unidades de este café

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    // Tomamos el precio real que tiene el producto en este momento
                    'price' => $product->price,
                ]);

                // Vamos sumando el subtotal de estos items
                $subtotalProducts += ($product->price * $quantity);
            }

            // CORRECCIÓN MATEMÁTICA:
            // Actualizamos el total_amount de la Orden para que coincida exactamente
            // con los productos generados + el costo de envío generado en el OrderSeeder
            $order->update([
                'total_amount' => $subtotalProducts + $order->shipping_cost
            ]);
        }
    }
}
