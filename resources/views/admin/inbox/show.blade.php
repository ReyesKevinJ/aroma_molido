<x-layouts.admin>
    @section('title', 'Detalle del Mensaje')
    @section('content')

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Mensaje #{{ $message->id }}</h1>
        <a href="{{ route('admin.inbox.index', ['type' => $type]) }}"
            class="text-gray-600 hover:text-blue-600 flex items-center font-medium">
            <svg class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
            </svg>
            Volver a la bandeja
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <p class="text-sm text-gray-500 mb-6 border-b pb-4">
                    Enviado el {{ $message->created_at->format('d de F, Y \a \l\a\s H:i') }}
                </p>

                <div
                    class="prose max-w-none text-gray-800 whitespace-pre-wrap leading-relaxed bg-gray-50 p-6 rounded-lg border border-gray-100">
                    {{ $message->message }}
                </div>

                <div class="mt-8 pt-4 border-t border-gray-100">
                    @php
                    $emailTo = $type === 'registered' ? ($message->user->email ?? '') : $message->email;
                    @endphp
                    @if($emailTo)
                    <a href="mailto:{{ $emailTo }}"
                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                        Responder por Correo a {{ $emailTo }}
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Datos del Remitente</h3>

                @if($type === 'registered')
                <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 mb-3">
                    Usuario Registrado
                </span>
                <p class="text-sm text-gray-500 mb-1">Nombre</p>
                <p class="font-medium text-gray-900 mb-4">{{ $message->user->name ?? 'Usuario Eliminado' }}</p>

                <p class="text-sm text-gray-500 mb-1">Correo Electrónico</p>
                <p class="font-medium text-gray-900 mb-4 break-all">{{ $message->user->email ?? 'N/A' }}</p>

                @if($message->user)
                <div class="pt-4 border-t border-gray-100">
                    <a href="{{ route('admin.users.edit', ['usuario' => $message->user->id]) }}"
                        class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                        Ver perfil del usuario &rarr;
                    </a>
                </div>
                @endif
                @else
                <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mb-3">
                    Invitado
                </span>
                <p class="text-sm text-gray-500 mb-1">Nombre</p>
                <p class="font-medium text-gray-900 mb-4">{{ $message->name }}</p>

                <p class="text-sm text-gray-500 mb-1">Correo Electrónico</p>
                <p class="font-medium text-gray-900 break-all">{{ $message->email }}</p>
                @endif
            </div>
        </div>

    </div>
    @endsection
</x-layouts.admin>