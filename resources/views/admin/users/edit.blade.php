<x-layouts.admin>
    @section('title', 'Editar Usuario')
    @section('content')
    <h1 class="text-2xl font-bold mb-4">Editar Usuario: {{$user->id}} - {{$user->name}}</h1>
    <form action="{{route('admin.users.update', $user->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="role" class="block text-gray-700 font-bold mb-2">Rol:</label>
            <select name="role" id="role" class="form-select block w-full mt-1">
                <option value="customer" {{ $user->role === 'customer' ? 'selected' : '' }}>Usuario</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar
            Rol</button>
    </form>
    @endsection
</x-layouts.admin>
