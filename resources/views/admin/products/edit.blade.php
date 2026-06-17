<x-layouts.admin>
    @section('title', 'Editar Producto')
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

    <div class="w-full bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex justify-between">
                <h5 class="text-xl font-semibold text-heading mb-6">Editar Producto: {{ $product->name }}</h5>
                <a href="{{ route('admin.products.index') }}"
                    class="text-gray-600 hover:text-blue-600 flex items-center font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                    </svg>
                    Volver al listado
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                        placeholder="Nombre del producto" required />
                </div>

                <div class="mb-4">
                    <label for="category_id" class="block mb-2.5 text-sm font-medium text-heading">Seleccionar
                        Categoria</label>
                    <select name="category_id" id="category_id"
                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                        <option value="">Seleccionar categoría </option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="price" class="block mb-2.5 text-sm font-medium text-heading">Precio</label>
                    <input type="number" min="1.00" step="0.01" name="price" id="price"
                        value="{{ old('price', $product->price) }}"
                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                        placeholder="Precio del producto" required />
                </div>

                <div>
                    <label for="stock" class="block mb-2.5 text-sm font-medium text-heading">Stock</label>
                    <input type="number" min="0" name="stock" id="stock" value="{{ old('stock', $product->stock) }}"
                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                        placeholder="Stock del producto" required />
                </div>

                <div class="mb-4">
                    <label for="weight_id" class="block mb-2.5 text-sm font-medium text-heading">Seleccionar
                        Peso</label>
                    <select name="weight_id" id="weight_id"
                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                        <option value="">Seleccionar peso </option>
                        @foreach($weights as $weight)
                        <option value="{{ $weight->id }}"
                            {{ old('weight_id', $product->weight_id) == $weight->id ? 'selected' : '' }}>
                            {{ $weight->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="flex-col items-center cursor-pointer">
                        <p class="block mb-2.5 text-sm font-medium text-heading">Producto Activo</p>
                        <input type="hidden" name="is_available" value="0">
                        <input type="checkbox" name="is_available" value="1" class="sr-only peer"
                            {{ old('is_available', $product->is_available) ? 'checked' : '' }}>
                        <div
                            class="relative w-9 h-5 bg-neutral-quaternary peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-soft dark:peer-focus:ring-brand-soft rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-buffer after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-brand">
                        </div>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label for="description" class="block mb-2.5 text-sm font-medium text-heading">Descripción</label>
                <textarea id="description" name="description" rows="4"
                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                    required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">

                @if($product->images->count() > 0)
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Imágenes Actuales</h2>
                    <p class="text-sm text-gray-500 mb-4">Haz clic en la 'X' de las imágenes que desees eliminar de tu
                        catálogo.</p>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4" id="existing-images-container">
                        @foreach($product->images as $image)
                        <div
                            class="relative group rounded-lg overflow-hidden border border-gray-200 shadow-sm aspect-square bg-gray-100 existing-image-item">
                            <img src="{{ Storage::url($image->url) }}" class="w-full h-full object-cover"
                                alt="Imagen del producto">

                            <div
                                class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center">
                                <button type="button"
                                    class="delete-existing-btn bg-red-500 text-white p-2 rounded-full hover:bg-red-600 transition-colors"
                                    data-id="{{ $image->id }}">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div id="deleted-images-inputs"></div>
                </div>
                <hr class="mb-8 border-gray-200">
                @endif

                <h2 class="text-xl font-semibold text-gray-800 mb-4">Añadir Nuevas Imágenes</h2>
                <div id="dropzone"
                    class="relative w-full p-8 border-2 border-dashed border-gray-300 rounded-xl text-center cursor-pointer transition-colors duration-200 ease-in-out hover:border-blue-500 hover:bg-blue-50 bg-gray-50">
                    <div class="space-y-2">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                            viewBox="0 0 48 48" aria-hidden="true">
                            <path
                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="text-sm text-gray-600">
                            <span class="font-medium text-blue-600 hover:text-blue-500">Selecciona imágenes</span> o
                            arrástralas aquí
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG o WEBP (opcional)</p>
                    </div>
                    <input id="file-input" type="file" name="images[]"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" multiple accept="image/*">
                </div>

                <div id="preview-container" class="mt-6 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                </div>
            </div>

            <button type="submit"
                class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none w-full mb-3 mt-6">
                Actualizar Producto
            </button>
        </form>

        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dropzone = document.getElementById('dropzone');
            const fileInput = document.getElementById('file-input');
            const previewContainer = document.getElementById('preview-container');

            // --- LÓGICA PARA IMÁGENES EXISTENTES ---
            const existingContainer = document.getElementById('existing-images-container');
            const deletedInputsContainer = document.getElementById('deleted-images-inputs');

            if (existingContainer) {
                existingContainer.addEventListener('click', (e) => {
                    // Buscamos si se hizo clic en el botón de eliminar de una imagen existente
                    const deleteBtn = e.target.closest('.delete-existing-btn');

                    if (deleteBtn) {
                        const imageId = deleteBtn.dataset.id;
                        const imageCard = deleteBtn.closest('.existing-image-item');

                        // 1. Ocultamos la imagen visualmente para dar feedback inmediato
                        imageCard.style.display = 'none';

                        // 2. Creamos un input oculto con el ID de esta imagen
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = 'deleted_images[]';
                        hiddenInput.value = imageId;

                        // 3. Lo inyectamos en el formulario para que viaje al hacer submit
                        deletedInputsContainer.appendChild(hiddenInput);
                    }
                });
            }

            let uploadedFiles = [];

            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropzone.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                dropzone.addEventListener(eventName, () => {
                    dropzone.classList.add('border-blue-500', 'bg-blue-50');
                    dropzone.classList.remove('border-gray-300', 'bg-gray-50');
                }, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropzone.addEventListener(eventName, () => {
                    dropzone.classList.remove('border-blue-500', 'bg-blue-50');
                    dropzone.classList.add('border-gray-300', 'bg-gray-50');
                }, false);
            });

            dropzone.addEventListener('drop', (e) => {
                const dt = e.dataTransfer;
                const files = dt.files;
                handleFiles(files);
            });

            fileInput.addEventListener('change', function() {
                handleFiles(this.files);
            });

            function handleFiles(files) {
                const newFiles = Array.from(files).filter(file => file.type.startsWith('image/'));

                newFiles.forEach(file => {
                    uploadedFiles.push(file);
                    previewFile(file);
                });

                syncInputFiles();
            }

            function syncInputFiles() {
                const dataTransfer = new DataTransfer();
                uploadedFiles.forEach(file => {
                    dataTransfer.items.add(file);
                });
                fileInput.files = dataTransfer.files;
            }

            function previewFile(file) {
                const reader = new FileReader();

                reader.readAsDataURL(file);
                reader.onloadend = function() {
                    const div = document.createElement('div');
                    div.className =
                        'relative group rounded-lg overflow-hidden border border-gray-200 shadow-sm aspect-square bg-gray-100';

                    div.innerHTML = `
                    <img src="${reader.result}" class="w-full h-full object-cover" alt="Preview">
                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center">
                        <button type="button" class="delete-btn bg-red-500 text-white p-2 rounded-full hover:bg-red-600 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                `;

                    const deleteBtn = div.querySelector('.delete-btn');
                    deleteBtn.addEventListener('click', () => {
                        div.remove();
                        uploadedFiles = uploadedFiles.filter(f => f !== file);
                        syncInputFiles();
                    });

                    previewContainer.appendChild(div);
                }
            }
        });
        </script>
    </div>
    @endsection
</x-layouts.admin>
