<x-layouts.app>
    @section('title','- Contacto')
    @section('content')
    <section class="h-full p-5 md:p-0 max-w-screen-lg m-auto my-10">
        <div class="hidden p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-soft" id="alert"
            role="alert">
            <span class="font-medium">Mensaje Enviado!</span> Tu mensaje/consulta fue enviada, te contactaremos
        </div>
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-4xl font-bold mb-4 crimson-pro">Contactanos</h1>
            <p class="text-lg text-gray-600">No dudes en contactarnos para cualquier consulta o soporte. <a
                    href="{{route('faq')}}"
                    class="text-fg-brand-subtle hover:text-fg-brand hover:border-b transition duration-500">Preguntas
                    frecuentes</a></p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-6">
            <form id="login-form" class="w-full max-w-md" action="#">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-brand focus:border-brand sm:text-sm"
                        required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-brand focus:border-brand sm:text-sm"
                        required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-700">Mensaje</label>
                    <textarea id="message" name="message" rows="4"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-brand focus:border-brand sm:text-sm"
                        required></textarea>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-brand-soft border border-transparent rounded-md font-semibold text-white hover:bg-brand focus:outline-none focus:ring-2 focus:ring-offset-2">Enviar
                    Mensaje</button>
            </form>
            <div>
                <h2 class="text-2xl font-bold mb-4">Nuestra Informacion de Contacto</h2>
                <p class="text-lg text-gray-600 mb-2">Titulares:
                    <a class="font-bold  hover:border-b transition duration-500">Ojeda,
                        Agustin y Reyes, Kevin</a>
                </p>
                <p class="text-lg text-gray-600 mb-2">Razon Social:
                    <a class="font-bold  hover:border-b transition duration-500">Aroma Molido S.A.</a>
                </p>
                <p class="text-lg text-gray-600 mb-2">Email:
                    <a class="text-fg-brand-subtle hover:text-fg-brand hover:border-b transition duration-500"
                        href="mailto:info@aromamolido.com">info@aromamolido.com</a>
                </p>
                <p class="text-lg text-gray-600 mb-2">Telefono:
                    <a class="text-fg-brand-subtle hover:text-fg-brand hover:border-b transition duration-500"
                        href="tel:++5493794011861">+54 9 379 4011861</a>
                </p>
                <p class="text-lg text-gray-600 mb-2">Direccion:
                    <a class="text-fg-brand-subtle hover:text-fg-brand hover:border-b transition duration-500"
                        href="https://www.google.com/maps/place/9+de+Julio+1449,+W3400+Corrientes/@-27.4666959,-58.8321683,21z/data=!4m6!3m5!1s0x94456ca6d11ee93d:0x597626256826f00a!8m2!3d-27.4666896!4d-58.8323136!16s%2Fg%2F11flc5zkkd?entry=ttu&g_ep=EgoyMDI2MDQwOC4wIKXMDSoASAFQAw%3D%3D"
                        target="_blank">
                        9 de Julio 1449, Corrientes, Argentina
                    </a>
                </p>
            </div>
        </div>
    </section>
    <script>
        const alert = document.getElementById('alert');
        document.getElementById('login-form').addEventListener('submit', function(event) {
            // 1. Detenemos el comportamiento por defecto (recargar/enviar)
            event.preventDefault();

            // 2. Mostramos el mensaje de éxito
            console.log('Mensaje enviado');
            alert.classList.remove('hidden');
            setTimeout(() => {
                alert.classList.add('hidden');
                console.clear();
            }, 3000);
            // 3. (Opcional) Limpiamos el formulario para simular que se envió
            this.reset();
        });
    </script>
    @endsection
</x-layouts.app>