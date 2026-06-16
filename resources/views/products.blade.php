<x-layouts.app>
    @section('title','- Productos')
    @section('content')
    <x-products :products="$products" :categories="$categories" />
    @endsection
</x-layouts.app>