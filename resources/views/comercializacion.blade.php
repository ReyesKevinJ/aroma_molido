<x-layouts.app>
    @section('title','- Comercializacion')
    @section('content')

    <section class=" py-12 px-6">
        <div class="max-w-6xl mx-auto text-center">

            <h2 class="text-3xl font-bold text-amber-900 mb-4">
                Área de Comercialización
            </h2>
            <p class="text-amber-800 mb-10">
                Conocé nuestra forma de trabajo y todos los beneficios de comprar en
                <span class="font-semibold">Aroma Molido</span>.
            </p>


            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">


                <div class="bg-amber-50 p-6 rounded-2xl shadow-md hover:shadow-xl transition border border-amber-100">
                    <h3 class="text-xl font-semibold text-amber-900 mb-2">Compra fácil</h3>
                    <p class="text-amber-700">
                        Compra rápida y sencilla desde cualquier dispositivo. Elegí tu café favorito en pocos pasos.
                    </p>
                </div>


                <div class="bg-amber-50 p-6 rounded-2xl shadow-md hover:shadow-xl transition border border-amber-100">
                    <h3 class="text-xl font-semibold text-amber-900 mb-2">Calidad garantizada</h3>
                    <p class="text-amber-700">
                        Seleccionamos cuidadosamente cada grano para asegurar frescura, aroma y sabor.
                    </p>
                </div>


                <div class="bg-amber-50 p-6 rounded-2xl shadow-md hover:shadow-xl transition border border-amber-100">
                    <h3 class="text-xl font-semibold text-amber-900 mb-2">Asesoramiento</h3>
                    <p class="text-amber-700">
                        Te ayudamos a elegir el café ideal según tus gustos y forma de preparación.
                    </p>
                </div>


                <div class="bg-amber-50 p-6 rounded-2xl shadow-md hover:shadow-xl transition border border-amber-100">
                    <h3 class="text-xl font-semibold text-amber-900 mb-2">Garantía</h3>
                    <p class="text-amber-700">
                        Respaldamos la calidad de nuestros productos para que compres con confianza.
                    </p>
                </div>



                <div class="bg-amber-50 p-6 rounded-2xl shadow-md hover:shadow-xl transition border border-amber-100">
                    <h3 class="text-xl font-semibold text-amber-900 mb-2">Medios de Pago</h3>
                    <p class="text-amber-700 mb-2">
                        Aceptamos múltiples formas de pago:
                    </p>
                    <ul class="space-y-3 text-amber-800">

                        <li class="flex items-center gap-3 ">
                            <img src="{{asset('images/comercializacion/mercado-pago.png')}}" alt="MercadoPago" class="w-6 h-6 object-contain ">
                            <span>MercadoPago</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <img src="{{asset('images/comercializacion/visa.png')}}" alt="Visa" class="w-6 h-6 object-contain">
                            <span>Visa</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <img src="{{asset('images/comercializacion/masterCard.png')}}" alt="Mastercard" class="w-6 h-6 object-contain">
                            <span>Mastercard</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <img src="{{asset('images/comercializacion/naranja.png')}}" alt="Naranja" class="w-6 h-6 object-contain">
                            <span>Naranja</span>
                        </li>
                    </ul>
                </div>


                <div class=" bg-amber-50 p-6 rounded-2xl shadow-md hover:shadow-xl transition border border-amber-100">
                    <h3 class="text-xl font-semibold text-amber-900 mb-2">Envíos</h3>
                    <p class="text-amber-700 mb-2">
                        Envíos a todo el país mediante:
                    </p>

                    <ul class="space-y-3 text-amber-800">

                        <li class="flex items-center gap-3 ">
                            <img src="{{asset('images/comercializacion/oca.png')}}" alt="OCA" class="w-6 h-6 object-contain ">
                            <span>OCA</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <img src="{{asset('images/comercializacion/andreani.png')}}" alt="Andreani" class="w-6 h-6 object-contain">
                            <span>Andreani</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <img src="{{asset('images/comercializacion/correo-arg.png')}}" alt="Correo Argentino" class="w-6 h-6 object-contain">
                            <span>Correo Argentino</span>
                        </li>
                    </ul>
                </div>
            </div>
    </section>


    @endsection
</x-layouts.app>