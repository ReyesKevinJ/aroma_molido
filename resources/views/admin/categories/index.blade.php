<x-layouts.admin>
    @section('title','Categorías')
    @section('content')
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold mb-4">Categorías</h1>
        <a href="{{ route('admin.categories.create') }}"
            class="flex bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 ">
            Cargar Categoría
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 font-bold">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>

        </a>
    </div>
    <table class="min-w-full bg-white text-left">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Nombre</th>
                <th class="py-2 px-4 border-b">Descripción</th>
                <th class="py-2 px-4 border-b" colspan='2'>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td class="py-2 px-4 border-b">{{ $category['id'] }}</td>
                <td class="py-2 px-4 border-b">{{ $category['name'] }}</td>
                <td class="py-2 px-4 border-b">{{ $category['description'] }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('admin.categories.edit', $category['id']) }}"
                        class="text-blue-500 hover:text-blue-700">Editar</a>
                </td>
                <td class="py-2 px-4 border-b">
                    <form action="{{ route('admin.categories.destroy', $category['id']) }}" method="POST"
                        class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700"
                            onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</x-layouts.admin>