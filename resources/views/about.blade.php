<x-layouts.app>
    @section('title','- Nosotros')
    @section('content')
    <section class="h-auto p-5 md:p-0 max-w-screen-lg m-auto my-10">
        <div class="flex flex-col ">
            <h1 class="text-4xl font-bold mb-4 crimson-pro">Nuestra Historia</h1>
            <div class="my-6">

                <picture class="h-48 w-96 object-cover ">
                    <img class="mb-6 rounded-lg " src="{{asset('images/quienes-somos-cafe.jpg')}}"
                        alt="Imagen de Nosotros">
                </picture>
                <div>
                    <p class="text-lg text-gray-600">En <span class="text-[#5A3A1B] font-semibold">Aroma Molido</span>,
                        nos apasiona el café de calidad y la experiencia única que se crea alrededor de cada taza.
                        Fundada en 2020, nuestra tienda nació con el objetivo de acercar a cada hogar una selección
                        exclusiva de granos provenientes de distintas regiones del mundo, cuidadosamente elegidos por su
                        sabor, aroma y proceso de cultivo.</p>
                    <br></br>
                    <p class="text-lg text-gray-600">A lo largo del tiempo, fuimos creciendo y perfeccionando nuestra
                        propuesta, enfocándonos exclusivamente en ofrecer café en grano y molido de la más alta calidad.
                        Seleccionamos cuidadosamente cada origen, buscando resaltar los mejores perfiles de sabor y
                        aroma, para que cada persona pueda disfrutar de una experiencia auténtica en cada taza.</p>
                    <br></br>
                    <p class="text-lg text-gray-600">Nos dirigimos tanto a quienes están dando sus primeros pasos en el
                        mundo del café como a verdaderos apasionados que valoran la calidad en cada preparación. Nuestro
                        compromiso es ofrecer productos confiables, asesoramiento personalizado y una experiencia de
                        compra simple y satisfactoria.</p>
                    <br></br>
                    <p class="text-lg text-gray-600">Creemos firmemente en la sostenibilidad y en el comercio justo. Por
                        eso, trabajamos directamente con productores y proveedores responsables, asegurando prácticas
                        éticas que respeten tanto al medio ambiente como a las comunidades cafeteras.</p>
                    <br></br>
                    <p class="text-lg text-gray-600">En <span class="text-[#5A3A1B] font-semibold">Aroma Molido</span>
                        no solo vendemos café, sino que buscamos transmitir una cultura, un momento de pausa y disfrute
                        en la rutina diaria. Queremos acompañarte en cada taza, desde el primer aroma hasta el último
                        sorbo.</p>
                    <br>
                    <p class="text-lg text-gray-600">Nuestra visión es seguir creciendo y consolidarnos como un
                        referente para todos los amantes del café, manteniendo siempre la calidad, la dedicación y la
                        pasión que nos define.</p>

                </div>
            </div>
        </div>

        <div class="mt-10">
            <h2 class="text-3xl font-bold mb-4">Nuestros Valores</h2>

            <p class="text-lg text-gray-600 mb-4">
                En el día a día con nuestros clientes y con cada persona que forma parte de este camino,
                en <span class="text-[#5A3A1B] font-semibold">Aroma Molido</span> promovemos los siguientes valores:
            </p>

            <ul class="list-disc pl-6 space-y-2 text-gray-600 text-lg">

                <li>
                    Crear una cultura de cercanía y pertenencia, donde todos se sientan bienvenidos.
                </li>

                <li>
                    Dar lo mejor de nosotros en cada detalle, haciéndonos responsables de la calidad que ofrecemos.
                </li>

                <li>
                    Innovar constantemente, buscando nuevas formas de mejorar y crecer junto a nuestra comunidad.
                </li>

                <li>
                    Actuar con respeto, transparencia y compromiso en cada interacción.
                </li>

                <li>
                    Trabajar con pasión, priorizando siempre la experiencia y satisfacción de quienes nos eligen.
                </li>

            </ul>
        

            <h2 class="text-3xl font-bold mt-10">Integrantes</h2>
            <div class="flex flex-wrap justify-center gap-12 py-10">
                

                @php
                    $equipo = [
                        ['nombre' => 'Reyes, Kevin', 'rol' => 'Fundador / Estrategia', 'url' => 'https://cloudfront-us-east-1.images.arcpublishing.com/elcronista/6DK5ZD7R3VC37LO3IHBVORZ7YQ.jpg'],
                        ['nombre' => 'Ojeda, Agustin', 'rol' => 'Fundador / Creatividad', 'url' => 'https://img.freepik.com/fotos-premium/joven-dueno-cafeteria-brazos-cruzados_116407-32855.jpg'],
                        ['nombre' => 'Ríos, Lucas', 'rol' => 'Barista', 'url' => 'https://img.freepik.com/fotos-premium/retrato-cafetero-barista-brazos-cruzados-listos-tomar-su-pedido-camarero-cafeteria-seguro-si-mismo-feliz-orgulloso-joven-empleado-brasil-o-propietario-pequena-empresa-cafeteria_590464-138303.jpg?w=360'],
                    ];
                @endphp

                @foreach($equipo as $persona)
                <div class="flex flex-col items-center group">
                    <div class="relative">
                        <div class="absolute -inset-1 bg-amber-600 rounded-full blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <img src="{{ $persona['url'] }}" 
                            alt="{{ $persona['nombre'] }}" 
                            class="relative w-40 h-40 object-cover rounded-full border-4 border-white shadow-lg transform transition duration-500 group-hover:scale-105">
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-stone-800">{{ $persona['nombre'] }}</h3>
                    <p class="text-amber-700 font-medium tracking-wide uppercase text-xs">{{ $persona['rol'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

    </section>
    @endsection
</x-layouts.app>