<x-layouts.app>
    @section('title',' - Consultas')
    @section('content')
    <section class="max-w-screen-lg m-auto h-screen py-8">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-4xl font-bold mb-4">Preguntas Frecuentes</h1>
            <p class="text-lg text-gray-600">Aquí encontrarás respuestas a las preguntas más comunes sobre nuestros productos y servicios.</p>
        </div>
        <div id="accordion-arrow" data-accordion="collapse" data-active-classes="bg-neutral-primary text-heading" data-inactive-classes="text-body">

            <h2 id="accordion-arrow-heading-1">
                <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-body border-b border-default gap-3" data-accordion-target="#accordion-arrow-body-1" aria-expanded="false" aria-controls="accordion-arrow-body-1">
                    <span>¿Cuentan con envio a todo el pais?</span>
                    <svg class="w-5 h-5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-arrow-body-1" class="hidden" aria-labelledby="accordion-arrow-heading-1">
                <div class="py-5 border-b border-default text-body">
                    <p class="mb-2">
                        Sí, realizamos envíos a todo el país a través de diferentes servicios de mensajería. El costo y el tiempo de entrega pueden variar según la ubicación, pero nos aseguramos de que tu pedido llegue de manera segura y puntual.
                    </p>
                </div>
            </div>
            <h2 id="accordion-arrow-heading-2">
                <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-body border-b border-default gap-3" data-accordion-target="#accordion-arrow-body-2" aria-expanded="false" aria-controls="accordion-arrow-body-2">
                    <span>¿Tienen devoluciones?</span>
                    <svg class="w-5 h-5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-arrow-body-2" class="hidden" aria-labelledby="accordion-arrow-heading-2">
                <div class="py-5 border-b border-default text-body">
                    <p class="mb-2">
                        Sí, ofrecemos una política de devoluciones para garantizar tu satisfacción. Si no estás completamente satisfecho con tu compra, puedes solicitar una devolución dentro de un plazo determinado. Por favor, revisa nuestra política de devoluciones para más detalles sobre el proceso y los requisitos.
                    </p>
                </div>
            </div>
            <!-- <h2 id="accordion-arrow-heading-3">
                <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-body border-b border-default gap-3" data-accordion-target="#accordion-arrow-body-3" aria-expanded="false" aria-controls="accordion-arrow-body-3">
                    <span>Accordion with another icon</span>
                    <svg class="w-5 h-5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-arrow-body-3" class="hidden" aria-labelledby="accordion-arrow-heading-3">
                <div class="py-5 border-b border-default text-body">
                    <p class="mb-2">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
                    <p>Check out the <a href="https://flowbite.com/figma/" class="text-fg-brand hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
                </div>
            </div> -->

        </div>
    </section>
    @endsection
</x-layouts.app>
