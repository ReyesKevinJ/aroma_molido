<x-layouts.app>
    @section('title','- Terminos y Condiciones')
    @section('content')

    <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl ">
                    Crear una cuenta
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{route('register.submit')}}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium ">Tu email</label>
                        <input type="email" name="email" id="email"
                            class=" border text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="name@company.com" required>
                    </div>
                    <div class="relative">
                        <label for="password" class="block mb-2 text-sm font-medium">Contraseña</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="border text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            required>
                        <button type="button" id="togglePassword"
                            class="absolute right-3 top-9 text-sm text-gray-600 hover:text-gray-900 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" id="show" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" id="hide" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 hidden">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>


                        </button>
                    </div>
                    <div class="relative">
                        <label for="confirm-password" class="block mb-2 text-sm font-medium">Confirmar
                            Contraseña</label>
                        <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••"
                            class="border text-sm rounded-lg  block w-full p-2.5 rounded-base  block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            required>
                        <button type="button" id="togglePassword-1"
                            class="absolute right-3 top-9 text-sm text-gray-600 hover:text-gray-900 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" id="show-1" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" id="hide-1" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 hidden">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>


                        </button>
                        <p id="message" style="font-size: 0.9em;"></p>
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" aria-describedby="terms" type="checkbox"
                                class="w-4 h-4 border rounded focus:ring-brand focus:border-brand  dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-light">Estoy de acuerdo con los <a
                                    class="font-medium text-fg-brand hover:underline"
                                    href="/terminos-y-condiciones">términos y condiciones</a></label>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Crear
                        cuenta</button>
                    <p class="text-sm font-light">
                        ¿Ya tienes una cuenta? <a href="{{route('login')}}"
                            class="font-medium text-fg-brand hover:underline">Inicie sesion aquí</a>
                    </p>
                </form>
            </div>
        </div>
        <script>
            const message = document.getElementById('message');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm-password');

            function checkPasswordMatch() {

                if (confirmPassword.value === "") {
                    message.textContent = "";
                    return;
                }

                if (password.value !== confirmPassword.value) {
                    confirmPassword.classList.add('border-red-500');
                    confirmPassword.classList.remove('border-green-500');
                } else {
                    confirmPassword.classList.remove('border-red-500');
                    confirmPassword.classList.add('border-green-500');
                }
            }
            password.addEventListener('input', checkPasswordMatch);
            confirmPassword.addEventListener('input', checkPasswordMatch);
        </script>
        <script>
            const togglePassword = document.querySelector('#togglePassword');
            const passwordShow = document.querySelector('#password');
            const confirmPasswordShow = document.querySelector('#confirm-password');
            const togglePassword1 = document.querySelector('#togglePassword-1');

            togglePassword.addEventListener('click', function(e) {
                // toggle the type attribute
                const type = passwordShow.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordShow.setAttribute('type', type);
                // toggle the eye slash icon
                this.querySelector('#show').classList.toggle('hidden');
                this.querySelector('#hide').classList.toggle('hidden');
            });
            togglePassword1.addEventListener('click', function(e) {
                // toggle the type attribute
                const type = confirmPasswordShow.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPasswordShow.setAttribute('type', type);
                // toggle the eye slash icon
                this.querySelector('#show-1').classList.toggle('hidden');
                this.querySelector('#hide-1').classList.toggle('hidden');
            });
        </script>
    </section>
    @endsection
</x-layouts.app>