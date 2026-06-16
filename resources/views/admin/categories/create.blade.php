<x-layouts.admin>
    @section('title', 'Cargar Categoría')
    @section('content')

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Cargar Nueva Categoría</h1>
        <a href="{{ route('admin.categories.index') }}"
            class="text-gray-600 hover:text-blue-600 flex items-center font-medium transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
            </svg>
            Volver al listado
        </a>
    </div>

    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
        <div class="font-medium text-red-600 mb-2">¡Ups! Algo salió mal.</div>
        <ul class="list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="max-w-3xl bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nombre de la Categoría</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Ej. Cafés Tostados" required />
            </div>

            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="description" name="description" rows="4"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Breve descripción de los productos que incluye esta categoría..."
                    required>{{ old('description') }}</textarea>
            </div>

            <button type="submit"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full transition-colors">
                Guardar Categoría
            </button>
        </form>
    </div>
    @endsection
</x-layouts.admin>