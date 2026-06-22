<div>
    <div
        class="bg-white border border-default-medium rounded-base shadow-md hover:shadow-lg hover:scale-105 transition duration-300 relative h-full flex flex-col">

        @if ($product->stock < 1)
            <span class="absolute top-3 left-0 bg-red-500 px-2 rounded-full text-white text-sm">
            Sin Stock
            </span>
            @endif

            <span
                class="absolute top-3 right-3 bg-brand px-2 rounded-full text-white text-sm">
                {{$product->category->name}}
            </span>

            <img
                class="rounded-t-base h-64 w-full object-cover"
                src="/storage/{{ $product->images()->first()->url }}"
                alt="{{ $product->name }} image">

            <div class="p-5 flex flex-col flex-1">

                <div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-heading min-h-[64px]">
                        {{ $product->name }}
                    </h5>

                    <p class="mb-2 text-lg font-semibold text-heading">
                        ${{ $product->price }}
                    </p>

                    <p class="mb-3 font-normal text-body min-h-[72px]">
                        {{ $product->description }}
                    </p>
                </div>

                <div class="flex flex-col gap-2 mt-auto">

                    <button
                        data-modal-target="default-modal-{{$product->id}}"
                        data-modal-toggle="default-modal-{{$product->id}}"
                        class="border border-gray-300 hover:bg-brand-soft transition duration-300 rounded-xl w-full py-2">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6 inline-block">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178a1.012 1.012 0 010 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178zM15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>

                        ver mas
                    </button>

                    @guest
                    <button
                        data-modal-target="popup-modal-{{$product->id}}"
                        data-modal-toggle="popup-modal-{{$product->id}}"
                        class="flex items-center justify-center gap-2 text-white bg-brand hover:bg-brand-strong rounded-xl w-full py-2 transition duration-300"
                        type="button">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-5 h-5">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.25 3h1.386a1.5 1.5 0 011.455 1.132L5.836 7.5m0 0H18.75m-12.914 0L7.5 15.75A1.5 1.5 0 008.955 17h7.59a1.5 1.5 0 001.455-1.25L19.5 6H6.621m0 0L5.091 4.132A1.5 1.5 0 003.636 3H2.25m6.75 18a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25zm7.5 0a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z" />
                        </svg>

                        Agregar al carrito

                    </button>
                    @endguest


                    @auth
                    @if ($product->stock>1)

                    <button
                        onclick='agregarAlCarrito(
                        @json($product->id),
                        @json($product->name),
                        @json($product->price),
                        @json("/storage/" . $product->images()->first()->url)
                        )' class="bg-brand-soft rounded-xl px-4 py-2">
                        Comprar
                    </button>

                    @endif
                    @endauth
                </div>

            </div>
    </div>
</div>


<!-- Main modal -->
<div id="default-modal-{{$product->id}}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-3xl max-h-full">
        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">

            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                <h3 class="text-xl font-bold text-heading">
                    {{ $product->name }}
                </h3>
                <button type="button"
                    class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="default-modal-{{$product->id}}">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    <span class="sr-only">Cerrar modal</span>
                </button>
            </div>

            <div class="space-y-4 md:space-y-6 py-4 md:py-6 grid grid-cols-1 md:grid-cols-2 gap-6 items-start">

                <div class="flex flex-col gap-3">
                    <div class="w-full bg-white rounded-lg border border-gray-200 overflow-hidden">
                        <img id="main-img-{{$product->id}}" class="w-full object-cover aspect-square"
                            src="/storage/{{ $product->images->first()->url ?? 'default.png' }}"
                            alt="{{ $product->name }}">
                    </div>

                    @if($product->images->count() > 1)
                    <div class="flex gap-2 overflow-x-auto pb-1 scrollbar-hide">
                        @foreach($product->images as $image)
                        <button type="button"
                            class="flex-shrink-0 w-16 h-16 rounded-md overflow-hidden border-2 border-transparent hover:border-brand focus:outline-none focus:border-brand transition-colors"
                            onclick="document.getElementById('main-img-{{$product->id}}').src = '/storage/{{ $image->url }}'">
                            <img class="w-full h-full object-cover" src="/storage/{{ $image->url }}" alt="Miniatura">
                        </button>
                        @endforeach
                    </div>
                    @endif
                </div>

                <div class="flex flex-col h-full">
                    <h3 class="text-3xl font-black text-heading mb-4">${{ number_format($product->price, 2, ',', '.') }}
                    </h3>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span
                            class="inline-flex items-center bg-gray-100 text-gray-800 text-xs font-semibold px-2.5 py-1 rounded border border-gray-200">
                            Categoria: {{ $product->category->name ?? 'Sin categoría' }}
                        </span>

                        <span
                            class="inline-flex items-center bg-gray-100 text-gray-800 text-xs font-semibold px-2.5 py-1 rounded border border-gray-200">
                            Peso: {{ $product->weight->name ?? 'N/A' }}
                        </span>

                        @if($product->stock > 0)
                        <span
                            class="inline-flex items-center bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-1 rounded border border-green-200">
                            ✓ {{ $product->stock }} en stock
                        </span>
                        @else
                        <span
                            class="inline-flex items-center bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-1 rounded border border-red-200">
                            ✗ Agotado
                        </span>
                        @endif
                    </div>

                    <div class="prose prose-sm text-body mb-6">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center border-t border-default space-x-4 pt-4 md:pt-5">

                @guest
                <button data-modal-target="popup-modal-{{$product->id}}"
                    data-modal-toggle="popup-modal-{{$product->id}}"
                    class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-5 py-2.5 focus:outline-none transition-colors"
                    type="button">
                    Comprar
                </button>
                @endguest

                @auth
                @if ($product->stock > 0)
                <div class="flex items-center gap-3">

                    <div class="flex items-center border border-gray-300 rounded-lg bg-white h-10">
                        <button type="button" onclick="disminuirInput({{$product->id}})"
                            class="px-3 h-full text-gray-600 hover:bg-gray-100 rounded-l-lg transition-colors">-</button>

                        <input type="number" id="qty-{{$product->id}}" value="1" min="1" max="{{$product->stock}}"
                            class="w-12 h-full text-center border-0 p-0 focus:ring-0 text-sm bg-transparent pointer-events-none"
                            readonly>

                        <button type="button" onclick="aumentarInput({{$product->id}}, {{$product->stock}})"
                            class="px-3 h-full text-gray-600 hover:bg-gray-100 rounded-r-lg transition-colors">+</button>
                    </div>

                    <button onclick='agregarAlCarrito(
                                    @json($product->id),
                                    @json($product->name),
                                    @json($product->price),
                                    @json("/storage/".($product->images->first()->url ?? "")),
                                    @json($product->stock),
                                    document.getElementById("qty-{{$product->id}}").value
                                )'
                        class="text-white bg-brand hover:bg-brand-strong px-5 h-10 font-medium rounded-base text-sm transition-colors shadow-xs flex items-center">
                        Agregar al carrito
                    </button>

                </div>
                @endif
                @endauth

                <button data-modal-hide="default-modal-{{$product->id}}" type="button"
                    class="ml-auto text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-5 h-10 focus:outline-none transition-colors">
                    Seguir Viendo
                </button>
            </div>

        </div>
    </div>
</div>



<div id="popup-modal-{{$product->id}}" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
            <button type="button"
                class="absolute top-3 end-2.5 text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                data-modal-hide="popup-modal-{{$product->id}}">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18 17.94 6M18 18 6.06 6" />
                </svg>
                <span class="sr-only">Cerrar</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-fg-disabled w-12 h-12" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-6 text-body">Para Realizar una compra debe iniciar sesion, desea iniciar sesion?</h3>
                <div class="flex items-center space-x-4 justify-center">
                    <button data-modal-hide="popup-modal-{{$product->id}}" type="button"
                        class="text-white bg-success box-border border border-transparent hover:bg-success-strong focus:ring-4 focus:ring-success-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        Iniciar Sesion
                    </button>
                    <button data-modal-hide="popup-modal-{{$product->id}}" type="button"
                        class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">No,Seguir
                        Viendo</button>
                </div>
            </div>
        </div>
    </div>
</div>