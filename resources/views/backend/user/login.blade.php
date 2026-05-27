<x-layouts.app>
    @section('title','- inicio-sesion')
    @section('content')
    <section class="flex flex-col items-center justify-center px-6 py-8  mx-auto md:h-screen lg:py-0">

        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl ">
                    Iniciar sesión
                </h1>
                <form class="max-w-sm mx-auto" action="{{route('login.submit')}}" autocomplete="off" method="POST">
                    @csrf
                    <input type="text" name="fake_user" style="display:none">
                    <input type="password" name="fake_pass" style="display:none">
                    <div class="mb-5">
                        <label for="email" class="block mb-2.5 text-sm font-medium text-heading">Tu email</label>
                        <input type="email" name="email" id="email"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="name@flowbite.com" required />
                        @error('email')
                        <p>{{ $message }}</p>
                        @enderror



                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2.5 text-sm font-medium text-heading">Tu
                            contraseña</label>
                        <input name="password" type="password" id="password"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="••••••••" autocomplete="new-password" required />
                        @error('password')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Enviar</button>
                    <p class=" text-sm font-light  mt-5">
                        ¿Aún no tienes una cuenta? <a href="{{route('register')}}"
                            class=" font-medium text-fg-brand hover:underline dark:text-primary-500 "> Regístrate </ a>
                    </p>
                </form>

            </div>
        </div>
    </section>
    @endsection
</x-layouts.app>
