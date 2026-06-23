<x-layouts.app>
    @section('title', 'Detalle de la Compra')

    @section('content')
    <section class="min-h-screen p-5 md:p-0 max-w-screen-lg m-auto my-10">
        <div class="container mx-auto p-4 mt-8 max-w-4xl">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Detalle del Pedido #{{ $pedido->id }}</h1>
                <a href="{{ route('user.my-orders') }}" class="text-amber-700 hover:underline font-semibold">← Volver a mis pedidos</a>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 mb-6 border border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6 text-sm text-gray-600">
                    <div>
                        <p class="font-bold">Fecha del Pedido:</p>
                        <p>{{ $pedido->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div>
                        <p class="font-bold">Estado:</p>

                        <span
                            class="px-2.5 py-0.5 rounded-full font-semibold text-xs

                            {{ $pedido->status == 'completado' ? 'bg-green-100 text-green-800' : '' }}

                            {{ $pedido->status == 'pendiente' ? 'bg-yellow-100 text-yellow-800' : '' }}

                            {{ $pedido->status == 'cancelado' ? 'bg-red-100 text-red-800' : '' }}

                            {{ $pedido->status == 'procesando' ? 'bg-blue-100 text-blue-800' : '' }}

                            {{ $pedido->status == 'enviado' ? 'bg-purple-100 text-purple-800' : '' }}
                        ">
                            {{ ucfirst($pedido->status) }}
                        </span>
                    </div>
                    <div>
                        <p class="font-bold">Total Abonado:</p>
                        <p class="text-lg font-bold text-gray-900">${{ number_format($pedido->total_amount, 2) }}</p>
                    </div>
                </div>

                <h2 class="text-lg font-bold mb-4 text-gray-700 border-b pb-2">Productos Comprados</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left">
                        <thead class="bg-gray-50 text-gray-600 text-sm">
                            <tr>
                                <th class="py-3 px-4">Producto</th>
                                <th class="py-3 px-4 text-center">Cantidad</th>
                                <th class="py-3 px-4 text-right">Precio Unitario</th>
                                <th class="py-3 px-4 text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-gray-700">
                            @foreach($pedido->items as $item)
                            <tr>
                                <td class="py-4 px-4 font-medium">
                                    {{ $item->product ? $item->product->name : 'Producto ya no disponible' }}
                                </td>
                                <td class="py-4 px-4 text-center">{{ $item->quantity }}</td>
                                <td class="py-4 px-4 text-right">${{ number_format($item->price, 2) }}</td>
                                <td class="py-4 px-4 text-right font-semibold">${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @endsection
</x-layouts.app>