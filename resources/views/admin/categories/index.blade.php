<x-layouts.admin>
    @section('title', 'Categorías')
    @section('content')

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Categorías</h1>
        <a href="{{ route('admin.categories.create') }}"
            class="flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
            Crear Categoría
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5 ml-2 font-bold">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </a>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200 mb-6">
        <form action="{{ route('admin.categories.index') }}" method="GET" class="flex gap-4">
            <div class="flex-1">
                <label for="search" class="sr-only">Buscar categoría</label>
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
                        placeholder="Buscar por nombre...">
                </div>
            </div>
            <button type="submit"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 transition-colors">
                Buscar
            </button>
            @if(request('search'))
            <a href="{{ route('admin.categories.index') }}"
                class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 transition-colors">
                Limpiar
            </a>
            @endif
        </form>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-16">ID</th>
                        <th scope="col" class="px-6 py-3 w-1/4">Nombre</th>
                        <th scope="col" class="px-6 py-3">Descripción</th>
                        <th scope="col" class="px-6 py-3 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $category->id }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $category->name }}</td>
                        <td class="px-6 py-4 truncate max-w-xs">{{ $category->description }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.categories.edit', ['categoria' => $category->id]) }}"
                                class="font-medium text-blue-600 hover:text-blue-900">Editar</a>

                            @if($category->trashed())
                            <form action="{{ route('admin.categories.restore', $category['id']) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-green-500 hover:text-green-700">Restaurar</button>
                            </form>
                            @else

                            <form action="{{ route('admin.categories.destroy', ['categoria' => $category->id]) }}"
                                method="POST" class="inline-block"
                                onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="font-medium text-red-600 hover:text-red-900">Eliminar</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                            No se encontraron categorías.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($categories->hasPages())
        <div class="p-4 border-t border-gray-200">
            {{ $categories->links() }}
        </div>
        @endif
    </div>
    @endsection
</x-layouts.admin>
