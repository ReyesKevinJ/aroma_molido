<x-layouts.admin>
    @section('title','Editar Categoría')
    @section('content')
    @if ($errors->any())
    <div class="mb-4">
        <div class="font-medium text-red-600">¡Ups! Algo salió mal.</div>
        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="w-full max-w-sm bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h5 class="text-xl font-semibold text-heading mb-6">Editar Categoría</h5>
            <div class="mb-4">
                <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Nombre</label>
                <input type="text" value="{{old('name',$category->name)}}" name="name" id="name"
                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                    placeholder="Nombre de la categoría" required />
            </div>
            <button type="submit"
                class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none w-full mb-3">Guardar</button>
        </form>
    </div>


    @endsection
</x-layouts.admin>