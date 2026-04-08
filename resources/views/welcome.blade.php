<x-layouts.app>
    @section('content')
    <div class="flex flex-col items-center justify-center h-screen">
        <h1 class="text-4xl font-bold mb-4">Welcome to {{ config('app.name') }}</h1>
        <p class="text-lg text-gray-600">Your one-stop solution for all your needs.</p>
    </div>
    @endsection
</x-layouts.app>