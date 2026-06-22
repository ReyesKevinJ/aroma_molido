<x-layouts.admin>
    @section('title', 'Gestionar Orden #' . $order->id)
    @section('content')

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Gestionar Orden #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
        </h1>
        <a href="{{ route('admin.orders.index') }}"
            class="text-gray-600 hover:text-blue-600 flex items-center font-medium transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
            </svg>
            Volver al listado
        </a>
    </div>

    @if ($errors->any())
    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
        <div class="font-medium text-red-600 mb-2">Por favor, corrige los siguientes errores:</div>
        <ul class="list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Información de la Orden</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500 mb-1">Cliente</p>
                        <p class="font-medium text-gray-900">{{ $order->user->name }} {{$order->user->last_name}}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Correo Electrónico</p>
                        <p class="font-medium text-gray-900">{{ $order->user->email ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Numero de Telefono</p>
                        <p class="font-medium text-gray-900">{{ $order->user->phone ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Fecha de Pedido</p>
                        <p class="font-medium text-gray-900">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Método de Pago</p>
                        <p class="font-medium text-gray-900 capitalize">
                            {{ str_replace('_', ' ', $order->payment_method) }}
                        </p>
                    </div>
                    <div class="col-span-full font-bold text-lg">
                        Informacion de Envio
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Direccion</p>
                        <p class="font-medium text-gray-900">{{ $order->address }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Ciudad</p>
                        <p class="font-medium text-gray-900">{{ $order->city }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Codigo Postal</p>
                        <p class="font-medium text-gray-900">{{ $order->postal_code }}</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Actualizar Estado</h2>

                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-5">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-700">Estado de la
                            Orden</label>
                        <select name="status" id="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="pending" {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>
                                Pendiente</option>
                            <option value="processing"
                                {{ old('status', $order->status) == 'processing' ? 'selected' : '' }}>En Proceso
                            </option>
                            <option value="shipped" {{ old('status', $order->status) == 'shipped' ? 'selected' : '' }}>
                                Enviado</option>
                            <option value="completed"
                                {{ old('status', $order->status) == 'completed' ? 'selected' : '' }}>Completado</option>
                            <option value="cancelled"
                                {{ old('status', $order->status) == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="shipped_at" class="block mb-2 text-sm font-medium text-gray-700">Fecha de
                            Envío</label>
                        <input type="date" name="shipped_at" id="shipped_at"
                            value="{{ old('shipped_at', $order->shipped_at ? \Carbon\Carbon::parse($order->shipped_at)->format('Y-m-d') : '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <p class="mt-1 text-xs text-gray-500">Dejar en blanco si aún no ha sido enviado.</p>
                    </div>

                    <button type="submit"
                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors">
                        Guardar Cambios
                    </button>
                </form>
            </div>
        </div>
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Productos en esta Orden</h2>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th scope="col" class="px-4 py-3">Producto</th>
                                <th scope="col" class="px-4 py-3 text-center">Cantidad</th>
                                <th scope="col" class="px-4 py-3 text-right">Precio Unitario</th>
                                <th scope="col" class="px-4 py-3 text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($order->items as $item)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    {{ $item->product->name ?? 'Producto Eliminado' }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    {{ $item->quantity }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $item->priceFormat() }}
                                </td>
                                <td class="px-4 py-3 text-right font-medium text-gray-900">
                                    ${{ number_format($item->price * $item->quantity, 2, ',', '.') }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                                    No se encontraron productos para esta orden.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="bg-gray-50 font-semibold text-gray-900">
                            <tr>
                                <td colspan="3" class="px-4 py-3 text-right">Costo de Envío:</td>
                                <td class="px-4 py-3 text-right">{{ $order->shippingCostFormat() ?? '$0,00' }}</td>
                            </tr>
                            <tr class="border-t border-gray-200">
                                <td colspan="3" class="px-4 py-3 text-right text-base">Total Pagado:</td>
                                <td class="px-4 py-3 text-right text-base text-blue-600">
                                    {{ $order->totalAmountFormat() }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection
</x-layouts.admin>