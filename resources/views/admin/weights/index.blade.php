<x-layouts.admin>
    @section('title', 'Pesos')
    @section('content')
    <h1 class="text-2xl font-bold mb-4">Usuarios</h1>
    <table class="min-w-full bg-white text-left">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Nombre</th>
                <th class="py-2 px-4 border-b" colspan='2'>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($weights as $weight)
            <tr>
                <td class="py-2 px-4 border-b">{{ $weight['id'] }}</td>
                <td class="py-2 px-4 border-b">{{ $weight['name'] }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('admin.weights.edit', $weight['id']) }}"
                        class="text-blue-500 hover:text-blue-700">Editar</a>
                </td>
                <td class="py-2 px-4 border-b">
                    @if($weight->trashed())
                    <form action="{{ route('admin.weights.restore', $weight['id']) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="text-green-500 hover:text-green-700">Restaurar</button>
                    </form>
                    @else

                    <form action="{{ route('admin.weights.destroy', $weight->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</x-layouts.admin>