<x-layouts.admin>
    @section('title','Usuarios')
    @section('content')
    <h1 class="text-2xl font-bold mb-4">Usuarios</h1>
    <table class="min-w-full bg-white text-left">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Nombre</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Rol</th>
                <th class="py-2 px-4 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="py-2 px-4 border-b">{{ $user['id'] }}</td>
                <td class="py-2 px-4 border-b">{{ $user['name'] }}</td>
                <td class="py-2 px-4 border-b">{{ $user['email'] }}</td>
                <td class="py-2 px-4 border-b">{{ $user['role'] }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('admin.users.edit', $user['id']) }}"
                        class="text-blue-500 hover:text-blue-700">Editar Rol</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection

</x-layouts.admin>
