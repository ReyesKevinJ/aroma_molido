<x-layouts.app>
    @section('title', 'Mis Pedidos')

    @section('content')
    <section class="min-h-screen p-5 md:p-0 max-w-screen-lg m-auto my-10">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mis Pedidos
            </h2>
        </x-slot>
        @if (session('success'))
        <div id="success-alert" class="p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-soft" role="alert">
            <span class="font-medium">¡Pedido Exitoso!</span> Estamos preparando tu pedido.
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                if (typeof window.vaciarCarritoCompletamente === 'function') {
                    window.vaciarCarritoCompletamente();
                }
                setTimeout(() => {
                    const alert = document.getElementById('success-alert');
                    if (alert) {
                        // 1. Bajamos la opacidad a 0 para que haga el efecto de desvanecimiento
                        alert.style.opacity = '0';

                        // 2. Lo eliminamos completamente del HTML después de 500ms (lo que dura la transición)
                        setTimeout(() => alert.remove(), 500);
                    }
                }, 4000); // 4000 milisegundos = 4 segundos
            });
        </script>
        @endif

        <div class=" py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        @if($pedidos->isEmpty())
                        <p class="text-gray-500">Aún no tenés pedidos registrados.</p>
                        @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">ID del Pedido</th>
                                        <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Fecha</th>
                                        <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Total</th>
                                        <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pedidos as $pedido)
                                    <tr>
                                        <td class="py-4 px-6 text-sm text-gray-900">#{{ $pedido->id }}</td>
                                        <td class="py-4 px-6 text-sm text-gray-500">{{ $pedido->created_at->format('d/m/Y') }}</td>
                                        <td class="py-4 px-6 text-sm text-gray-900">${{ number_format($pedido->total, 2) }}</td>
                                        <td class="py-4 px-6 text-sm">
                                            <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                                {{ $pedido->status }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-6 text-sm">
                                            <a href="{{ route('user.my-orders.show', $pedido->id) }}" class="text-blue-500 hover:text-blue-700 font-semibold">
                                                Ver Detalle
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="py-6 px-6 text-sm text-gray-500 text-center">
                                            Aún no tenés ningún pedido registrado.
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
</x-layouts.app>
