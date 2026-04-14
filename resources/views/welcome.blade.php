<x-layouts.app>
    @section('content')
    <section class="bg-neutral-primary-soft">
        <div class="w-full flex flex-col items-center justify-center my-auto relative h-[80vh]">
            <picture class="w-full absolute inset-0">
                <!-- <source srcset="{{ asset('images/banner_hero.webp') }}" type="image/webp"> -->
                <img class="img-covert w-full h-full" src="{{ asset('images/banner_hero_2.jpeg') }}"
                    alt="AROMA MOLIDO Logo">
            </picture>
            <div class="relative z-10 text-center">
                <h1 class="mb-4 text-4xl tracking-tight font-extrabold text-fg-brand-subtle  md:text-5xl lg:text-6xl">
                    Bienvenido a
                    <span class="text-white crimson-pro">Aroma Molido</span>
                </h1>
                <p class="mb-6 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48">Descubre el mundo rico y
                    aromático del café con nosotros. Desde las mejores granos hasta las técnicas expertas de
                    preparación, te ofrecemos la experiencia de café definitiva.</p>
                <a href="{{ route('products') }}"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white rounded-lg bg-brand hover:bg-brand-dark focus:ring-4 focus:ring-primary-light animate-[bounce_2s_infinite]">
                    Comenzar
                    <svg class="w-5 h-5 ms-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <x-products />
    @endsection
</x-layouts.app>