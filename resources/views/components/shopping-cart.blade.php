<div id="default-modal-cart" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0  z-50 justify-center items-center transition duration-5000 w-2/5">
    <div class="relative  w-full h-screen">
        <!-- Modal content -->
        <div
            class="relative flex flex-col min-h-screen bg-neutral-primary-soft border border-default rounded-l-base shadow-sm p-4 md:p-6">
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                <h3 class="text-lg font-medium text-heading">
                </h3>
                <button type="button"
                    class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="default-modal-cart">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class=" flex-grow space-y-4 md:space-y-6 py-4 md:py-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                
            </div>
            <div class="max-w-md mx-auto my-12 p-8 bg-stone-50 border-2 border-dashed border-stone-200 rounded-[2.5rem] text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-amber-100 text-amber-600 rounded-full mb-6 animate-bounce">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>

                <h2 class="text-2xl font-bold text-stone-800 mb-2">Carrito en preparación</h2>
                <p class="text-stone-600 mb-6 italic">
                    Estamos ajustando nuestra molienda digital. Muy pronto podrás pedir tus granos y blends favoritos directamente desde aquí.
                </p>

                <div class="w-full bg-stone-200 rounded-full h-1.5 mb-4">
                    <div class="bg-amber-600 h-1.5 rounded-full" style="width: 75%"></div>
                </div>
                <span class="text-xs font-medium text-stone-400 uppercase tracking-widest">Fase de Producción: 75%</span>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center border-t border-default space-x-4 pt-4 md:pt-5">
                <button data-modal-hide="default-modal-cart" type="button"
                    class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Comprar</button>
                <button data-modal-hide="default-modal-cart" type="button"
                    class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Seguir
                    Viendo</button>
            </div>
        </div>
    </div>
</div>
