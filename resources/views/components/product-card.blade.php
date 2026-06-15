<div>
    <div
        class="bg-white border border-default-medium rounded-base shadow-md hover:shadow-lg hover:scale-105 transition duration-300 relative">
        <span class="absolute top-3 right-3 bg-brand px-2 rounded-full text-white text-sm">${{$price}}</span>
        <img class="rounded-t-base" src="{{ $image }}" alt="{{ $name }} image">
        <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-heading">{{ $name }}</h5>
            <p class="mb-3 font-normal text-body">{{ $description }}</p>
            <div class="flex gap-2">
                <button data-modal-target="default-modal-{{$id}}" data-modal-toggle="default-modal-{{$id}}"
                    class="hover:bg-brand-soft border-1 transition duration-700 hover:border-0 rounded-xl w-full py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178a1.012 1.012 0 010 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178zM15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    ver mas
                </button>

                <button onclick='agregarAlCarrito(
                        @json($id),
                        @json($name),
                        @json($price),
                        @json($image)
                    )' class="bg-brand-soft rounded-xl px-4 py-2">
                    Comprar
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Main modal -->
<div id="default-modal-{{$id}}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                <h3 class="text-lg font-medium text-heading">
                    {{ $name }}
                </h3>
                <button type="button"
                    class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="default-modal-{{$id}}">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="space-y-4 md:space-y-6 py-4 md:py-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <img class="rounded-lg h-75 w-auto object-cover" src="{{$image}}" alt="">
                <div>
                    <h3 class="text-2xl font-bold text-heading mb-2">${{$price}}</h3>
                    <p class="text-body">{{ $description }}</p>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center border-t border-default space-x-4 pt-4 md:pt-5">
                <button onclick='agregarAlCarrito(
                        @json($id),
                        @json($name),
                        @json($price),
                        @json($image)
                    )' class="bg-brand-soft rounded-xl px-4 py-2">
                    Comprar
                </button>

                <button data-modal-hide="default-modal-{{$id}}" type="button"
                    class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Seguir
                    Viendo</button>
            </div>
        </div>
    </div>
</div>