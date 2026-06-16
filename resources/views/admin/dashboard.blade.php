<x-layouts.admin>
    @section('title', 'Dashboard')
    @section('content')

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Panel de Control</h1>
        <p class="text-gray-500 text-sm mt-1">Resumen de la actividad de tu tienda.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex items-center">
            <div
                class="inline-flex flex-shrink-0 items-center justify-center h-12 w-12 text-green-600 bg-green-100 rounded-lg mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
            </div>
            <div>
                <span class="block text-sm font-medium text-gray-500">Ventas del Mes</span>
                <span class="block text-2xl font-bold text-gray-900">{{ $salesThisMonth }} <span
                        class="text-sm font-normal text-gray-500">pedidos</span></span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex items-center">
            <div
                class="inline-flex flex-shrink-0 items-center justify-center h-12 w-12 text-yellow-600 bg-yellow-100 rounded-lg mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <div>
                <span class="block text-sm font-medium text-gray-500">Por Preparar</span>
                <span class="block text-2xl font-bold text-gray-900">{{ $pendingOrdersCount }}</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex items-center">
            <div
                class="inline-flex flex-shrink-0 items-center justify-center h-12 w-12 text-blue-600 bg-blue-100 rounded-lg mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            </div>
            <div>
                <span class="block text-sm font-medium text-gray-500">Clientes</span>
                <span class="block text-2xl font-bold text-gray-900">{{ $totalUsers }}</span>
            </div>
        </div>

        <div
            class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex items-center {{ $lowStockProducts->count() > 0 ? 'border-red-300 bg-red-50/30' : '' }}">
            <div
                class="inline-flex flex-shrink-0 items-center justify-center h-12 w-12 {{ $lowStockProducts->count() > 0 ? 'text-red-600 bg-red-100' : 'text-gray-600 bg-gray-100' }} rounded-lg mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <div>
                <span class="block text-sm font-medium text-gray-500">Alertas de Stock</span>
                <span class="block text-2xl font-bold text-gray-900">{{ $lowStockProducts->count() }} <span
                        class="text-sm font-normal text-gray-500">productos</span></span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="flex items-center justify-between p-5 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Últimos Pedidos Recibidos</h2>
                <a href="{{ route('admin.orders.index') }}"
                    class="text-sm text-blue-600 hover:text-blue-800 font-medium">Ver todos &rarr;</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="px-5 py-3"># Orden</th>
                            <th class="px-5 py-3">Cliente</th>
                            <th class="px-5 py-3">Estado</th>
                            <th class="px-5 py-3">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentOrders as $order)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-5 py-3 font-medium text-gray-900">
                                #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-5 py-3">{{ $order->user->name ?? 'Usuario Eliminado' }}</td>
                            <td class="px-5 py-3">
                                <span class="px-2.5 py-1 text-[10px] font-bold rounded-full uppercase tracking-wider
                                    {{ $order->status == 'completed' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ in_array($order->status, ['pending', 'processing']) ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $order->status == 'shipped' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $order->status == 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="px-5 py-3">{{ $order->created_at->diffForHumans() }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-5 py-6 text-center text-gray-500">Aún no hay pedidos registrados.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="lg:col-span-1 bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="flex items-center justify-between p-5 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Stock Crítico </h2>
                <a href="{{ route('admin.products.index') }}"
                    class="text-sm text-blue-600 hover:text-blue-800 font-medium">Inventario &rarr;</a>
            </div>

            <div class="p-5">
                @if($lowStockProducts->count() > 0)
                <ul class="divide-y divide-gray-200">
                    @foreach($lowStockProducts as $product)
                    <li class="py-3 flex justify-between items-center">
                        <div>
                            <p class="text-sm font-medium text-gray-900 truncate max-w-[180px]">{{ $product->name }}</p>
                            <p class="text-xs text-gray-500">ID: {{ $product->id }}</p>
                        </div>
                        <div class="text-right">
                            <span
                                class="inline-flex items-center px-2 py-1 rounded text-xs font-bold {{ $product->stock == 0 ? 'bg-red-100 text-red-800' : 'bg-orange-100 text-orange-800' }}">
                                {{ $product->stock }} en stock
                            </span>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @else
                <div class="text-center py-6">
                    <svg class="mx-auto h-12 w-12 text-green-400 mb-3" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-sm text-gray-500">¡Todo en orden!<br>No hay productos con stock bajo.</p>
                </div>
                @endif
            </div>
        </div>

    </div>

    @endsection
</x-layouts.admin>