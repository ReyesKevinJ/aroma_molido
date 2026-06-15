<x-layouts.admin>
    @section('title', 'Bandeja de Entrada')
    @section('content')

    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Mensajes y Consultas</h1>
    </div>

    <div class="border-b border-gray-200 mb-6">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500">
            <li class="mr-2">
                <a href="{{ route('admin.inbox.index', ['type' => 'registered']) }}"
                    class="inline-flex p-4 border-b-2 rounded-t-lg group {{ $type === 'registered' ? 'text-blue-600 border-blue-600 active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">
                    Usuarios Registrados
                </a>
            </li>
            <li class="mr-2">
                <a href="{{ route('admin.inbox.index', ['type' => 'guest']) }}"
                    class="inline-flex p-4 border-b-2 rounded-t-lg group {{ $type === 'guest' ? 'text-blue-600 border-blue-600 active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">
                    Invitados (No Registrados)
                </a>
            </li>
        </ul>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200 mb-6">
        <form action="{{ route('admin.inbox.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <input type="hidden" name="type" value="{{ $type }}">

            <div class="flex-1">
                <label for="search" class="sr-only">Buscar</label>
                <input type="text" id="search" name="search" value="{{ request('search') }}"
                    class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-50"
                    placeholder="Buscar por nombre, email o mensaje...">
            </div>

            <div class="md:w-36">
                <select name="status" id="status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer">
                    <option value="">Todos</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>No Leídos</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Leídos</option>
                </select>
            </div>

            <div class="md:w-40">
                <input type="date" name="date" id="date" value="{{ request('date') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <div class="flex gap-2">
                <button type="submit"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 transition-colors">
                    Filtrar
                </button>
                @if(request()->anyFilled(['search', 'date']) || (request()->has('status') && request()->status !==
                null))
                <a href="{{ route('admin.inbox.index', ['type' => $type]) }}"
                    class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 transition-colors">
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
                        <th scope="col" class="px-6 py-3 w-16">ID</th>
                        <th scope="col" class="px-6 py-3">Remitente</th>
                        <th scope="col" class="px-6 py-3">Extracto del Mensaje</th>
                        <th scope="col" class="px-6 py-3">Fecha</th>
                        <th scope="col" class="px-6 py-3 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                    <tr class="border-b hover:bg-gray-50 {{ !$msg->status ? 'bg-blue-50/30' : 'bg-white' }}">

                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $msg->id }}
                        </td>

                        <td class="px-6 py-4">
                            @if(!$msg->status)
                            <span
                                class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-blue-100 text-blue-800 mb-1 uppercase tracking-wider">
                                Nuevo
                            </span>
                            <br>
                            @endif

                            @if($type === 'registered')
                            <div class="font-medium text-gray-900">{{ $msg->user->name ?? 'Usuario Eliminado' }}</div>
                            <div class="text-xs text-blue-600">Registrado</div>
                            @else
                            <div class="font-medium text-gray-900">{{ $msg->name }}</div>
                            <div class="text-xs text-gray-500">Invitado</div>
                            @endif
                        </td>

                        <td class="px-6 py-4 truncate max-w-xs {{ !$msg->status ? 'font-medium text-gray-900' : '' }}">
                            {{ Str::limit($msg->message, 50) }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $msg->created_at->format('d/m/Y H:i') }}
                        </td>

                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.inbox.show', ['mensaje' => $msg->id, 'type' => $type]) }}"
                                class="font-medium text-blue-600 hover:text-blue-900">
                                Leer Completo
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            No hay mensajes en esta sección.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($messages->hasPages())
        <div class="p-4 border-t border-gray-200">
            {{ $messages->links() }}
        </div>
        @endif
    </div>
    @endsection
</x-layouts.admin>
