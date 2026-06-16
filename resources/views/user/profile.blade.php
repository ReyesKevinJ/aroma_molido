<x-layouts.app> <!-- Reemplazalo por tu layout o usá la estructura de body flex que vimos -->
    @section('title', 'Mi Perfil')

    @section('content')
    <section class="min-h-screen p-5 md:p-0 max-w-screen-lg m-auto my-10">
        <div class="container mx-auto p-4 mt-8 max-w-2xl">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">Mi Perfil</h1>

            <!-- Alerta de Éxito -->
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 shadow-sm">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            <!-- Alertas de Errores Generales de Validación -->
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6 shadow-sm">
                <strong class="font-bold">¡Por favor corrige los siguientes errores:</strong>
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Formulario de actualización -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-100">
                <form action="{{ route('user.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Requerido para peticiones de actualización (PUT) -->

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <!-- Nombre -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 p-2 border">
                        </div>

                        <!-- Apellido -->
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 p-2 border">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <!-- DNI -->
                        <div>
                            <label for="dni" class="block text-sm font-medium text-gray-700 mb-1">DNI</label>
                            <input type="text" name="dni" id="dni" value="{{ old('dni', $user->dni) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 p-2 border">
                        </div>

                        <!-- teléfono -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 p-2 border">
                        </div>
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 p-2 border">
                    </div>

                    <hr class="my-6 border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Cambiar Contraseña <span class="text-xs text-gray-400 font-normal">(Dejar en blanco si no deseas cambiarla)</span></h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <!-- Nueva Contraseña -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Nueva Contraseña</label>
                            <input type="password" name="password" id="password"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 p-2 border">
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 p-2 border">
                        </div>
                    </div>

                    <!-- Botón de Acción -->
                    <div class="flex justify-end">
                        <button type="submit" class="bg-amber-700 hover:bg-amber-800 text-white font-bold py-2 px-6 rounded-md shadow transition duration-150">
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @endsection
</x-layouts.app>