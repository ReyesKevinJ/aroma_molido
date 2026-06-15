<x-layouts.admin>
    @section('title', 'Usuarios')
    @section('content')

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Usuarios</h1>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200 mb-6">
        <form action="{{ route('admin.users.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">

            <div class="flex-1">
                <label for="search" class="sr-only">Buscar usuario</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="search" name="search" value="{{ request('search') }}"
                        class="block w-full p-2.5 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-50"
                        placeholder="Buscar por nombre o correo electrónico...">
                </div>
            </div>

            <div class="md:w-64">
                <select name="role" id="role"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer">
                    <option value="">Todos los roles</option>
                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                    <option value="customer" {{ request('role') == 'customer' ? 'selected' : '' }}>Cliente</option>
                </select>
            </div>

            <div class="flex gap-2">
                <button type="submit"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 transition-colors">
                    Filtrar
                </button>
                @if(request()->anyFilled(['search', 'role']))
                <a href="{{ route('admin.users.index') }}"
                    class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 transition-colors">
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
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Rol</th>
                        <th scope="col" class="px-6 py-3 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $user->id }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="px-2.5 py-1 text-xs font-medium rounded-full
                                {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $user->role === 'admin' ? 'Administrador' : 'Cliente' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.users.edit', ['usuario' => $user->id]) }}"
                                class="font-medium text-blue-600 hover:text-blue-900">Gestionar Rol</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            No se encontraron usuarios con esos filtros.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($users->hasPages())
        <div class="p-4 border-t border-gray-200">
            {{ $users->links() }}
        </div>
        @endif
    </div>
    @endsection
</x-layouts.admin>