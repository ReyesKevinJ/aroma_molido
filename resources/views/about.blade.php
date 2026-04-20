<x-layouts.app>
    @section('title','- Nosotros')
    @section('content')
    <section class="h-auto max-w-screen-lg m-auto my-10">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-4xl font-bold mb-4">Nuestra Historia</h1>
            <div class="my-6">

                <picture>
                    <img class="h-100 rounded-lg float-right" src="{{asset('images/quienes-somos-cafe.jpg')}}" alt="Imagen de Nosotros">
                </picture>

                <p class="text-lg text-gray-600">En <span class="text-amber-800 font-semibold">Aroma Molido</span>, nos apasiona el café de calidad y la experiencia única que se crea alrededor de cada taza. Fundada en 2020, nuestra tienda nació con el objetivo de acercar a cada hogar una selección exclusiva de granos provenientes de distintas regiones del mundo, cuidadosamente elegidos por su sabor, aroma y proceso de cultivo.</p>

                <p class="text-lg text-gray-600">A lo largo del tiempo, fuimos creciendo y perfeccionando nuestra propuesta, enfocándonos exclusivamente en ofrecer café en grano y molido de la más alta calidad. Seleccionamos cuidadosamente cada origen, buscando resaltar los mejores perfiles de sabor y aroma, para que cada persona pueda disfrutar de una experiencia auténtica en cada taza.</p>

                <p class="text-lg text-gray-600">Nos dirigimos tanto a quienes están dando sus primeros pasos en el mundo del café como a verdaderos apasionados que valoran la calidad en cada preparación. Nuestro compromiso es ofrecer productos confiables, asesoramiento personalizado y una experiencia de compra simple y satisfactoria.</p>

                <p class="text-lg text-gray-600">Creemos firmemente en la sostenibilidad y en el comercio justo. Por eso, trabajamos directamente con productores y proveedores responsables, asegurando prácticas éticas que respeten tanto al medio ambiente como a las comunidades cafeteras.</p>

                <p class="text-lg text-gray-600">En <span class="text-amber-800 font-semibold">Aroma Molido</span> no solo vendemos café, sino que buscamos transmitir una cultura, un momento de pausa y disfrute en la rutina diaria. Queremos acompañarte en cada taza, desde el primer aroma hasta el último sorbo.</p>

                <p class="text-lg text-gray-600">Nuestra visión es seguir creciendo y consolidarnos como un referente para todos los amantes del café, manteniendo siempre la calidad, la dedicación y la pasión que nos define.</p>
            </div>
        </div>
    </section>
    @endsection
</x-layouts.app>