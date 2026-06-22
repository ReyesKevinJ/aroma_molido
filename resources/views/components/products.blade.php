<section class="min-h-screen p-5 md:p-0 max-w-screen-lg m-auto my-10">
    <div class="grid grid-rows-2 place-content-center">
        <h2>
            <span
                class="text-3xl flex justify-center font-extrabold tracking-tight text-heading sm:text-4xl crimson-pro">Nuestros
                Productos</span>
        </h2>
        <h3>
            <span class="my-3 text-lg text-body">Explore nuestro catalogo de productos de cafe premium, Elaborado a la
                perfección para
                la mejor experiencia cafetera.</span>
        </h3>
    </div>
    <div
        class="mx-auto max-w-screen-lg 2xl:max-w-screen-2xl bg-white p-4 rounded-lg shadow-sm border border-gray-200 mb-6">
        <form action="{{ route('products') }}" method="GET" class="flex flex-col md:flex-row gap-4">

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
    <div
        class="mx-auto max-w-screen-lg 2xl:max-w-screen-2xl grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-6 lg:gap-10 mt-10">
        @foreach ($products as $product )
        <x-product-card :product="$product" />
        @endforeach
    </div>
    </div>
</section>