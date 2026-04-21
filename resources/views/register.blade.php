<x-layouts.app>
    @section('title','- Terminos y Condiciones')
    @section('content')

    <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">


        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl ">
                    Crear una cuenta
                </h1>
                <form class="space-y-4 md:space-y-6" action="#">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium ">Tu email</label>
                        <input type="email" name="email" id="email" class=" border text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="name@company.com" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium">Contraseña</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="border text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" required="">
                    </div>
                    <div>
                        <label for="confirm-password" class="block mb-2 text-sm font-medium">Confirmar Contraseña</label>
                        <input type="confirm-password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="border text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" required="">
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border rounded focus:ring-brand focus:border-brand  dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-light">Estoy de acuerdo con los <a class="font-medium text-fg-brand hover:underline" href="/terminos-y-condiciones">términos y condiciones</a></label>
                        </div>
                    </div>
                    <button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Crear cuenta</button>
                    <p class="text-sm font-light">
                        ¿Ya tienes una cuenta? <a href="/inicio-sesion" class="font-medium text-fg-brand hover:underline">Inicie sesion aquí</a>
                    </p>
                </form>
            </div>
        </div>

    </section>
    @endsection
</x-layouts.app>