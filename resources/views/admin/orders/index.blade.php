<x-layouts.admin>
    @section('title', 'Pedidos')
    @section('content')

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Órdenes</h1>
    </div>

    <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-200 mb-6">
        <form action="{{ route('admin.orders.index') }}" method="GET">

            <div class="mb-4">
                <label for="search" class="sr-only">Buscar orden</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="search" name="search" value="{{ request('search') }}"
                        class="block w-full p-2.5 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-50"
                        placeholder="Buscar por # de Orden, Nombre o Email del cliente...">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-4">

                <div>
                    <label for="user_id" class="block mb-2 text-xs font-medium text-gray-700">Cliente</label>
                    <select name="user_id" id="user_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Todos los clientes</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="status" class="block mb-2 text-xs font-medium text-gray-700">Estado</label>
                    <select name="status" id="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Cualquier estado</option>
                        <option value="pending" {{ request('status') == 'pendiente' ? 'selected' : '' }}>Pendiente
                        </option>
                        <option value="processing" {{ request('status') == 'procesando' ? 'selected' : '' }}>En Proceso
                        </option>
                        <option value="completed" {{ request('status') == 'completado' ? 'selected' : '' }}>Completado
                        </option>
                        <option value="cancelled" {{ request('status') == 'cancelado' ? 'selected' : '' }}>Cancelado
                        </option>
                    </select>
                </div>

                <div>
                    <label for="payment_method" class="block mb-2 text-xs font-medium text-gray-700">Método de
                        Pago</label>
                    <select name="payment_method" id="payment_method"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Todos</option>
                        <option value="credit_card" {{ request('payment_method') == 'tarjeta' ? 'selected' : '' }}>
                            Tarjeta de Crédito</option>
                        <option value="bank_transfer"
                            {{ request('payment_method') == 'transferencia' ? 'selected' : '' }}>Transferencia</option>
                        <option value="cash" {{ request('payment_method') == 'efectivo' ? 'selected' : '' }}>Efectivo
                        </option>
                    </select>
                </div>

                <div>
                    <label for="date" class="block mb-2 text-xs font-medium text-gray-700">Fecha de Orden</label>
                    <input type="date" name="date" id="date" value="{{ request('date') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>

                <div>
                    <label for="shipped_at" class="block mb-2 text-xs font-medium text-gray-700">Fecha de Envío</label>
                    <input type="date" name="shipped_at" id="shipped_at" value="{{ request('shipped_at') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit"
                    class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 transition-colors">
                    Aplicar Filtros
                </button>

                @if(request()->anyFilled(['search', 'user_id', 'status', 'payment_method', 'date', 'shipped_at']))
                <a href="{{ route('admin.orders.index') }}"
                    class="text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 transition-colors">
                    Limpiar
                </a>
                @endif
            </div>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3"># Orden</th>
                        <th scope="col" class="px-6 py-3">Cliente</th>
                        <th scope="col" class="px-6 py-3">Fecha</th>
                        <th scope="col" class="px-6 py-3">Pago</th>
                        <th scope="col" class="px-6 py-3">Estado</th>
                        <th scope="col" class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->user->name ?? 'Usuario Eliminado' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-6 py-4 capitalize">
                            {{ str_replace('_', ' ', $order->payment_method) }}
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="px-2.5 py-1 text-xs font-medium rounded-full
                                {{ $order->status == 'completado' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $order->status == 'pendiente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $order->status == 'cancelado' ? 'bg-red-100 text-red-800' : '' }}
                                {{ !in_array($order->status, ['completado', 'pendiente', 'cancelado']) ? 'bg-blue-100 text-blue-800' : '' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('admin.orders.edit', $order->id)}}"
                                class="text-blue-600 hover:text-blue-900 font-medium">Ver / Editar</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            No se encontraron órdenes con los filtros aplicados.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($orders->hasPages())
        <div class="p-4 border-t border-gray-200">
            {{ $orders->links() }}
        </div>
        @endif
    </div>

    @endsection
</x-layouts.admin>