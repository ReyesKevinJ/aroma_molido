<x-layouts.app>
    @section('title','- Nosotros')
    @section('content')
    <section class="h-screen max-w-screen-lg m-auto my-10">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-4xl font-bold mb-4">Sobre Nosotros</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-6">

                <p class="text-lg text-gray-600">En Aroma Molido, nos apasiona el café de calidad y la experiencia que
                    ofrece. Fundada en 2020, nuestra misión es llevar el mejor café a tu hogar, ofreciendo una selección
                    cuidadosamente curada de granos de todo el mundo. Creemos en la sostenibilidad y trabajamos
                    directamente
                    con agricultores para garantizar prácticas justas y responsables. Únete a nosotros en este viaje
                    aromático y descubre el verdadero sabor del café.</p>

                <picture class="justify-end flex">
                    <img class="h-120 rounded-lg" src="{{asset('images/nosotros.avif')}}" alt="Imagen de Nosotros">
                </picture>
            </div>
        </div>
    </section>
    @endsection
</x-layouts.app>