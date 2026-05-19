<x-layouts.app title="Registrar peso">
    @section('content')

    <div class="container mt-5">
        <h1 class="mb-4">Registrar peso</h1>
        <form action="{{ route('admin.weights.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Peso (g)</label>
                <input type="text" name="name" id="name" class="form-control" id="weight" name="weight" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
    @endsection
</x-layouts.app>