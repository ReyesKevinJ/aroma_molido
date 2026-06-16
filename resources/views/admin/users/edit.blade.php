<x-layouts.admin>
    @section('title', 'Gestionar Usuario: ' . $user->name)
    @section('content')

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Gestionar Usuario</h1>
        <a href="{{ route('admin.users.index') }}"
            class="text-gray-600 hover:text-blue-600 flex items-center font-medium transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
            </svg>
            Volver al listado
        </a>
    </div>

    @if ($errors->any())
    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
        <div class="font-medium text-red-600 mb-2">Por favor, corrige los siguientes errores:</div>
        <ul class="list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Información del Perfil</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                    <div>
                        <p class="text-gray-500 mb-1">Nombre Completo</p>
                        <p class="font-medium text-gray-900 bg-gray-50 p-2.5 rounded-lg border border-gray-200">
                            {{ $user->name }}
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Correo Electrónico</p>
                        <p class="font-medium text-gray-900 bg-gray-50 p-2.5 rounded-lg border border-gray-200">
                            {{ $user->email }}
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Fecha de Registro</p>
                        <p class="font-medium text-gray-900 bg-gray-50 p-2.5 rounded-lg border border-gray-200">
                            {{ $user->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Última Actualización</p>
                        <p class="font-medium text-gray-900 bg-gray-50 p-2.5 rounded-lg border border-gray-200">
                            {{ $user->updated_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Modificar Permisos</h2>

                <form action="{{ route('admin.users.update', ['usuario' => $user->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-700">Rol del Usuario</label>
                        <select name="role" id="role"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer">
                            <option value="customer" {{ old('role', $user->role) == 'customer' ? 'selected' : '' }}>
                                Cliente</option>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                Administrador</option>
                        </select>
                        <p class="mt-2 text-xs text-gray-500">
                            <strong>Nota:</strong> Asignar el rol de "Administrador" otorgará acceso total al panel de
                            control.
                        </p>
                    </div>

                    <button type="submit"
                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors">
                        Actualizar Rol
                    </button>
                </form>
            </div>
        </div>

    </div>
    @endsection
</x-layouts.admin>