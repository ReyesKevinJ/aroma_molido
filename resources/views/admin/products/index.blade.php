<x-layouts.admin>
    @section('title', ' Productos')
    @section('content')
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold mb-4">Productos</h1>
        <a href="{{ route('admin.products.create') }}"
            class="flex bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 transition-colors">
            Cargar Producto
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 font-bold ml-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </a>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200 mb-6">
        <form action="{{ route('admin.products.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">

            <div class="flex-1">
                <label for="search" class="sr-only">Buscar producto</label>
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
                        placeholder="Buscar por nombre o descripción...">
                </div>
            </div>

            <div class="md:w-64">
                <select name="category_id" id="category_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer">
                    <option value="">Todas las categorías</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-2">
                <button type="submit"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 transition-colors">
                    Filtrar
                </button>

                @if(request('search') || request('category_id'))
                <a href="{{ route('admin.products.index') }}"
                    class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 transition-colors">
                    Limpiar
                </a>
                @endif
            </div>
        </form>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($products as $product)
        <div class="bg-white rounded-lg shadow-md">
            <img class="rounded-t-lg  w-full h-auto object-cover" src="/storage/{{$product->images()->first()->url}}"
                alt="">
            <div class="p-4">
                <h2 class="text-xl font-bold mb-2">{{ $product['name'] }}</h2>
                <p class="text-gray-600 mb-2">Precio: ${{ number_format($product['price'], 2) }}</p>
                <p class="text-gray-600 mb-2">Stock: {{ $product['stock'] }}</p>
                <p class="text-gray-600 mb-2">Disponible: {{ $product['is_available'] ? 'Sí' : 'No' }}</p>
                <p class="text-gray-700 mb-4">{{ $product['description'] }}</p>
                <div class="flex justify-end space-x-2">
                    <a href="{{ route('admin.products.edit', $product['id']) }}"
                        class="text-blue-500 hover:text-blue-700">Editar</a>
                    <form action="{{ route('admin.products.destroy', $product['id']) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700"
                            onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        {{$products->links()}}

    </div>
    @endsection
</x-layouts.admin>