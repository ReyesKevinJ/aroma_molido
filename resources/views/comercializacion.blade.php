<x-layouts.app>
    @section('title','- Comercializacion')
    @section('content')

    <section class="bg-white py-12 px-6">
        <div class="max-w-6xl mx-auto text-center">

            <h2 class="text-3xl font-bold mb-4 crimson-pro ">
                Área de Comercialización
            </h2>

            <p class="mb-10 text-stone-600">
                Conocé nuestra forma de trabajo y todos los beneficios de comprar en 
                <span class="font-semibold text-[#5A3A1B]">Aroma Molido S.A.</span>
            </p>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                <div class="bg-[#F3E5D7] p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 ease-in-out transform hover:scale-105 border border-[#D6B38C] hover:bg-[#E4C7A7]">
                    <h3 class="text-xl font-semibold text-[#5A3A1B] mb-2">Compra fácil</h3>
                    <p class="text-[#5A3A1B] text-sm leading-relaxed">
                        Nuestra plataforma está optimizada para que elijas tus granos o blends favoritos en pocos pasos, con total seguridad desde cualquier dispositivo.
                    </p>
                </div>

                <div class="bg-[#F3E5D7] p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 ease-in-out transform hover:scale-105 border border-[#D6B38C] hover:bg-[#E4C7A7]">
                    <h3 class="text-xl font-semibold text-[#5A3A1B] mb-2">Calidad garantizada</h3>
                    <p class="text-[#5A3A1B] text-sm leading-relaxed">
                        Controlamos cada etapa del proceso, desde la selección del origen hasta el punto justo de tueste, asegurando frescura absoluta en cada entrega.
                    </p>
                </div>

                <div class="bg-[#F3E5D7] p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 ease-in-out transform hover:scale-105 border border-[#D6B38C] hover:bg-[#E4C7A7]">
                    <h3 class="text-xl font-semibold text-[#5A3A1B] mb-2">Asesoramiento</h3>
                    <p class="text-[#5A3A1B] text-sm leading-relaxed">
                        Nuestros expertos te guían para encontrar el perfil de sabor ideal según tu cafetera (prensa francesa, espresso o filtrado).
                    </p>
                </div>

                <div class="bg-[#F3E5D7] p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 ease-in-out transform hover:scale-105 border border-[#D6B38C] hover:bg-[#E4C7A7]">
                    <h3 class="text-xl font-semibold text-[#5A3A1B] mb-2">Garantía S.A.</h3>
                    <p class="text-[#5A3A1B] text-sm leading-relaxed">
                        Respaldamos institucionalmente cada producto. Si el café no llega en condiciones óptimas, nuestro equipo de socios resolverá el inconveniente.
                    </p>
                    <div class="relative text-center flex flex-col items-center justify-center m-3">
                        <svg class="w-6 h-6 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-2.06 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946 2.06 3.42 3.42 0 013.137 3.137 3.42 3.42 0 002.06 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-2.06 1.946 3.42 3.42 0 01-3.137 3.137 3.42 3.42 0 00-1.946 2.06 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-2.06 3.42 3.42 0 01-3.137-3.137 3.42 3.42 0 00-2.06-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 002.06-1.946 3.42 3.42 0 013.137-3.137z"></path>
                        </svg>
                       
                        <span class="text-[8px] font-bold uppercase tracking-tighter leading-none m-3">
                            Calidad Asegurada
                        </span>
                    </div>
                </div>

                <div class="bg-[#F3E5D7] p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 ease-in-out transform hover:scale-105 border border-[#D6B38C] hover:bg-[#E4C7A7]">
                    <h3 class="text-xl font-semibold text-[#5A3A1B] mb-2">Medios de Pago</h3>
                    <p class="text-[#5A3A1B] mb-4 text-sm">
                        Contamos con opciones seguras y un <strong>beneficio exclusivo</strong>:
                    </p>

                    <ul class="space-y-2 text-[#5A3A1B] text-sm mb-4">
                        <li class="flex items-center gap-3 font-bold text-amber-900 bg-white/30 p-1 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>10% OFF en Efectivo</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <img src="{{asset('images/comercializacion/mercado-pago.png')}}" alt="MercadoPago" class="w-6 h-6 object-contain">
                            <span>MercadoPago / Tarjetas</span>
                        </li>
                        
                    </ul>
                    
                    <div class="flex justify-center gap-2 opacity-70">
                        <img src="{{asset('images/comercializacion/visa.png')}}" class="h-6">
                        <img src="{{asset('images/comercializacion/masterCard.png')}}" class="h-6">
                        <img src="{{asset('images/comercializacion/naranja.png')}}" class="h-6">
                    </div>
                </div>

                <div class="bg-[#F3E5D7] p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 ease-in-out transform hover:scale-105 border border-[#D6B38C] hover:bg-[#E4C7A7]">
                    <h3 class="text-xl font-semibold text-[#5A3A1B] mb-2">Logística Nacional</h3>
                    <p class="text-[#5A3A1B] mb-4 text-sm leading-relaxed">
                        Garantizamos que tu pedido llegará en un plazo **máximo de 15 días corridos** mediante:
                    </p>

                    <ul class="space-y-2 text-[#5A3A1B] text-sm">
                        <li class="flex items-center gap-3">
                            <img src="{{asset('images/comercializacion/oca.png')}}" alt="OCA" class="w-6 h-6 object-contain grayscale hover:grayscale-0 transition">
                            <span>OCA</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <img src="{{asset('images/comercializacion/andreani.png')}}" alt="Andreani" class="w-6 h-6 object-contain grayscale hover:grayscale-0 transition">
                            <span>Andreani</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <img src="{{asset('images/comercializacion/correo-arg.png')}}" alt="Correo Argentino" class="w-6 h-6 object-contain grayscale hover:grayscale-0 transition">
                            <span>Correo Argentino</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    @endsection
</x-layouts.app>