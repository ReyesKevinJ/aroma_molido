<x-layouts.admin>
    @section('title', ' Productos')
    @section('content')
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold mb-4">Productos</h1>
        <a href="{{ route('admin.products.create') }}"
            class="flex bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 ">
            Cargar Producto
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 font-bold">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>

        </a>
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

    </div>
    @endsection
</x-layouts.admin>