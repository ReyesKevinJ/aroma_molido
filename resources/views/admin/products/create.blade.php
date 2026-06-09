<x-layouts.admin>
    @section('title', ' Cargar Producto')
    @section('content')
    @if ($errors->any())
    <div class="mb-4">
        <div class="font-medium text-red-600">¡Ups! Algo salió mal.</div>
        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="w-full  bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <h5 class="text-xl font-semibold text-heading mb-6">Cargar Nuevo Producto</h5>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Nombre</label>
                    <input type="text" name="name" id="name" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Nombre del producto" required />
                </div>
                <div class="mb-4">
                    <label for="category_id" class="block mb-2.5 text-sm font-medium text-heading">Seleccionar Categoria</label>
                    <select name="category_id" id="category_id" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                        <option value="">Seleccionar categoría </option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="price" class="block mb-2.5 text-sm font-medium text-heading">Precio</label>
                    <input type="number" min="1" name="price" id="price" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Precio del producto" required />
                </div>
                <div>
                    <label for="stock" class="block mb-2.5 text-sm font-medium text-heading">Stock</label>
                    <input type="number" min="0" name="stock" id="stock" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Stock del producto" required />
                </div>
                <div class="mb-4">
                    <label for="weight_id" class="block mb-2.5 text-sm font-medium text-heading">Seleccionar Peso</label>
                    <select name="weight_id" id="weight_id" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                        <option value="">Seleccionar peso </option>
                        @foreach($weights as $weight)
                        <option value="{{ $weight->id }}">{{ $weight->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="flex-col items-center cursor-pointer">
                        <p class="block mb-2.5 text-sm font-medium text-heading">Producto Activo</p>
                        <input type="checkbox" name="is_available" value="" class="sr-only peer">
                        <div class="relative w-9 h-5 bg-neutral-quaternary peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-soft dark:peer-focus:ring-brand-soft rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-buffer after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-brand"></div>
                    </label>
                </div>
            </div>
            <div class="mb-4">
                <label for="description" class="block mb-2.5 text-sm font-medium text-heading">Descripción</label>
                <textarea id="description" name="description" rows="4"
                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                    required></textarea>
            </div>

            <button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none w-full mb-3">Guardar</button>
        </form>
    </div>
    @endsection
</x-layouts.admin>
